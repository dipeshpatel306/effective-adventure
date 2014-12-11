<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Group', 'Model');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    public $components = array('Paginator', 'Security');
    
    public $paginate = array(
        'limit' => 100,
        'order' => array(
            'User.client_id' => 'asc'
        )
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'register', 'logout', 'forgot_password', 'reset_password');//, 'validate_email', 'resend_validation');
        $this->Cookie->name = 'hipaa';
        $this->Cookie->domain = '.hipaasecurenow.com';
        $this->Cookie->time = 0;
        //$this->Auth->autoRedirect = False;
        // $this->Auth->scope = array('User.active' => 'No');
        //$this->Auth->allow('*');
        // Runs ACL Permission Setup. Disable when not in use
        //$this->Auth->allow('initDB');
    }

    public function beforeValidate(array $options = array()){
        if ($this->request->is('post') || $this->request->is('put')) {

        // bypass email comparison for admin
            $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
            if($group == Group::ADMIN){
                $this->request->data['User']['email2'] = $this->request->data['User']['email'];
                return true;
            }

        }

        //pr($Group);

        return true;
    }

/**
 * Acl Setup Permissions. Comment out when not is use.
 *
 */
    public function initDB() {
        $group = $this->User->Group;

        //Allow admins to everything
        $group->id = Group::ADMIN;
        $this->Acl->allow($group, 'controllers');

        //allow managers to posts and widgets
        $group->id = Group::MANAGER;
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
        $group->id = Group::USER;
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

        if($group == Group::MANAGER){ // Allow Managers to add/edit/delete their own data

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

        if($group == Group::USER){ // Allow user to edit own profile
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
    public function login($email=null) {
        $this->set('title_for_layout', 'HIPAA Compliance Portal');
        if ($this->request->is('post')) {
            $user = $this->User->find(
                'first', 
                array(
                    'conditions' => array('User.email' => $this->request->data['User']['email']),
                    'fields' => array('User.active','Client.active', 'User.id', 'User.email_validated', 'User.password_old'),
                )
            ); 
                    
            if (isset($user) && isset($user['User']['password_old'])) {
                # migrate password to new hash format the first time a migrated QB user logs in
                if (md5($this->request->data['User']['password']) === $user['User']['password_old']) {
                    $this->User->id = $user['User']['id'];
                    $this->User->saveField('password', $this->request->data['User']['password']);
                }
            }
            
            if ($this->Auth->login()) {
                // Check to make sure both client and user are active
                if(!$user['Client']['active'] || !$user['User']['active']){
                    $this->Session->setFlash('Your account is not active!');
                    $this->Auth->logout();
                    $this->redirect('login');
                // } else if (!$user['User']['email_validated']) {
                    // $this->Session->setFlash('Email address not validated. ', 'session_flash_link', array(
                        // 'link_text' => 'Click here to resend the validation email',
                        // 'link_url' => array(
                            // 'controller' => 'users',
                            // 'action' => 'resend_validation', $user['User']['id']
                        // )));
                    // $this->redirect('login');
                } else {
                    $dateTime = date('Y-m-d H:i:s'); // Get DateTime
                    
                    $this->User->Client->id = $this->Session->read('Auth.User.client_id');  // Get correct Client
                    $this->User->Client->saveField('last_login', $dateTime);  // Save last login to Client DB
                    $this->Session->write('Auth.User.Client.last_login', $dateTime);  // write client login into session

                    $this->User->id = $this->Session->read('Auth.User.id');  // Get User id
                    $this->User->saveField('last_login', $dateTime);  // Save last login to user DB
                    
                    // save moodle token to db and cookie
                    $moodle_token = Security::hash(mt_rand(), 'md5', true);
                    $this->Cookie->write('hipaa_training_user', $this->request->data['User']['email'], false);
                    $this->Cookie->write('hipaa_training_token', $moodle_token, false);
                    $this->User->saveField('moodle_token', $moodle_token);
                    
                    $this->Session->write('Auth.User.last_login', $dateTime);  // write user login into user session
                    return $this->redirect($this->Auth->redirect(array('controller' => 'dashboard', 'action' => 'index')));
                }

            } else {
                $this->Session->setFlash('Your username or password was incorrect.');
            }
        }
        $this->set(compact('email'));
        //if ($this->Session->read('Auth.User')) {
            //$this->Session->setFlash('You are logged in!', 'default', array('class' => 'success message'));
            //$this->Session->write('User.id', $userId);
            //$this->redirect(array('controller' => 'dashboard'));
        //}
    }

/**
 * Logout Method
 */
    public function logout() {
        $this->Session->setFlash('Good-Bye');
        $this->Session->destroy();
        $this->Cookie->destroy();
        $this->redirect($this->Auth->logout());
    }
/**
 * forgotpwd method
 */
 public function forgot_password(){
    $this->User->recursive = -1;
    if(!empty($this->request->data)){
        if(empty($this->request->data['User']['email'])){
            $this->Session->setFlash('Please provide the email that you used to register with us.');
        } else {
            $email = $this->request->data['User']['email'];
            $foundUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));

            if($foundUser){
                if($foundUser['User']['active']){
                    $key = Security::hash(String::uuid(), 'sha512', true);
                    $hash = sha1($foundUser['User']['first_name'].rand(0,100));
                    $url = Router::url(array('controller' => 'Users', 'action' => 'reset_password'), true) . '/' . $key . '#' . $hash;
                    $ms = $url;
                    //$ms = wordwrap($ms, 1000);
                    $message = 
                        "Click on the link below to reset Your HIPAA Password.</p><br/>
                        <a href='" .  $ms .
                        
                        "'>Reset Your Password</a><br/>
                        <p>or Visit this Link</p>
                        <p><a href='" .  $ms . "'>" .  $ms . "</a></p>";                    

                    $foundUser['User']['tokenhash'] = $key;
                    $this->User->id = $foundUser['User']['id'];
                    if($this->User->saveField('tokenhash', $foundUser['User']['tokenhash'])){

                        // Send Email
                        $email = new CakeEmail('hipaaMail');
                        //$email->template('resetpw');
                        $email->emailFormat('html');
                        $email->from('no-reply@hipaasecurenow.com');
                        //$email->from('chris@gpointech.com');
                        $email->to($foundUser['User']['email']);
                        $email->subject('HIPAA Password Reset');
                        $email->send($message);

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
 public function reset_password($token = null){
        $this->User->recursive = -1;
        if(!empty($token)){
            $u = $this->User->findBytokenhash($token);
            $this->User->id = $u['User']['id'];

            if($u){
                    if ($this->request->is('post') || $this->request->is('put')) {

                    // change token so user can't use it again
                    $this->request->data['User']['first_name'] = $u['User']['first_name'];
                    $new_hash = sha1($u['User']['first_name'].rand(0,100));//created token
                    $this->request->data['User']['tokenhash'] = $new_hash;

                    if($this->User->save($this->request->data)){
                        $this->Session->setFlash('The user has been saved', 'default', array('class' => 'success message'));
                        $this->redirect(array('controller'=>'Users','action'=>'login'));
                    } else {
                        $this->Session->setFlash(__('Password did not save. Please, try again.'));
                    }
                }

            } else {
                $this->Session->setFlash('Password reset failed. Please try again. Each Reset link will only work once.');
            }

        } else {
            $this->Session->setFlash('You are not authorized to do that');
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

        $this->User->recursive = 0;
        $this->Paginator->settings['limit'] = 100;
		
		if (isset($this->request->data['User']['search'])) {
			$search = $this->request->data['User']['search'];	
			$conditions = array('OR' => array(
				'User.first_name LIKE' => "%$search%",
				'User.last_name LIKE' => "%$search%",
				'User.email LIKE' => "%$search%",
				'Client.name LIKE' => "%$search%"
			));
		} else {
			$conditions = array();
		}
        
        if($group == Group::ADMIN){ // If Hipaa Admin then show all users
            $this->set('users', $this->Paginator->paginate('User', $conditions));
        } elseif ($group == Group::MANAGER){ // If Manager display only users from that client
        	if (!isset($conditions['OR'])) {
        		$conditions = array('User.client_id' => $client);
			} else {
				$conditions['OR']['User.client_id'] = $client;
			}
            $this->set('users', $this->Paginator->paginate('User', $conditions));
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

        if($group == Group::ADMIN){ // If Hipaa Admin then allow User View
            $this->set('user', $this->User->read(null, $id));

        } elseif($group == Group::MANAGER) { // Check if Manager and same client
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
    public function add($clientId = null) {
        if(isset($clientId)){
            $this->set('clientId', $clientId);
        }
        
        if ($this->request->is('post')) {

            // If user is a client automatically set the client id accordingly. Admin can change client ids
            $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
            if($group != Group::ADMIN){
                $this->request->data['User']['client_id'] = $this->Auth->User('client_id');

                if($this->request->data['User']['group_id'] == Group::ADMIN){  // If client tries to spoof Hipaa admin group redirect them
                    $this->redirect(array('action' => 'index'));
                    $this->Session->setFlash(__('You are not authorized to do that!'));
                }
            }

            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved', 'default', array('class' => 'success message'));
                
            if($group == Group::ADMIN){
                if(isset($clientId)){
                    $this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));
                } else {
                    $this->redirect(array('action' => 'index'));    
                }
                
            } else {    
                $this->redirect(array('action' => 'index'));
            }

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
    public function register($code=null) {
        if ($this->request->is('post')) {
            $authCode = $this->request->data['User']['authCode'];  // get submited authCode

            $this->loadModel('Client');
            $fields = array('Client.id', 'Client.moodle_course_id');
            
            $client_admin = $this->Client->find('first', array(
                'conditions' => array('Client.admin_account' => $authCode), 
                'fields' => $fields
            )); // check if admin code exists
            
            $client_user = $this->Client->find('first', array(
                'conditions' => array('Client.user_account' => $authCode),
                'fields' => $fields
            )); // check if user code exists
            
            if(isset($client_user) && !empty($client_user)){  // if user set client and role
                $this->request->data['User']['group_id'] = Group::USER; // set Group Id to to User
                $this->request->data['User']['client_id'] = $client_user['Client']['id'];  // set Client id
                $this->request->data['User']['moodle_course_id'] = $client_user['Client']['moodle_course_id'];
            } elseif(isset($client_admin) && !empty($client_admin)){ // if admin set client and role
                $this->request->data['User']['group_id'] = Group::MANAGER; // set Group Id to User
                $this->request->data['User']['client_id'] = $client_admin['Client']['id']; // set client id
                $this->request->data['User']['moodle_course_id'] = $client_admin['Client']['moodle_course_id'];
            } else {
                $this->User->invalidate('authCode', 'Incorrect Authorization Code.', true); // auth Code doesnt exist so deny.
            }
            
            $this->request->data['User']['active'] = true; // activate user by default
            $this->request->data['User']['email_validated'] = true; //false;
            $this->request->data['User']['validation_code'] = self::_randomStr(10);

            if($this->User->validates()){ // check if invalidations exist
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('Your Account has been successfully created.', 'default', array('class' => 'success message'));
                    //$this->Session->setFlash('Your Account has been successfully created. 
                    //You must validate your email address before logging in. Please check your email for instructions.',
                    //'default', array('class' => 'success message'));
                    //$this->_sendNewUserEmail($this->User->id);
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Your new account could not be created. Please, try again.'));
                }
            } else { // deny
                $errors = $this->User->validationErrors;
                $this->Session->setFlash(__('Your new account could not be created. Please, try again.'));
            }
        }
        $this->set(compact('code'));
    }

    /*private function _sendNewUserEmail($id) {
        $user_data = $this->User->find('first', array('conditions' => array('User.id' => $id), 
            'fields' => array('User.email', 'User.validation_code', 'User.first_name', 'User.last_name')));
            
        if (!isset($user_data) || empty($user_data)) {
            return false;
        }
            
        $to = $user_data['User']['email'];
        $code = $user_data['User']['validation_code'];
        $first = $user_data['User']['first_name'];
        $last = $user_data['User']['last_name'];
            
        $email = new CakeEmail('hipaaMail');
        $email->to($to)
            ->subject('HIPAA Compliance Portal User Registration')
            ->template('newuser')
            ->emailFormat('html')
            ->viewVars(array('id' => $id, 'first_name' => $first, 'last_name' => $last, 'code' => $code))
            ->send();
        return true;
    }   

    public function validate_email($id) {
        $user_data = $this->User->find('first', array('conditions' => array('User.id' => $id), 'fields' => array('User.validation_code')));
        $supplied_code = $this->request->query('code');
        
        if (!isset($user_data) || empty($user_data)) {
            $this->Session->setFlash(__('User account not found. Please register.'));
            $this->redirect('register');
        } else if ($supplied_code === $user_data['User']['validation_code']) {
            $this->User->id = $id;
            $this->User->save(array('email_validated' => true));
            $this->Session->setFlash('Email address validated. Please login.', 'default', array('class' => 'success message'));
            $this->redirect('login');
        } else {
            $this->Session->setFlash(__('Email could not be validated. Please contact support'));
            $this->redirect('login');
        }
    }
    
    public function resend_validation($id) {
        if ($this->_sendNewUserEmail($id)) {
            $this->Session->setFlash('Validation email resent. Please check your email.', 'default', array('class' => 'success message'));
            $this->redirect('login');
        } else {
            $this->Session->setFlash(__('User account not found. Please register.'));
            $this->redirect('register');
        }
    }*/

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
 * admin edit method. Does not require password or email
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null, $clientId = null) {
        if(isset($clientId)){
            $this->set('clientId', $clientId);
        }   
            
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }


        if ($this->request->is('post') || $this->request->is('put')) {
            $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?

            if (empty($this->request->data['User']['password'])) {
                unset($this->request->data['User']['password']);
            }
            
            if($group != Group::ADMIN){
                $this->request->data['User']['client_id'] = $this->Auth->User('client_id');
                
                /*if($this->request->data['User']['group_id'] == 1){  // If client tries to spoof Hipaa admin group redirect them
                    $this->redirect(array('action' => 'index'));
                    $this->Session->setFlash(__('You are not authorized to do that!'));
                }*/
                $this->request->data['User']['group_id'] = $this->Session->read('Auth.User.group_id');

            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved', 'default', array('class' => 'success message'));
                if($group == Group::ADMIN && isset($clientId)) {
                    
                    $this->redirect(array('controller' => 'Clients', 'action' => 'view', $clientId));

                } else {
                    $this->redirect(array('action' => 'index'));
                }
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
