<?php
App::uses('AppController', 'Controller');
/**
 * Policies Controller
 *
 * @property Policy $Policy
 */
class PoliciesController extends AppController { // TODO fix this
	
/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * Policies - Subscription Managers can index/view/add/edit/delete their own data
 * 			- Subscription Users cannot Access
 * 			- MU Managers cannot access
 * 			- MU Users cannot Access
 * Other Policies - Subscription Managers can index/view/add/edit/delete their own data
 * 				  - Subscription Users can Index/View 
 * 				  - MU Managers Index/View/Add/Edit/Delete 
 * 				  - MU Users can only Index/View  
 * @return void
 */
 
 public function beforeFilter(){
	parent::beforeFilter();
 	$this->Auth->authorize = array('controller');
 }
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 
		$clientType = $this->Session->read('Auth.User.Client.account_type'); // Test Client Type
		if(!empty($this->request->params['pass'][0])){ // see if parameter is passed
			$id = $this->request->params['pass'][0];
		}
 									
 		if ($group == 1){ // is admin allow all
 			return true;
 		}
		
		if ($group == 2){ // Manager  

			if(in_array($this->action, array('policies_and_procedures', 'other_policies_and_procedures', 'add'))){ // index action
			
				if($clientType == 'Meaningful Use'){  // deny access if meaningful use
					$this->Session->setFlash('You are not authorized to view that!');
					$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
					return false;

				}

				return true;		 
			}
			
			if(in_array($this->action, array('edit', 'view', 'delete'))){
				
				if($clientType == 'Meaningful Use'){  // deny access if meaningful use or empty
					$this->Session->setFlash('You are not authorized to view that!');
					$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
					return false;
				}				
				if(empty($id)){
					$this->Session->setFlash('You are not authorized to view that!');
					$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
					return false;
				}
				if($this->Policy->isOwnedBy($id, $client)){  // check client
					return true;
				} 
				
				$this->Session->setFlash('You are not authorized to view that!');  // Deny all other cases
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;	
			}	
		}
		
		if($group == 3){
			if($clientType == 'Meaningful Use'){  // deny access if meaningful use
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			} 
			
			if(in_array($this->action, array('policies_and_procedures', 'other_policies_and_procedures'))){ // index action
			
				return true;		 
			}
			
			if(in_array($this->action, array('view'))){ // index action

				if(empty($id)){
					$this->Session->setFlash('You are not authorized to view that!');
					$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
					return false;
				}
			
				if($this->Policy->isOwnedBy($id, $client)){  // check client
					return true;
				} 
				return false;		 
			}			
			
			if(in_array($this->action, array('add', 'edit', 'delete'))){  // Allow Read only
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			}
			
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			return false;
		}
		return false;
		//return parent::isAuthorized($user);
 	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}

/**
 * Policies and Procedures Index method
 * @return void
 */
	public function policies_and_procedures() {
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 		
		if($group == 1){ // Show all if Admin
			$this->paginate = array(
				'conditions' => array('Policy.policy_type LIKE' => 'Policies & Procedures'),
				'order' => array('Policy.name' => 'ASC')
			);
			$this->Policy->recursive = 0;
			$this->set('policies', $this->paginate());
		
		} elseif($group == 2 || $group == 3){
			$this->paginate = array(  // else show only from client
				'conditions' => array('Policy.client_id' => $client, 'Policy.policy_type LIKE' => 'Policies & Procedures'),
				'order' => array('Policy.name' => 'ASC')
			);
			$this->set('policies', $this->paginate());
			
		} else {
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			return false;			
		}
		/*$this->paginate = array(
			'conditions' => array('Policy.policy_type LIKE' => 'Policies & Procedures'),
			'order' => array('Policy.name' => 'ASC')
		);
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());*/
	}
/**
 * Other Policies and Procedures Index method
 * @return void
 */
	public function other_policies_and_procedures() {
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 

		if($group == 1){ // Show all if Admin
			$this->paginate = array(
				'conditions' => array('Policy.policy_type LIKE' => 'Other Policies & Procedures'),
				'order' => array('Policy.name' => 'ASC')
			);
			$this->Policy->recursive = 0;
			$this->set('policies', $this->paginate());
		
		} elseif($group == 2 || $group == 3){
			$this->paginate = array(  // else show only from client
				'conditions' => array('Policy.client_id' => $client, 'Policy.policy_type LIKE' => 'Other Policies & Procedures'),
				'order' => array('Policy.name' => 'ASC')
			);
			$this->set('policies', $this->paginate());
			
		} else {
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			return false;			
		}		
		
		/*$this->paginate = array(
			'conditions' => array('Policy.policy_type LIKE' => 'Other Policies & Procedures'),
			'order' => array('Policy.name' => 'ASC')
		);
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());*/
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		$this->set('policy', $this->Policy->read(null, $id));
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

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		$this->set('policy', $this->Policy->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Policy->create();
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
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
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
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
