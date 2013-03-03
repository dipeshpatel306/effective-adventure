<?php
App::uses('AppController', 'Controller');
/**
 * PoliciesAndProcedures Controller
 *
 * @property PoliciesAndProcedure $PoliciesAndProcedure
 */
class PoliciesAndProceduresController extends AppController {
	
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
				if($this->Policy->isOwnedBy($id, $client)){
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

		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 
		
		if($group == 1){
			$this->PoliciesAndProcedure->recursive = 0;
			$this->paginate = array('order' => array('policiesAndProcedure.client_id' => 'ASC'));
			$this->set('policiesAndProcedures', $this->paginate());
		} elseif($group == 2 || $group == 3) {
			$this->paginate = array(
				'conditions' => array('policiesAndProcedure.client_id' => $client),
				'order' => array('policiesAndProcedure.name' => 'ASC')
			);
			$this->set('policiesAndProcedures', $this->paginate());
		} 
		$this->PoliciesAndProcedure->recursive = 0;
		$this->set('policiesAndProcedures', $this->paginate());

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
		
		$this->PoliciesAndProcedure->id = $id;
		if (!$this->PoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid policy and procedure'));
		}
		
		if($group == 1){
			$this->set('policiesAndProcedure', $this->PoliciesAndProcedure->read(null, $id));
		} elseif($group == 2 || $group == 3){
			$is_authorized = $this->PoliciesAndProcedure->find('first', array(
				'conditions' => array(
					'PoliciesAndProcedure.id' => $id,
					'AND' => array('PoliciesAndProcedure.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('policiesAndProcedure', $this->PoliciesAndProcedure->read(null, $id));
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
	public function add() {
		
		if ($this->request->is('post')) {
			
			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
			if($group != 1){
				$this->request->data['PoliciesAndProcedure']['client_id'] = $this->Auth->User('client_id');
				$this->request->data['PoliciesAndProcedure']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key					
			} else {
				$this->loadModel('Client');
				$key = $this->Client->find('first', array('conditions' => array(
							'Client.id' => $this->request->data['PoliciesAndProcedure']['client_id']),
							'fields' => 'Client.file_key'
							));
				$this->request->data['PoliciesAndProcedure']['file_key'] = $key['Client']['file_key'];
			}				
			
			$this->PoliciesAndProcedure->create();
			if ($this->PoliciesAndProcedure->save($this->request->data)) {
				$this->Session->setFlash('The policy and procedure has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		}
		$clients = $this->PoliciesAndProcedure->Client->find('list');
		$this->set(compact('clients'));		
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PoliciesAndProcedure->id = $id;
		if (!$this->PoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid policies and procedure'));
		}
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin? 
		if($group != 1){
			$this->request->data['PoliciesAndProcedure']['client_id'] = $this->Auth->User('client_id');			
			$this->request->data['PoliciesAndProcedure']['file_key'] = $this->Session->read('Auth.User.Client.file_key'); // file key			
		} else {
				$this->loadModel('Client');
				$key = $this->Client->find('first', array('conditions' => array(
							'Client.id' => $this->request->data['PoliciesAndProcedure']['client_id']),
							'fields' => 'Client.file_key'
							));
				$this->request->data['PoliciesAndProcedure']['file_key'] = $key['Client']['file_key'];
		}
			
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PoliciesAndProcedure->save($this->request->data)) {
				$this->Session->setFlash('The policies and procedure has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies and procedure could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PoliciesAndProcedure->read(null, $id);
		}
		$clients = $this->PoliciesAndProcedure->Client->find('list');
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
		$this->PoliciesAndProcedure->id = $id;
		if (!$this->PoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid policies and procedure'));
		}
		if ($this->PoliciesAndProcedure->delete()) {
			$this->Session->setFlash(__('Policies and procedure deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Policies and procedure was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
