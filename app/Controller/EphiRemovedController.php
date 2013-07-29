<?php
App::uses('AppController', 'Controller');
/**
 * EphiRemoved Controller
 *
 * @property EphiRemoved $EphiRemoved
 */
class EphiRemovedController extends AppController {

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
			if($acct == 'Meaningful Use'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;				
			}
			if(in_array($this->action, array('index', 'view','add'))){  // Allow Managers to Add 
				return true;
			}
				
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->EphiRemoved->isOwnedBy($id, $client)){
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
 * index method
 *
 * @return void
 */
	public function index() {
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 

		if($group == 1){
			$this->EphiRemoved->recursive = 0;
			$this->paginate = array('order' => array('EphiRemoved.client_id' => 'ASC'));			
			$this->set('ephiRemoved', $this->paginate());			
		}elseif($group == 2) {
			$this->paginate = array(
				'conditions' => array('EphiRemoved.client_id' => $client),
				'order' => array('EphiRemoved.name' => 'ASC')
			);
			$this->set('ephiRemoved', $this->paginate());
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
		
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid Ephi Removed'));
		}

		if($group == 1){
			$this->set('ephiRemoved', $this->EphiRemoved->read(null, $id));
		} elseif($group == 2){
				$is_authorized = $this->EphiRemoved->find('first', array(
				'conditions' => array(
					'EphiRemoved.id' => $id,
					'AND' => array('EphiRemoved.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('ephiRemoved', $this->EphiRemoved->read(null, $id));
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
				$this->request->data['EphiRemoved']['client_id'] = $this->Auth->User('client_id');
			}	

			$this->EphiRemoved->create();
			if ($this->EphiRemoved->save($this->request->data)) {
				$this->Session->setFlash('The ephi removed has been saved', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The ephi removed could not be saved. Please, try again.'));
			}
		}
		$clients = $this->EphiRemoved->Client->find('list');
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
				
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		// If user is a client automatically set the client id accordingly. Admin can change client ids
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		if($group != 1){
			$this->request->data['EphiRemoved']['client_id'] = $this->Auth->User('client_id');
		}		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EphiRemoved->save($this->request->data)) {
				$this->Session->setFlash('The ephi removed has been saved', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The ephi removed could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EphiRemoved->read(null, $id);
		}
		$clients = $this->EphiRemoved->Client->find('list');
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
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		if ($this->EphiRemoved->delete()) {
			$this->Session->setFlash(__('Ephi removed deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ephi removed was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}