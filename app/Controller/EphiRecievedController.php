<?php
App::uses('AppController', 'Controller');
/**
 * EphiRecieved Controller
 *
 * @property EphiRecieved $EphiRecieved
 */
class EphiRecievedController extends AppController {

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
		$clientId = $this->Session->read('Auth.User.Client.account_type');
		
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
				if($this->EphiRecieved->isOwnedBy($id, $client)){
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
			$this->EphiRecieved->recursive = 0;
			$this->paginate = array('order' => array('EphiRecieved.client_id' => 'ASC'));			
			$this->set('ephiRecieved', $this->paginate());			
		}elseif($group == 2) {
			$this->paginate = array(
				'conditions' => array('EphiRecieved.client_id' => $client),
				'order' => array('EphiRecieved.name' => 'ASC')
			);
			$this->set('ephiRecieved', $this->paginate());
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
		
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid Ephi Recieved'));
		}

		if($group == 1){
			$this->set('ephiRecieved', $this->EphiRecieved->read(null, $id));
		} elseif($group == 2){
				$is_authorized = $this->EphiRecieved->find('first', array(
				'conditions' => array(
					'EphiRecieved.id' => $id,
					'AND' => array('EphiRecieved.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('ephiRecieved', $this->EphiRecieved->read(null, $id));
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
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->EphiRecieved->create();
			if ($this->EphiRecieved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi recieved has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi recieved could not be saved. Please, try again.'));
			}
		}
		$clients = $this->EphiRecieved->Client->find('list');
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
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EphiRecieved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi recieved has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi recieved could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EphiRecieved->read(null, $id);
		}
		$clients = $this->EphiRecieved->Client->find('list');
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
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		if ($this->EphiRecieved->delete()) {
			$this->Session->setFlash(__('Ephi recieved deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ephi recieved was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}