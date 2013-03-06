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
			if($acct == 'Meaningful Use' || $acct == 'Initial'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			} 
			if(in_array($this->action, array('index', 'view','add'))){  // Allow Managers to Add 
				return true;
			}
				
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->PoliciesAndProceduresDocument->isOwnedBy($id, $client)){
					return true;
				}
			}
		}

		if($group == 3){
			if($acct == 'Meaningful Use' || $acct == 'Initial'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			} 
					
			if(in_array($this->action, array('edit', 'delete', 'add'))){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
					return false;	
				}
				
				if(in_array($this->action, array('index', 'view'))){  
					return true;
				}
		}	

		return parent::isAuthorized($user);
 	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PoliciesAndProceduresDocument->recursive = 0;
		$this->set('policiesAndProceduresDocuments', $this->paginate());
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
	public function add() {
		if ($this->request->is('post')) {
			
			/*$conditions = array(
				'PoliciesAndProceduresDocument.client_id' => $this->request->data['PoliciesAndProceduresDocument']['client_id'],
				'PoliciesAndProceduresDocument.policies_and_procedure_id' => $this->request->data['PoliciesAndProceduresDocument']['policies_and_procedure_id'],
			);*/
			$check = $this->PoliciesAndProceduresDocument->find('first',(array(
				'conditions' => array(
						'PoliciesAndProceduresDocument.client_id' => $this->request->data['PoliciesAndProceduresDocument']['client_id'],
						'PoliciesAndProceduresDocument.policies_and_procedure_id' => $this->request->data['PoliciesAndProceduresDocument']['policies_and_procedure_id']),
						'fields' => array('PoliciesAndProceduresDocument.id, PoliciesAndProceduresDocument.client_id, PoliciesAndProceduresDocument.policies_and_procedure_id'),
						'recursive' => 0
				)));

			/*		$conditions = array(
						$this->request->data['PoliciesAndProceduresDocument']['client_id'],
						$this->request->data['PoliciesAndProceduresDocument']['policies_and_procedure_id']);*/

			
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
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
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
				$this->redirect(array('controller' => 'policies_and_procedures', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies and procedures document could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PoliciesAndProceduresDocument->read(null, $id);
		}
		$policiesAndProcedures = $this->PoliciesAndProceduresDocument->PoliciesAndProcedure->find('list');
		$clients = $this->PoliciesAndProceduresDocument->Client->find('list');
		$this->set(compact('policiesAndProcedures', 'clients'));
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
