<?php
App::uses('AppController', 'Controller');
/**
 * PoliciesAndProceduresDocuments Controller
 *
 * @property PoliciesAndProceduresDocument $PoliciesAndProceduresDocument
 */
class PoliciesAndProceduresDocumentsController extends AppController {


 public function beforeFilter(){
	parent::beforeFilter();
 }

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * MU Managers and Users are denied
 * Other Managers can add/edit/index/delete their own client
 * Users can read only
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		$acct = $this->Session->read('Auth.User.Client.account_type');

		if($group == 2){ // Allow Managers to add/edit/delete their own data
			if($acct == 'Meaningful Use' || $acct == 'Initial' || $acct == 'Training'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			}
			if(in_array($this->action, array('add'))){  // Allow Managers to Add
				return true;
			}

			if(in_array($this->action, array('index'))){  // Clients can no longer view that index page
				$this->redirect(array('controller' => 'policies_and_procedures', 'action' => 'index'));
			}
			if(in_array($this->action, array('edit', 'view','delete', 'sendFile'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->PoliciesAndProceduresDocument->isOwnedBy($id, $client)){
					return true;
				}
			}
		}

		if($group == 3){
			if($acct == 'Meaningful Use' || $acct == 'Initial' || $acct == 'Training'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			}

			if(in_array($this->action, array('edit', 'delete', 'add'))){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
					return false;
				}
			
			if(in_array($this->action, array('view','sendFile'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->PoliciesAndProceduresDocument->isOwnedBy($id, $client)){
					return true;
				}
			}

			if(in_array($this->action, array('index'))){  // Clients can no longer view that index page
				$this->redirect(array('controller' => 'policies_and_procedures', 'action' => 'index'));
			}
		}

		return parent::isAuthorized($user);
 	}

/**
 * SendFile Method
 *
 */
	public function sendFile($dir, $file) {
    	//$file = $this->Attachment->getFile($id);
		$file = WWW_ROOT . '/files/policies_and_procedures_document/document/' . $dir . '/' . $file;
   	 	$this->response->file($file, array('download' => true));
    	//Return reponse object to prevent controller from trying to render a view
    	return $this->response;
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PoliciesAndProceduresDocument->recursive = 0;
		$this->set('policiesAndProceduresDocuments', $this->paginate());
		
		/*if($group == 1){ No longer used. Client cannot view this page any more
			$this->PoliciesAndProceduresDocument->recursive = 0;
			$this->paginate = array('order' => array('PoliciesAndProceduresDocument.client_id' => 'ASC'));
			$this->set('policiesAndProceduresDocuments', $this->paginate());
		} elseif($group == 2){
			$this->paginate = array(
				'conditions' => array('PoliciesAndProceduresDocument.client_id' => $client),
				'order' => array('PoliciesAndProceduresDocument.name' => 'ASC')
			);
			$this->set('policiesAndProceduresDocuments', $this->paginate());
		} else {
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}*/
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PoliciesAndProceduresDocument->id = $id;
		if (!$this->PoliciesAndProceduresDocument->exists()) {
			throw new NotFoundException(__('Invalid policies and procedures document'));
		}
		$this->set('policiesAndProceduresDocument', $this->PoliciesAndProceduresDocument->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($clientId = null) {
		
		if(isset($clientId)){
			$this->set('clientId', $clientId);
		}
		
		if ($this->request->is('post')) {
			
			// Check to make sure record doesn't already exist
			$check = $this->PoliciesAndProceduresDocument->find('first',(array(
				'conditions' => array(
						'PoliciesAndProceduresDocument.client_id' => $this->request->data['PoliciesAndProceduresDocument']['client_id'],
						'PoliciesAndProceduresDocument.policies_and_procedure_id' => $this->request->data['PoliciesAndProceduresDocument']['policies_and_procedure_id']),
						'fields' => array('PoliciesAndProceduresDocument.id, PoliciesAndProceduresDocument.client_id, PoliciesAndProceduresDocument.policies_and_procedure_id'),
						'recursive' => 0
				)));

			if($check){
				$this->request->data['PoliciesAndProceduresDocument']['id'] = $check['PoliciesAndProceduresDocument']['id'];
			}
			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
			if($group != 1){
				$this->request->data['PoliciesAndProceduresDocument']['client_id'] = $this->Auth->User('client_id');
				$this->request->data['PoliciesAndProceduresDocument']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key
			} else {
				$this->loadModel('Client');
				$key = $this->Client->find('first', array('conditions' => array(
							'Client.id' => $this->request->data['PoliciesAndProceduresDocument']['client_id']),
							'fields' => 'Client.file_key'
							));
				$this->request->data['PoliciesAndProceduresDocument']['file_key'] = $key['Client']['file_key'];
			}

			$this->PoliciesAndProceduresDocument->create();
			if ($this->PoliciesAndProceduresDocument->save($this->request->data)) {
				$this->Session->setFlash('The policies and procedures document has been saved', 'default', array('class' => 'success message'));
				
				$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
			if($group == 1){
				if(isset($clientId)){
					$this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));
				} else {
					$this->redirect(array('action' => 'index'));	
				}
				
			} else {	
				$this->redirect(array('action' => 'index'));
			}
				
				$this->redirect(array('action' => 'index'));
			
			} else {
				$this->Session->setFlash(__('The policies and procedures document could not be saved. Please, try again.'));
			}
		}
		$policiesAndProcedures = $this->PoliciesAndProceduresDocument->PoliciesAndProcedure->find('list');
		$clients = $this->PoliciesAndProceduresDocument->Client->find('list');
		$this->set(compact('policiesAndProcedures', 'clients'));
	}

/**
 * Batch Add Method
 * @return void
 */
	public function batch_add($clientId = null, $policy = null){
		
		if(isset($clientId)){ // Check Client ID is set
			$this->request->data['PoliciesAndProceduresDocument']['client_id'] = $clientId;
			
			$clientName = $this->PoliciesAndProceduresDocument->Client->find('first', array(
				'conditions' => array('Client.id' => $clientId),
				'fields' => array('Client.name'),
				'recursive' => 0	
			
			));
			
		} else {
				$this->redirect(array('controller' => 'clients', 'action' => 'index'));
				$this->Session->setFlash(__('There was no Client.'));
		}
		
		if(!isset($policy)){
 			$policy = 1;
		} elseif($policy > 18 || $policy < 0){
				$this->redirect(array('controller' => 'clients', 'action' => 'view', $clientId));
				$this->Session->setFlash('Policies and Procedures Batch Upload completed for ' . $clientName, 'default', 
				array('class' => 'success message'));
			
		} else {
			if($policy == 18 ){
				$this->redirect(array('controller' => 'clients', 'action' => 'view', $clientId));
				$this->Session->setFlash('Policies and Procedures Batch Upload completed for ' . $clientName, 'default', 
				array('class' => 'success message'));
			} else {
				$policy = $policy += 1;	
			}

		}
		
		if ($this->request->is('post')) {
			
			// Check to make sure record doesn't already exist
			$check = $this->PoliciesAndProceduresDocument->find('first',(array(
				'conditions' => array(
						'PoliciesAndProceduresDocument.client_id' => $this->request->data['PoliciesAndProceduresDocument']['client_id'],
						'PoliciesAndProceduresDocument.policies_and_procedure_id' => $this->request->data['PoliciesAndProceduresDocument']['policies_and_procedure_id']),
						'fields' => array('PoliciesAndProceduresDocument.id, PoliciesAndProceduresDocument.client_id, PoliciesAndProceduresDocument.policies_and_procedure_id'),
						'recursive' => 0
				)));

			if($check){
				$this->request->data['PoliciesAndProceduresDocument']['id'] = $check['PoliciesAndProceduresDocument']['id'];
			}			

			
			$this->PoliciesAndProceduresDocument->create();
			if ($this->PoliciesAndProceduresDocument->save($this->request->data)) {
				$this->Session->setFlash('The policies and procedures document has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'batch_add', $clientId, $policy));
			} else {
				$this->Session->setFlash(__('The policies and procedures document could not be saved. Please, try again.'));
			}
		}	
		$policiesAndProcedures = $this->PoliciesAndProceduresDocument->PoliciesAndProcedure->find('list');	
		$clients = $this->PoliciesAndProceduresDocument->Client->find('list');	
		
		$this->set(compact('policiesAndProcedures', 'clients' , 'clientId', 'clientName', 'policy'));
	}
/**
 * Batch Add Method
 * @return void
 */	
	public function batch_edit($client_id = null, $policy_id = null){
		
		
	}  

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $clientId = null) {
		if(isset($clientId)){
			$this->set('clientId', $clientId);
		}	
			
		$this->PoliciesAndProceduresDocument->id = $id;
		if (!$this->PoliciesAndProceduresDocument->exists()) {
			throw new NotFoundException(__('Invalid policies and procedures document'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {

				// If user is a client automatically set the client id accordingly. Admin can change client ids
				$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
				if($group != 1){
					$this->request->data['PoliciesAndProceduresDocument']['client_id'] = $this->Auth->User('client_id');
					$this->request->data['PoliciesAndProceduresDocument']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key
				} else {
					$this->loadModel('Client');
					$key = $this->Client->find('first', array('conditions' => array(
								'Client.id' => $this->request->data['PoliciesAndProceduresDocument']['client_id']),
								'fields' => 'Client.file_key'
								));
					$this->request->data['PoliciesAndProceduresDocument']['file_key'] = $key['Client']['file_key'];
				}

			if ($this->PoliciesAndProceduresDocument->save($this->request->data)) {
				$this->Session->setFlash('The policies and procedures document has been saved', 'default', array('class' => 'success message'));
			if($group == 1){
				if(isset($clientId)){
					$this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));
				} else {
					$this->redirect(array('action' => 'index'));	
				}
				
			} else {	
				$this->redirect(array('controller' => 'Policies_and_procedures','action' => 'index'));
			}

			} else {
				$this->Session->setFlash(__('The policies and procedures document could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PoliciesAndProceduresDocument->read(null, $id);
		}
		$policiesAndProcedures = $this->PoliciesAndProceduresDocument->PoliciesAndProcedure->find('list');
		//$name = $this->PoliciesAndProceduresDocument['document'];
		$clients = $this->PoliciesAndProceduresDocument->Client->find('list');
		$doc = $this->PoliciesAndProceduresDocument->data['PoliciesAndProceduresDocument']['document'];
		$this->set(compact('policiesAndProcedures', 'clients', 'doc'));	

	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->PoliciesAndProceduresDocument->id = $id;
		if (!$this->PoliciesAndProceduresDocument->exists()) {
			throw new NotFoundException(__('Invalid policies and procedures document'));
		}
		if ($this->PoliciesAndProceduresDocument->delete()) {
			$this->Session->setFlash(__('Policies and procedures document deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Policies and procedures document was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
