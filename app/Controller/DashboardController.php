<?php
App::uses('AppController', 'Controller');
/**
 * Dashboard Controller
 *
 * @property Dashboard $Dashboard
 */
class DashboardController extends AppController {

 public function beforeFilter(){
	parent::beforeFilter();
 }

/**
 * isAuthorized Method
 * Allows Hippa access to dashboard
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  

		if ($group == 2  || $group == 3){ // Allow managers and Users to view dashboard
			return true;
		}
		
		return parent::isAuthorized($user);
 	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dashboard->recursive = 0;
		$this->set('dashboard', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Dashboard->id = $id;
		if (!$this->Dashboard->exists()) {
			throw new NotFoundException(__('Invalid dashboard'));
		}
		$this->set('dashboard', $this->Dashboard->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dashboard->create();
			if ($this->Dashboard->save($this->request->data)) {
				$this->Session->setFlash(__('The dashboard has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dashboard could not be saved. Please, try again.'));
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
		$this->Dashboard->id = $id;
		if (!$this->Dashboard->exists()) {
			throw new NotFoundException(__('Invalid dashboard'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Dashboard->save($this->request->data)) {
				$this->Session->setFlash(__('The dashboard has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dashboard could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Dashboard->read(null, $id);
		}
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
		$this->Dashboard->id = $id;
		if (!$this->Dashboard->exists()) {
			throw new NotFoundException(__('Invalid dashboard'));
		}
		if ($this->Dashboard->delete()) {
			$this->Session->setFlash(__('Dashboard deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Dashboard was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}