<?php
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Acl',
        'Auth' => array(
        	'authorize' => array(
			'Actions' => array('actionPath' => 'controllers/'),
			'Controller'
			),
        ),
        'Session',
		'Security',
        'Cookie',
        'DebugKit.Toolbar'
    );
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
    	parent::beforeFilter();

		$this->Auth->authenticate = array( // Use email as the login username
    		'Form' => array(
        	'fields' => array('username' => 'email', 'password' => 'password')
    		),
		);

        $this->Auth->authorize = array('controller');
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'dashboard', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
		//$this->Auth->allow('display');
		// Login information
    	$this->set('logged_in', $this->Auth->loggedIn());
		//$this->set('current_user', $this->Auth->user());

		// Moodle Cookie. Move it to login?
		$email = $this->Session->read('Auth.User.email');
		//$this->Cookie->write('u', $email, 0, '/', '.hipaasecurenow');
		// /setcookie('u', $email, 0, '/', '.hipaasecurenow.com');
		$this->Security->blackHoleCallback = 'blackhole';
		// needed? without causing blackhole errors, likely because idiotically no data is required in some forms as per request
		//$this->Security->csrfCheck = false;
    }

	public function blackhole($type) {
    	debug($type);
	}
	public function isAuthorized($user){
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		if (isset($group) && $group == 1){ // is admin allow all
 			return true;
 		}
		$this->Session->setFlash('You are not authorized to view that!');
		$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		return false;
	}
}
