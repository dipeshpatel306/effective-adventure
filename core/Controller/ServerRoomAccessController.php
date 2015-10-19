<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
/*
 *//**
 * ServerRoomAccess Controller
 *
 * @property ServerRoomAccess $ServerRoomAccess
 */
class ServerRoomAccessController extends AppController {

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
		$acct = $this->Session->read('Auth.User.Client.account_type');
		if ($acct == 'AYCE Training') {
			$client = Configure::read('__ayce_demo_client');
		} else {
			$client = $this->Session->read('Auth.User.client_id');  // Test Client.	
		}
		$partner = $this->Session->read('Auth.User.partner_id');
		
		if ($group == Group::PARTNER_ADMIN) {
			if (in_array($this->action, array('add'))) {
				$id = $this->request->params['pass'][0];
				return $this->ServerRoomAccess->Client->isOwnedByPartner($id, $partner);
			} elseif (in_array($this->action, array('edit', 'view', 'delete', 'sendFile'))) {
				$id = $this->request->params['pass'][0];
				return $this->ServerRoomAccess->isOwnedByPartner($id, $partner);
			}
			return false;
		}
		
		if($group == Group::MANAGER){
			if($acct == 'Meaningful Use' || $acct == 'Training'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			} 
			if(in_array($this->action, array('index', 'view','add'))){  // Allow Managers to Add 
				return true;
			}
				
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->ServerRoomAccess->isOwnedBy($id, $client)){
					return true;
				}
			}
		}
		
		if($group == Group::USER || $acct == 'Initial' || $acct == 'Meaningful Use' || $acct == 'Training'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
		}		
		return parent::isAuthorized($user);
 	}
/**
 * index method
 *
 * @return void
 */

	public function index() {
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$acct = $this->Session->read('Auth.User.Client.account_type');
		if ($acct == 'AYCE Training') {
			$client = Configure::read('__ayce_demo_client');
		} else {
			$client = $this->Session->read('Auth.User.client_id');  // Test Client.	
		}

		if($group == 1){
			$this->ServerRoomAccess->recursive = 0;
			$this->paginate = array('order' => array('ServerRoomAccess.client_id' => 'ASC'));			
			$this->set('serverRoomAccess', $this->paginate());			
		}elseif($group == 2 ) {
			$this->paginate = array(
				'conditions' => array('ServerRoomAccess.client_id' => $client),
				'order' => array('ServerRoomAccess.name' => 'ASC')
			);
			$this->set('serverRoomAccess', $this->paginate());
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
		$acct = $this->Session->read('Auth.User.Client.account_type');
		if ($acct == 'AYCE Training') {
			$client = Configure::read('__ayce_demo_client');
		} else {
			$client = $this->Session->read('Auth.User.client_id');  // Test Client.	
		}
		
		$this->ServerRoomAccess->id = $id;
		if (!$this->ServerRoomAccess->exists()) {
			throw new NotFoundException(__('Invalid Server Room Access'));
		}

		$sra = $this->ServerRoomAccess->read(null, $id);
		if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){
			$this->set('serverRoomAccess', $sra);
		} elseif($group == Group::MANAGER){
			if ($sra['ServerRoomAccess']['client_id'] == $client) {
				$this->set('serverRoomAccess', $sra);
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
			if($group != Group::ADMIN && $group != Group::PARTNER_ADMIN){
				$this->request->data['ServerRoomAccess']['client_id'] = $this->Auth->User('client_id');
			}				

			$this->ServerRoomAccess->create();
			if ($this->ServerRoomAccess->save($this->request->data)) {
				$this->Session->setFlash('The server room access has been saved.', 'default', array('class' => 'success message'));
			if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){
				if(isset($clientId)){
					$this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));
				} else {
					$this->redirect(array('action' => 'index'));	
				}
				
			} else {	
				$this->redirect(array('action' => 'index'));
			}
			} else {
				$this->Session->setFlash(__('The server room access could not be saved. Please, try again.'));
			}
		}
		$clients = $this->getClientsList();
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
		
		$this->ServerRoomAccess->id = $id;
		if (!$this->ServerRoomAccess->exists()) {
			throw new NotFoundException(__('Invalid server room access'));
		}
		
		// If user is a client automatically set the client id accordingly. Admin can change client ids
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		if($group != Group::ADMIN && $group != Group::PARTNER_ADMIN){
			$this->request->data['ServerRoomAccess']['client_id'] = $this->Auth->User('client_id');
		}	
					
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ServerRoomAccess->save($this->request->data)) {
				$this->Session->setFlash('The server room access has been saved', 'default', array('class' => 'success message'));
			if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){
				if(isset($clientId)){
					$this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));
				} else {
					$this->redirect(array('action' => 'index'));	
				}
				
			} else {	
				$this->redirect(array('action' => 'index'));
			}
			} else {
				$this->Session->setFlash(__('The server room access could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ServerRoomAccess->read(null, $id);
		}
		$clients = $this->getClientsList();
		$this->set(compact('clients'));
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
		$this->ServerRoomAccess->id = $id;
		if (!$this->ServerRoomAccess->exists()) {
			throw new NotFoundException(__('Invalid server room access'));
		}
		if ($this->ServerRoomAccess->delete()) {
			$this->Session->setFlash(__('Server room access deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Server room access was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}


}
