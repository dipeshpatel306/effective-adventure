<?php
App::uses('AppController', 'Controller');
/**
 * Policies Controller
 *
 * @property Policy $Policy
 */
class PoliciesController extends AppController {

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
		$clientId = $this->Session->read('Auth.User.Client.account_type');
		if($group == 2){ // Allow Managers to add/edit/delete their own data
			if($clientId == 'Meaningful Use'){
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
			if($clientId == 'Meaningful Use'){
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
			$this->Policy->recursive = 0;
			$this->paginate = array('order' => array('Policy.client_id' => 'ASC'));
			$this->set('policies', $this->paginate());
		} elseif($group == 2 || $group == 3) {
			$this->paginate = array(
				'conditions' => array('Policy.client_id' => $client),
				'order' => array('Policy.name' => 'ASC')
			);
			$this->set('policies', $this->paginate());
		} 
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
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
		
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		
		if($group == 1){
			$this->set('policy', $this->Policy->read(null, $id));
		} elseif($group == 2 || $group == 3){
			$is_authorized = $this->Policy->find('first', array(
				'conditions' => array(
					'Policy.id' => $id,
					'AND' => array('Policy.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('policy', $this->Policy->read(null, $id));
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
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->Policy->create();
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		}
		$clients = $this->Policy->Client->find('list');
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
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Policy->read(null, $id);
		}
		$clients = $this->Policy->Client->find('list');
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
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		if ($this->Policy->delete()) {
			$this->Session->setFlash(__('Policy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Policy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
