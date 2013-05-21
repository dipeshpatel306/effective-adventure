<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {
 public function beforeFilter(){
	parent::beforeFilter();
 }

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * All other users are banned
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?

		if ($group == 2 || $group == 3){ // Deny Managers and Users

				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
		}

		return parent::isAuthorized($user);
 	}
/**
 * Generate admin and user codes
 * @return string
 */
	public function accountCode(){
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = ''; // initialize string
		$userString = '';

		$size = strlen($chars)-1;
		$length = 10; // length of string

		for($i = 0; $i < $length; $i++){
			$string .= $chars[ mt_rand(0, $size) ];
		}
		return $string;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		//$this->Client->recursive = 2;
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		$this->set('client', $this->Client->read(null, $id));



		// Paginate Users and Get Group Role
		$this->paginate = array('conditions' => array('User.client_id' => $id),
								'order' => array('User.last_name' => 'ASC'),
								'fields' => array('User.id', 'User.first_name', 'User.last_name', 'User.email', 'User.group_id', 'User.client_id',
											'User.last_login', 'User.created', 'User.modified', 'Client.id', 'Group.id', 'Group.name'
								),'limit' => 20);
		$this->set('users', $this->paginate($this->Client->User));
		//$this->set('users', $users);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Client->create();
			if ($this->Client->save($this->request->data)) {

				// Call method to generate user Strings
				$adminString = $this->accountCode();  // admin
				$this->Client->saveField('admin_account', $adminString);

				$userString = $this->accountCode(); // user
				$this->Client->saveField('user_account', $userString);

				$securityString = $this->accountCode();
				$this->Client->saveField('file_key', $securityString);

				$this->Session->setFlash('The client has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		}
		$partners = $this->Client->Partner->find('list');
		$this->set(compact('partners'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash('The client has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Client->read(null, $id);
		}
		$partners = $this->Client->Partner->find('list');
		$this->set(compact('partners'));
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
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->Client->delete()) {
			$this->Session->setFlash(__('Client deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Client was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}