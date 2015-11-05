<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'Dashboard', 'action' => 'index'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	//Router::connect('/login', array('controller' => 'users', 'action' => 'maintenance'));
	//Router::connect('/users/login', array('controller' => 'users', 'action' => 'maintenance'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
    Router::connect('/login/:email', array('controller' => 'users', 'action' => 'login'), array('pass' => array('email'), 'email' => '.*'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/forgot_password', array('controller' => 'users', 'action' => 'forgot_password'));
	Router::connect('/reset_password', array('controller' => 'users', 'action' => 'reset_password'));
	Router::connect('/service_provider_contracts', array('controller' => 'business_associate_agreements', 'action' => 'index'));
	Router::connect('/service_provider_contracts/:action/*', array('controller' => 'business_associate_agreements'));
	//Router::connect('/policies_and_procedures', array('controller' => 'policies', 'action' => 'index'));
	//Router::connect('/other_policies_and_procedures', array('controller' => 'other_policies', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Extensions parsing
 */
    Router::parseExtensions('csv');

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
