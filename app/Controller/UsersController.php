<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
    	$this->Auth->allow('login', 'logout');		
	    //$this->Auth->allow('*');
	    // Runs ACL Permission Setup. Disable when not in use
	    $this->Auth->allow('initDB'); 
	}

/**
 * Acl Setup Permissions. Comment out when not is use.
 * 
 */	
	public function initDB() {
	    $group = $this->User->Group;
	    //Allow admins to everything
	    $group->id = 1;
	    $this->Acl->allow($group, 'controllers');
	
	    //allow managers to posts and widgets
	    $group->id = 2;
	    $this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Dashboard');
		$this->Acl->allow($group, 'controllers/Users');
		
		$this->Acl->allow($group, 'controllers/Policies');
		$this->Acl->allow($group, 'controllers/OtherPolicies');
		
		$this->Acl->allow($group, 'controllers/RiskAssessmentDocuments');
		$this->Acl->allow($group, 'controllers/BusinessAssociateAgreements');
		$this->Acl->allow($group, 'controllers/DisasterRecoveryPlans');
		$this->Acl->allow($group, 'controllers/OtherContractsAndDocuments');
		
		$this->Acl->allow($group, 'controllers/SecurityIncidents');
		$this->Acl->allow($group, 'controllers/ServerRoomAccess');
		$this->Acl->allow($group, 'controllers/EphiRecieved');
		$this->Acl->allow($group, 'controllers/EphiRemoved');
		
		$this->Acl->allow($group, 'controllers/SirtTeams');
		$this->Acl->allow($group, 'controllers/SirtMembers');
		
		$this->Acl->allow($group, 'controllers/ContactUs/contact');	
	
	    //allow users to only add and edit on posts and widgets
	    $group->id = 3;
	    $this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Dashboard');
		
		$this->Acl->allow($group, 'controllers/Policies');
		$this->Acl->allow($group, 'controllers/OtherPolicies');
		
		$this->Acl->allow($group, 'controllers/RiskAssessmentDocuments');
		$this->Acl->allow($group, 'controllers/BusinessAssociateAgreements');
		$this->Acl->allow($group, 'controllers/DisasterRecoveryPlans');
		$this->Acl->allow($group, 'controllers/OtherContractsAndDocuments');
		
		$this->Acl->allow($group, 'controllers/SecurityIncidents');
		$this->Acl->allow($group, 'controllers/ServerRoomAccess');
		$this->Acl->allow($group, 'controllers/EphiRecieved');
		$this->Acl->allow($group, 'controllers/EphiRemoved');

		$this->Acl->allow($group, 'controllers/SirtTeams');
		$this->Acl->allow($group, 'controllers/SirtMembers');
		
		$this->Acl->allow($group, 'controllers/ContactUs/contact');	
	    //$this->Acl->allow($group, 'controllers/Modules/edit');
	    //we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
	}

/**
 * Login Method
 */
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash('Your username or password was incorrect.');
	        }
	    }
		if ($this->Session->read('Auth.User')) {
        	$this->Session->setFlash('You are logged in!');
			//$this->Session->write('User.id', $userId);
        	$this->redirect('/', null, false);
    	}

	}
/**
 * Logout Method
 */
	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());   
	}

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * Client Managers can only Add Edit Delete to their own group
 * Users can only see View and Index
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		
		if($group == 2){ // Allow Managers to add/edit/delete their own data
			
			if(in_array($this->action, array('index', 'view', 'add'))){  // Allow Managers to Add 
				return true;
			}
			
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->User->isOwnedBy($id, $client)){
					return true;
				}
			}	
		}
		
		if($group == 3){ // Deny Users
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
		
		if($group == 1){ // If Hipaa Admin then show all users 
			$this->User->recursive = 0;
			$this->paginate = array('order' => array('User.client_id' => 'ASC'));
			$this->set('users', $this->paginate());
			
		} elseif ($group == 2){ // If Manager display only users from that client
			$this->paginate = array(
				'conditions' => array('User.client_id' => $client),
				'order' => array('User.username' => 'ASC')
			);
			$this->set('users', $this->paginate());
		} else { // Else Banned!
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
		
		$this->User->id = $id; // get id
		if (!$this->User->exists()) { // if id doesn't exist then ban
			$this->Session->setFlash("That User Doesn't Exist!");
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			throw new NotFoundException(__('Invalid user'));
		}
			
		if($group == 1){ // If Hipaa Admin then allow User View
			$this->set('user', $this->User->read(null, $id));
		
		} elseif($group == 2) { // Check if Manager and same client
			$is_authorized = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $id,
					'AND' => array('User.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('user', $this->User->read(null, $id));
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
	public function add() { // TODO Secure Add Method
		if ($this->request->is('post')) {
			
			$this->request->data['User']['client_id'] = $this->Auth->User('client_id');
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$clients = $this->User->Client->find('list');
		$this->set(compact('groups', 'clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) { // TODO Secure Edit Method
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$clients = $this->User->Client->find('list');
		$this->set(compact('groups', 'clients'));
		unset($this->request->data['User']['password']); // todo implement better password handling for edit
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {  // TODO Secure Delete method
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


}
