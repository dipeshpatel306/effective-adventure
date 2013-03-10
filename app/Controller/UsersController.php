<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


	public function beforeFilter() {
	    parent::beforeFilter();
    	$this->Auth->allow('login', 'register', 'logout', 'forgot_password', 'reset_password');	
		
		// $this->Auth->scope = array('User.active' => 'No');	
	    //$this->Auth->allow('*');
	    // Runs ACL Permission Setup. Disable when not in use
	    //$this->Auth->allow('initDB'); 
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
		$this->Acl->allow($group, 'controllers/Dashboard/about_hipaa');
		$this->Acl->allow($group, 'controllers/Dashboard/policies_and_procedures');
		$this->Acl->allow($group, 'controllers/Dashboard/contracts_and_documents');
		$this->Acl->allow($group, 'controllers/Dashboard/track_and_document');
		$this->Acl->allow($group, 'controllers/Dashboard/social_center');
		$this->Acl->allow($group, 'controllers/Dashboard/information_center');
		$this->Acl->allow($group, 'controllers/Dashboard/mark_complete');
		
		$this->Acl->allow($group, 'controllers/Users');
		$this->Acl->allow($group, 'controllers/Users/register');
		$this->Acl->allow($group, 'controllers/Users/forgot_password');
		$this->Acl->allow($group, 'controllers/Users/reset_password');
		
		$this->Acl->allow($group, 'controllers/PoliciesAndProcedures/index');
		$this->Acl->allow($group, 'controllers/PoliciesAndProcedures/view');
		$this->Acl->allow($group, 'controllers/PoliciesAndProceduresDocuments');
		$this->Acl->allow($group, 'controllers/OtherPoliciesAndProcedures');
		
		$this->Acl->allow($group, 'controllers/RiskAssessmentDocuments');
		$this->Acl->allow($group, 'controllers/BusinessAssociateAgreements');
		$this->Acl->allow($group, 'controllers/DisasterRecoveryPlans');
		$this->Acl->allow($group, 'controllers/OtherContractsAndDocuments');
		
		$this->Acl->allow($group, 'controllers/SecurityIncidents');
		$this->Acl->allow($group, 'controllers/ServerRoomAccess');
		$this->Acl->allow($group, 'controllers/EphiReceived');
		$this->Acl->allow($group, 'controllers/EphiRemoved');
		
		$this->Acl->allow($group, 'controllers/EducationCenter');
		
		$this->Acl->allow($group, 'controllers/SirtTeams');
		$this->Acl->allow($group, 'controllers/SirtMembers');
		
		$this->Acl->allow($group, 'controllers/ContactUs/contact');	
		
		$this->Acl->allow($group, 'controllers/RiskAssessments/take_risk_assessment');
		$this->Acl->allow($group, 'controllers/OrganizationProfiles');		
	
	    //allow users to only add and edit on posts and widgets
	    $group->id = 3;
	    $this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'controllers/Dashboard/about_hipaa');
		$this->Acl->allow($group, 'controllers/Dashboard/policies_and_procedures');
		$this->Acl->allow($group, 'controllers/Dashboard/contracts_and_documents');
		$this->Acl->allow($group, 'controllers/Dashboard/track_and_document');
		$this->Acl->allow($group, 'controllers/Dashboard/social_center');
		$this->Acl->allow($group, 'controllers/Dashboard/information_center');	
		$this->Acl->allow($group, 'controllers/Dashboard/mark_complete');	
			
		$this->Acl->allow($group, 'controllers/Users/register');
		$this->Acl->allow($group, 'controllers/Users/forgot_password');
		$this->Acl->allow($group, 'controllers/Users/reset_password');		
		
		$this->Acl->allow($group, 'controllers/Users/edit');	
		
		$this->Acl->allow($group, 'controllers/PoliciesAndProcedures/index');
		$this->Acl->allow($group, 'controllers/PoliciesAndProcedures/view');
		$this->Acl->allow($group, 'controllers/PoliciesAndProceduresDocuments');		
		$this->Acl->allow($group, 'controllers/OtherPoliciesAndProcedures');
		
		$this->Acl->allow($group, 'controllers/RiskAssessmentDocuments');
		$this->Acl->allow($group, 'controllers/BusinessAssociateAgreements');
		$this->Acl->allow($group, 'controllers/DisasterRecoveryPlans');
		$this->Acl->allow($group, 'controllers/OtherContractsAndDocuments');
		
		$this->Acl->allow($group, 'controllers/SecurityIncidents');
		$this->Acl->allow($group, 'controllers/ServerRoomAccess');
		$this->Acl->allow($group, 'controllers/EphiReceived');
		$this->Acl->allow($group, 'controllers/EphiRemoved');
		
		$this->Acl->allow($group, 'controllers/EducationCenter');				

		$this->Acl->allow($group, 'controllers/SirtTeams');
		$this->Acl->allow($group, 'controllers/SirtMembers');
		
		$this->Acl->allow($group, 'controllers/ContactUs/contact');	
		
		$this->Acl->allow($group, 'controllers/RiskAssessments/take_risk_assessment');
		$this->Acl->allow($group, 'controllers/OrganizationProfiles');			
	    //we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
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
		$userId = $this->Session->read('Auth.User.id');
		
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
		
		if($group == 3 || $group == 'initial'){ // Allow user to edit own profile
			if(in_array($this->action, array('edit'))){
				$id = $this->request->params['pass'][0];
				if($this->User->isUser($userId)){
					return true;
				}
		}	
			return false;
		}
		
		return parent::isAuthorized($user);
 	}

/**
 * Login Method
 */
	public function login() {

	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {	
				
				$user = $this->User->find('first', array(
						'conditions' => array('User.email' => $this->request->data['User']['email']),
											'fields' => array('User.active','Client.active'),
				));

				// Check to make sure both client and user are active
				if($user['Client']['active'] != 'Yes' || $user['User']['active'] != 'Yes'){
					$this->Session->setFlash('Your account is not active!');
					$this->Auth->logout();
					$this->redirect('login');
					
				} else {
	        		$dateTime = date('Y-m-d H:i:s'); // Get DateTime
					
					$this->User->Client->id = $this->Session->read('Auth.User.client_id');  // Get correct Client
					$this->User->Client->saveField('last_login', $dateTime);  // Save last login to Client DB
					$this->Session->write('Auth.User.Client.last_login', $dateTime);  // write client login into session
				
					$this->User->id = $this->Session->read('Auth.User.id');  // Get User id
					$this->User->saveField('last_login', $dateTime);  // Save last login to user DB
					$this->Session->write('Auth.User.last_login', $dateTime);  // write user login into user session
					$this->redirect($this->Auth->redirect());					
				}

	        } else {
	            $this->Session->setFlash('Your username or password was incorrect.');
	        }
	    }
		if ($this->Session->read('Auth.User')) {
        	$this->Session->setFlash('You are logged in!', 'default', array('class' => 'success message'));
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
 * forgotpwd method
 */
 function forgot_password(){
 	$this->User->recursive = -1;
	if(!empty($this->request->data)){
		if(empty($this->request->data['User']['email'])){
			$this->Session->setFlash('Please provide the email that you used to register with us.');
		} else {
			$email = $this->request->data['User']['email'];
			$foundUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
			
			if($foundUser){
				if($foundUser['User']['active'] == 'Yes'){
					$key = Security::hash(String::uuid(), 'sha512', true);
					$hash = sha1($foundUser['User']['first_name'].rand(0,100));
					$url = Router::url(array('controller' => 'users', 'action' => 'reset'), true) . '/' . $key . '#' . $hash;
					$ms = $url;
					$ms = wordwrap($ms, 1000);
					
					$foundUser['User']['tokenhash'] = $key;
					$this->User->id = $foundUser['User']['id'];
					if($this->User->saveField('tokenhash', $foundUser['User']['tokenhash'])){

						// Send Email
						$email = new CakeEmail('hipaaMail'); 
						$email->from('no-reply@hipaasecurenow.com');
						$email->to($foundUser['User']['email']);
						$email->subject('HIPAA Password Reset');
						$email->send($ms);
				
						$this->Session->setFlash('Your password reset has been sent. Please check your email', 'default', array('class' => 'success message'));
						$this->redirect(array('controller' => 'users','action' => 'login'));
						
					} else {
						$this->Session->setFlash('There was an error sending you a reset email.');
					}
					
				} else {
					$this->Session->setFlash('Your account is not active yet!');
				}
				
			} else {
				$this->Session->setFlash('That email does not exist.');
			}	
	   }
	}	
 }

/**
 * Reset Method
 * 
 */
 function reset($token=null){
        $this->User->recursive = -1;
        if(!empty($token)){
            $u=$this->User->findBytokenhash($token);                       
            if($u){               
                $this->User->id = $u['User']['id'];                                               
                if(!empty($this->data)){                   
                    $this->User->request->data=$this->data;
                    $this->User->request->data['User']['username']=$u['User']['username'];                   
                    $new_hash = sha1($u['User']['username'].rand(0,100));//created token
                    $this->User->request->data['User']['tokenhash']=$new_hash;                   
                    if($this->User->validates(array('fieldList'=>array('password','password_confirm')))){                       
                        if($this->User->save($this->User->data))
                        {
                            $this->Session->setFlash('Password Has been Updated');
                            $this->redirect(array('controller'=>'users','action'=>'login'));
                        }
                    } else {
                        $this->set('errors',$this->User->invalidFields());                       
                    }
                }
            } else {
                $this->Session->setFlash('Token Corrupted,,Please Retry.the reset link work only for once.');
            }
        } else {
            $this->redirect('/');   
        }   
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
	public function add() { 
		if ($this->request->is('post')) {
				
			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
			if($group != 1){
				$this->request->data['User']['client_id'] = $this->Auth->User('client_id'); 
				
				if($this->request->data['User']['group_id'] == 1){  // If client tries to spoof Hipaa admin group redirect them
					$this->redirect(array('action' => 'index'));
					$this->Session->setFlash(__('You are not authorized to do that!'));
				}
			}
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved', 'default', array('class' => 'success message'));
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
 * New user account method
 *
 * @return void
 */
	public function register() {

		if ($this->request->is('post')) {
				
			$this->loadModel('Client');  // load client Model			
			$authCode = $this->request->data['User']['authCode'];  // get submited authCode

			$userCode = $this->Client->find('first', array('conditions' => array('Client.user_account' => $authCode)));// check if user code exists
			$adminCode = $this->Client->find('first', array('conditions' => array('Client.admin_account' => $authCode))); // check if admin code exists	
			
			
			if(isset($userCode) && !empty($userCode)){  // if user set client and role
				$this->request->data['User']['group_id'] = 3; // set Group Id to to User
				$this->request->data['User']['client_id'] = $userCode['Client']['id'];  // set Client id  	
			} elseif(isset($adminCode) && !empty($adminCode)){ // if admin set client and role
				$this->request->data['User']['group_id'] = 2; // set Group Id to User
				$this->request->data['User']['client_id'] = $adminCode['Client']['id']; // set client id
			} else {
				$this->User->invalidate('authCode', 'Incorrect Authorization Code.', true); // auth Code doesnt exist so deny.
			}

			if($this->User->validates()){ // check if invalidations exist
				$this->User->create();	
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash('Your Account has been successfully created. Check your email to activate your account.', 
					'default', array('class' => 'success message'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Your new account could not be created. Please, try again.'));
				}
			} else { // deny
					$errors = $this->User->validationErrors;
					$this->Session->setFlash(__('Your new account could not be created. Please, try again.'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
			
			
			if($group != 1){
				$this->request->data['User']['client_id'] = $this->Auth->User('client_id'); 
				
				/*if($this->request->data['User']['group_id'] == 1){  // If client tries to spoof Hipaa admin group redirect them
					$this->redirect(array('action' => 'index'));
					$this->Session->setFlash(__('You are not authorized to do that!'));
				}*/
				$this->request->data['User']['group_id'] = $this->Session->read('Auth.User.group_id');
				
			}
			

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved', 'default', array('class' => 'success message'));
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
	public function delete($id = null) {  
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
