<?php
App::uses('AppController', 'Controller');
/**
 * EphiReceived Controller
 *
 * @property EphiReceived $EphiReceived
 */
class EphiReceivedController extends AppController {

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
				if($this->EphiReceived->isOwnedBy($id, $client)){
					return true;
				}
			}
		}
		
		if($group == 3){
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
			$this->EphiReceived->recursive = 0;
			$this->paginate = array('order' => array('EphiReceived.client_id' => 'ASC'));			
			$this->set('ephiReceived', $this->paginate());			
		}elseif($group == 2) {
			$this->paginate = array(
				'conditions' => array('EphiReceived.client_id' => $client),
				'order' => array('EphiReceived.name' => 'ASC')
			);
			$this->set('ephiReceived', $this->paginate());
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
		
		$this->EphiReceived->id = $id;
		if (!$this->EphiReceived->exists()) {
			throw new NotFoundException(__('Invalid Ephi Received'));
		}

		if($group == 1){
			$this->set('ephiReceived', $this->EphiReceived->read(null, $id));
		} elseif($group == 2){
				$is_authorized = $this->EphiReceived->find('first', array(
				'conditions' => array(
					'EphiReceived.id' => $id,
					'AND' => array('EphiReceived.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('ephiReceived', $this->EphiReceived->read(null, $id));
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
	public function add() {
		if ($this->request->is('post')) {
			
			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
			if($group != 1){
				$this->request->data['EphiReceived']['client_id'] = $this->Auth->User('client_id');
			}				

			$this->EphiReceived->create();
			if ($this->EphiReceived->save($this->request->data)) {
				$this->Session->setFlash('The ephi received has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi received could not be saved. Please, try again.'));
			}
		}
		$clients = $this->EphiReceived->Client->find('list');
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
		$this->EphiReceived->id = $id;
		if (!$this->EphiReceived->exists()) {
			throw new NotFoundException(__('Invalid ephi received'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EphiReceived->save($this->request->data)) {
				$this->Session->setFlash('The ephi received has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi received could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EphiReceived->read(null, $id);
		}
		$clients = $this->EphiReceived->Client->find('list');
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
		$this->EphiReceived->id = $id;
		if (!$this->EphiReceived->exists()) {
			throw new NotFoundException(__('Invalid ephi received'));
		}
		if ($this->EphiReceived->delete()) {
			$this->Session->setFlash(__('Ephi received deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ephi received was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}