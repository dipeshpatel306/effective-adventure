<?php
App::uses('AppController', 'Controller');
/**
 * OtherPoliciesAndProcedures Controller
 *
 * @property OtherPoliciesAndProcedure $OtherPoliciesAndProcedure
 */
class OtherPoliciesAndProceduresController extends AppController {

 public function beforeFilter(){
	parent::beforeFilter();
 }

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * MU Managers and Users are denied
 * All else can index/view/add/delete their own client
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		$acct = $this->Session->read('Auth.User.account_type');

		if($group == 2 || $acct == 'Initial'){ // Allow Managers to add/edit/delete their own data

			if(in_array($this->action, array('index', 'add'))){  // Allow Managers to Add
				return true;
			}

			if(in_array($this->action, array('edit', 'view', 'delete', 'sendFile'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->OtherPoliciesAndProcedure->isOwnedBy($id, $client)){
					($this->OtherPoliciesAndProcedure->isOwnedBy($id, $client));
					return true;
				}

			}
		}

		if($group == 3){
			if(in_array($this->action, array('view', 'sendFile'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->OtherPoliciesAndProcedure->isOwnedBy($id, $client)){
					($this->OtherPoliciesAndProcedure->isOwnedBy($id, $client));
					return true;
				}

			}
			
			if(in_array($this->action, array('index'))){
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

		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.

		if($group == 1){
			$this->OtherPoliciesAndProcedure->recursive = 0;
			$this->paginate = array('order' => array('OtherPoliciesAndProcedure.client_id' => 'ASC'));
			$this->set('otherPoliciesAndProcedures', $this->paginate());
		} elseif($group == 2 || $group == 3) {
			$this->paginate = array(
				'conditions' => array('OtherPoliciesAndProcedure.client_id' => $client),
				'order' => array('OtherPoliciesAndProcedure.name' => 'ASC')
			);
			$this->set('otherPoliciesAndProcedures', $this->paginate());
		}
		$this->OtherPoliciesAndProcedure->recursive = 0;
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

		$this->OtherPoliciesAndProcedure->id = $id;
		if (!$this->OtherPoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid Other policy and procedure'));
		}

		if($group == 1){
			$this->set('otherPoliciesAndProcedure', $this->OtherPoliciesAndProcedure->read(null, $id));
			
		} elseif($group == 2 || $group == 3){
			$is_authorized = $this->OtherPoliciesAndProcedure->find('first', array(
				'conditions' => array(
					'OtherPoliciesAndProcedure.id' => $id,
					'AND' => array('OtherPoliciesAndProcedure.client_id' => $client)
				)
			));
				
			if($is_authorized){
				$this->set('otherPoliciesAndProcedure', $this->OtherPoliciesAndProcedure->read(null, $id));
			} else { // Else Banned!
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			}
		} else { // Else Banned
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
				$this->request->data['OtherPoliciesAndProcedure']['client_id'] = $this->Auth->User('client_id');
				$this->request->data['OtherPoliciesAndProcedure']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key
			} else {
				$this->loadModel('Client');
				$key = $this->Client->find('first', array('conditions' => array(
							'Client.id' => $this->request->data['OtherPoliciesAndProcedure']['client_id']),
							'fields' => 'Client.file_key'
							));
				$this->request->data['OtherPoliciesAndProcedure']['file_key'] = $key['Client']['file_key'];
			}

			$this->OtherPoliciesAndProcedure->create();
			if ($this->OtherPoliciesAndProcedure->save($this->request->data)) {
				$this->Session->setFlash('The other policies and procedure has been saved.', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The other policies and procedure could not be saved. Please, try again.'));
			}
		}
		$clients = $this->OtherPoliciesAndProcedure->Client->find('list');
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
		
		$this->OtherPoliciesAndProcedure->id = $id;
		if (!$this->OtherPoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid other policies and procedure'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
         		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
				if($group != 1){
					$this->request->data['OtherPoliciesAndProcedure']['client_id'] = $this->Auth->User('client_id');
					$this->request->data['OtherPoliciesAndProcedure']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key
				} else {
						$this->loadModel('Client');
						$key = $this->Client->find('first', array('conditions' => array(
									'Client.id' => $this->data['OtherPoliciesAndProcedure']['client_id']),
									// /'fields' => array('Client.file_key', 'Client.id'),
									));
						$this->request->data['OtherPoliciesAndProcedure']['file_key'] = $key['Client']['file_key'];
				}

			if ($this->OtherPoliciesAndProcedure->save($this->request->data)) {
				$this->Session->setFlash('The other policies and procedure has been saved.', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The other policies and procedure could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OtherPoliciesAndProcedure->read(null, $id);
		}
		$clients = $this->OtherPoliciesAndProcedure->Client->find('list');
		$doc = $this->OtherPoliciesAndProcedure->data['OtherPoliciesAndProcedure']['attachment'];
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
		$this->OtherPoliciesAndProcedure->id = $id;
		if (!$this->OtherPoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid other policies and procedure'));
		}
		if ($this->OtherPoliciesAndProcedure->delete()) {
			$this->Session->setFlash(__('Other policies and procedure deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Other policies and procedure was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}
}
