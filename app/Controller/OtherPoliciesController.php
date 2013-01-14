<?php
App::uses('AppController', 'Controller');
/**
 * OtherPolicies Controller
 *
 * @property OtherPolicy $OtherPolicy
 */
class OtherPoliciesController extends AppController {

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
		$clientId = $this->Session->read('Auth.User.account_type');
		
		if($group == 2){ // Allow Managers to add/edit/delete their own data
			
			if(in_array($this->action, array('index', 'view', 'add'))){  // Allow Managers to Add 
				return true;
			}
				
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->OtherPolicy->isOwnedBy($id, $client)){
					return true;
				}	
			}		
		}

		if($group == 3){
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
			$this->OtherPolicy->recursive = 0;
			$this->paginate = array('order' => array('OtherPolicy.client_id' => 'ASC'));
			$this->set('otherPolicies', $this->paginate());
		} elseif($group == 2 || $group == 3) {
			$this->paginate = array(
				'conditions' => array('OtherPolicy.client_id' => $client),
				'order' => array('OtherPolicy.name' => 'ASC')
			);
			$this->set('OtherPolicies', $this->paginate());
		} 
		$this->OtherPolicy->recursive = 0;
		$this->set('otherPolicies', $this->paginate());
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
		
		$this->OtherPolicy->id = $id;
		if (!$this->OtherPolicy->exists()) {
			throw new NotFoundException(__('Invalid Other Policy'));
		}
		
		if($group == 1){
			$this->set('Otherpolicy', $this->Policy->read(null, $id));
		} elseif($group == 2 || $group == 3){
			$is_authorized = $this->OtherPolicy->find('first', array(
				'conditions' => array(
					'OtherPolicy.id' => $id,
					'AND' => array('OtherPolicy.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('otherPolicy', $this->OtherPolicy->read(null, $id));
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
			$this->OtherPolicy->create();
			if ($this->OtherPolicy->save($this->request->data)) {
				$this->Session->setFlash(__('The other policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other policy could not be saved. Please, try again.'));
			}
		}
		$clients = $this->OtherPolicy->Client->find('list');
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
		$this->OtherPolicy->id = $id;
		if (!$this->OtherPolicy->exists()) {
			throw new NotFoundException(__('Invalid other policy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OtherPolicy->save($this->request->data)) {
				$this->Session->setFlash(__('The other policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other policy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OtherPolicy->read(null, $id);
		}
		$clients = $this->OtherPolicy->Client->find('list');
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
		$this->OtherPolicy->id = $id;
		if (!$this->OtherPolicy->exists()) {
			throw new NotFoundException(__('Invalid other policy'));
		}
		if ($this->OtherPolicy->delete()) {
			$this->Session->setFlash(__('Other policy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Other policy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
