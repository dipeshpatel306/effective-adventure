<?php
App::uses('AppController', 'Controller');
/**
 * BusinessAssociateAgreements Controller
 *
 * @property BusinessAssociateAgreement $BusinessAssociateAgreement
 */
class BusinessAssociateAgreementsController extends AppController {

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
		$acct = $this->Session->read('Auth.User.Client.account_type'); // Get account type

		if($group == 2){
			if(in_array($this->action, array('index', 'view','add'))){  // Allow Managers to Add
				return true;
			}

			if(in_array($this->action, array('edit', 'delete', 'sendFile'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->BusinessAssociateAgreement->isOwnedBy($id, $client)){
					return true;
				}
			}
		}

		if($group == 3 || $acct == 'Initial'){
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
		$file = WWW_ROOT . '/files/business_associate_agreement/attachment/' . $dir . '/' . $file;
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
			$this->BusinessAssociateAgreement->recursive = 0;
			$this->paginate = array('order' => array('BusinessAssociateAgreement.client_id' => 'ASC'));
			$this->set('businessAssociateAgreements', $this->paginate());
		}elseif($group == 2) {
			$this->paginate = array(
				'conditions' => array('BusinessAssociateAgreement.client_id' => $client),
				'order' => array('BusinessAssociateAgreement.name' => 'ASC')
			);
			$this->set('businessAssociateAgreements', $this->paginate());
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

		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid Business Associate Agreement'));
		}

		if($group == 1){
			$this->set('businessAssociateAgreement', $this->BusinessAssociateAgreement->read(null, $id));
		} elseif($group == 2){
				$is_authorized = $this->BusinessAssociateAgreement->find('first', array(
				'conditions' => array(
					'BusinessAssociateAgreement.id' => $id,
					'AND' => array('BusinessAssociateAgreement.client_id' => $client)
				)
			));

			if($is_authorized){
				$this->set('businessAssociateAgreement', $this->BusinessAssociateAgreement->read(null, $id));
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
				$this->request->data['BusinessAssociateAgreement']['client_id'] = $this->Auth->User('client_id');
				//$clientId = $this->request->data['BusinessAssociateAgreement']['client_id'];

				$this->request->data['BusinessAssociateAgreement']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key
				//$fileKey = $this->request->data['BusinessAssociateAgreement']['file_key'];
			} else {
				$this->loadModel('Client');
				$key = $this->Client->find('first', array('conditions' => array(
							'Client.id' => $this->request->data['BusinessAssociateAgreement']['client_id']),
							'fields' => 'Client.file_key'
							));
				//$clientId = $this->request->data['BusinessAssociateAgreement']['client_id'];
				$this->request->data['BusinessAssociateAgreement']['file_key'] = $key['Client']['file_key'];

				//$fileKey = $this->request->data['BusinessAssociateAgreement']['file_key'];
			}

			$this->BusinessAssociateAgreement->create();
			if ($this->BusinessAssociateAgreement->save($this->request->data)) {
				$this->Session->setFlash('The business associate agreement has been saved', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The business associate agreement could not be saved. Please, try again.'));
			}
		}
		$clients = $this->BusinessAssociateAgreement->Client->find('list');
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
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {

				$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
				if($group != 1){
					$this->request->data['BusinessAssociateAgreement']['client_id'] = $this->Auth->User('client_id');
					$this->request->data['BusinessAssociateAgreement']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key
				}else {
						$this->loadModel('Client');
						$key = $this->Client->find('first', array('conditions' => array(
									'Client.id' => $this->request->data['BusinessAssociateAgreement']['client_id']),
									'fields' => 'Client.file_key'
									));
						$this->request->data['BusinessAssociateAgreement']['file_key'] = $key['Client']['file_key'];
				}

			if ($this->BusinessAssociateAgreement->save($this->request->data)) {
				$this->Session->setFlash('The business associate agreement has been saved', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The business associate agreement could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BusinessAssociateAgreement->read(null, $id);
		}
		$clients = $this->BusinessAssociateAgreement->Client->find('list');
		$doc = $this->BusinessAssociateAgreement->data['BusinessAssociateAgreement']['attachment'];
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
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}
		if ($this->BusinessAssociateAgreement->delete()) {
			$this->Session->setFlash(__('Business associate agreement deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Business associate agreement was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}