<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

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

            /*'authorize' => array('Controller'),
            array(
            	//'Actions' => array('actionPath' => 'controllers')
            )*/
        ),
        'Session',
        'Security',
        'Cookie'
    );
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
    	// Login information
    	$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
		$this->Auth->authenticate = array( // Use email as the login username
    		'Form' => array(
        	'fields' => array('username' => 'email', 'password' => 'password')
    		),
		);
        //Configure AuthComponent
		$this->Auth->authorize = array('controller');
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'Dashboard', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
		//$this->Auth->allow('display');
		
		
		// Moodle Cookie. Move it to login?
		$email = $this->Session->read('Auth.User.email');
		//$this->Cookie->write('u', $email, 0, '/', '.hipaasecurenow');
		setcookie('u', $email, 0, '/', '.hipaasecurenow.com');
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
