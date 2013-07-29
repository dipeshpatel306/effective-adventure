<?php
App::uses('AppController', 'Controller');
/**
 * OtherContractsAndDocuments Controller
 *
 * @property OtherContractsAndDocument $OtherContractsAndDocument
 */
class OtherContractsAndDocumentsController extends AppController {

 public function beforeFilter(){
	parent::beforeFilter();
 }

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * Client Managers & MU MAnagers can only Add Edit Delete to their own group
 * Users cannot see
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		$acct = $this->Session->read('Auth.User.Client.account_type');

		if($group == 2){
			if($acctId == 'Meaningful Use'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			}
			if(in_array($this->action, array('index', 'view','add'))){  // Allow Managers to Add
				return true;
			}

			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->OtherContractsAndDocument->isOwnedBy($id, $client)){
					return true;
				}
			}
		}

		if($group == 3 || $acct == 'Initial' || $acct == 'Meaningful Use'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
		}

		return parent::isAuthorized($user);
 	}

/**
 * SendFile Method
 *
 */
	public function sendFile($dir, $file) {
    	//$file = $this->Attachment->getFile($id);
		$file = WWW_ROOT . '/files/other_contracts_and_document/attachment/' . $dir . '/' . $file;
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
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.

		if($group == 1){
			$this->OtherContractsAndDocument->recursive = 0;
			$this->paginate = array('order' => array('OtherContractsAndDocument.client_id' => 'ASC'));
			$this->set('otherContractsAndDocuments', $this->paginate());
		}elseif($group == 2) {
			$this->paginate = array(
				'conditions' => array('OtherContractsAndDocument.client_id' => $client),
				'order' => array('OtherContractsAndDocument.name' => 'ASC')
			);
			$this->set('otherContractsAndDocuments', $this->paginate());
		} else {
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view($id = null) {
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.

		$this->OtherContractsAndDocument->id = $id;
		if (!$this->OtherContractsAndDocument->exists()) {
			throw new NotFoundException(__('Invalid Other Contracts and Documents'));
		}

		if($group == 1){
			$this->set('otherContractsAndDocument', $this->OtherContractsAndDocument->read(null, $id));
		} elseif($group == 2){
				$is_authorized = $this->OtherContractsAndDocument->find('first', array(
				'conditions' => array(
					'OtherContractsAndDocument.id' => $id,
					'AND' => array('OtherContractsAndDocument.client_id' => $client)
				)
			));

			if($is_authorized){
				$this->set('otherContractsAndDocument', $this->OtherContractsAndDocument->read(null, $id));
			} else { // Else Banned!
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			}
		} else {
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}

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

			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
			if($group != 1){
				$this->request->data['OtherContractsAndDocument']['client_id'] = $this->Auth->User('client_id');
				$this->request->data['OtherContractsAndDocument']['file_key'] = $this->Session->read('Auth.User.Client.file_key');	// file key
			} else {
				$this->loadModel('Client');
				$key = $this->Client->find('first', array('conditions' => array(
							'Client.id' => $this->request->data['OtherContractsAndDocument']['client_id']),
							'fields' => 'Client.file_key'
							));
				$this->request->data['OtherContractsAndDocument']['file_key'] = $key['Client']['file_key'];
			}

			$this->OtherContractsAndDocument->create();
			if ($this->OtherContractsAndDocument->save($this->request->data)) {
				$this->Session->setFlash('The other contracts and document has been saved', 'default', array('class' => 'success message'));
			if($group == 1){
				if(isset($clientId)){
					$this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));
				} else {
					$this->redirect(array('action' => 'index'));	
				}
				
			} else {	
				$this->redirect(array('action' => 'index'));
			}
			} else {
				$this->Session->setFlash(__('The other contracts and document could not be saved. Please, try again.'));
			}
		}
		$clients = $this->OtherContractsAndDocument->Client->find('list');
		$this->set(compact('clients'));
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
		
		$this->OtherContractsAndDocument->id = $id;
		if (!$this->OtherContractsAndDocument->exists()) {
			throw new NotFoundException(__('Invalid other contracts and document'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {

				$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
				if($group != 1){
					$this->request->data['OtherContractsAndDocument']['client_id'] = $this->Auth->User('client_id');
					$this->request->data['OtherContractsAndDocument']['file_key'] = $this->Session->read('Auth.User.Client.file_key');	// file key
				} else {
						$this->loadModel('Client');
						$key = $this->Client->find('first', array('conditions' => array(
									'Client.id' => $this->request->data['OtherContractsAndDocument']['client_id']),
									'fields' => 'Client.file_key'
									));
						$this->request->data['OtherContractsAndDocument']['file_key'] = $key['Client']['file_key'];
				}

			if ($this->OtherContractsAndDocument->save($this->request->data)) {
				$this->Session->setFlash('The other contracts and document has been saved', 'default', array('class' => 'success message'));
			if($group == 1){
				if(isset($clientId)){
					$this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));
				} else {
					$this->redirect(array('action' => 'index'));	
				}
				
			} else {	
				$this->redirect(array('action' => 'index'));
			}
			} else {
				$this->Session->setFlash(__('The other contracts and document could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OtherContractsAndDocument->read(null, $id);
		}
		$clients = $this->OtherContractsAndDocument->Client->find('list');
		$doc = $this->OtherContractsAndDocument->data['OtherContractsAndDocument']['attachment'];
		$this->set(compact('clients', 'doc'));
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
		$this->OtherContractsAndDocument->id = $id;
		if (!$this->OtherContractsAndDocument->exists()) {
			throw new NotFoundException(__('Invalid other contracts and document'));
		}
		if ($this->OtherContractsAndDocument->delete()) {
			$this->Session->setFlash(__('Other contracts and document deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Other contracts and document was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
