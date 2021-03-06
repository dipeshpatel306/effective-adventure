<?php
App::uses('AppController', 'Controller');
/**
 * SecurityIncidents Controller
 *
 * @property SecurityIncident $SecurityIncident
 */
class SecurityIncidentsController extends AppController {

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
		
		if($group == 2  || $group == 3){
			if(in_array($this->action, array('index', 'view','add'))){  // Allow Managers to Add 
				return true;
			}
				
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->SecurityIncident->isOwnedBy($id, $client)){
					return true;
				}
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
			$this->SecurityIncident->recursive = 0;
			$this->paginate = array('order' => array('SecurityIncident.client_id' => 'ASC'));			
			$this->set('securityIncidents', $this->paginate());			
		}elseif($group == 2 || $group == 3) {
			$this->paginate = array(
				'conditions' => array('SecurityIncident.client_id' => $client),
				'order' => array('SecurityIncident.name' => 'ASC')
			);
			$this->set('securityIncidents', $this->paginate());
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
		
		$this->SecurityIncident->id = $id;
		if (!$this->SecurityIncident->exists()) {
			throw new NotFoundException(__('Invalid Security Incident'));
		}

		if($group == 1){
			$this->set('securityIncident', $this->SecurityIncident->read(null, $id));
		} elseif($group == 2 || $group == 3){
				$is_authorized = $this->SecurityIncident->find('first', array(
				'conditions' => array(
					'SecurityIncident.id' => $id,
					'AND' => array('SecurityIncident.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('securityIncident', $this->SecurityIncident->read(null, $id));
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
				$this->request->data['SecurityIncident']['client_id'] = $this->Auth->User('client_id');
			}	
							
			$this->SecurityIncident->create();
			if ($this->SecurityIncident->save($this->request->data)) {
				$this->Session->setFlash('The security incident has been saved.', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The security incident could not be saved. Please, try again.'));
			}
		}
		$clients = $this->SecurityIncident->Client->find('list');
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
		$this->SecurityIncident->id = $id;
		if (!$this->SecurityIncident->exists()) {
			throw new NotFoundException(__('Invalid security incident'));
		}
		
		// If user is a client automatically set the client id accordingly. Admin can change client ids
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		if($group != 1){
			$this->request->data['SecurityIncident']['client_id'] = $this->Auth->User('client_id');
		}			
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SecurityIncident->save($this->request->data)) {
				$this->Session->setFlash('The security incident has been saved', 'default', array('class' => 'success message'));
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
				$this->Session->setFlash(__('The security incident could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SecurityIncident->read(null, $id);
		}
		$clients = $this->SecurityIncident->Client->find('list');
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
		$this->SecurityIncident->id = $id;
		if (!$this->SecurityIncident->exists()) {
			throw new NotFoundException(__('Invalid security incident'));
		}
		if ($this->SecurityIncident->delete()) {
			$this->Session->setFlash(__('Security incident deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Security incident was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}
}
