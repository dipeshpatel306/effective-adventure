<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
/**
 * Partners Controller
 *
 * @property Partner $Partner
 */
class PartnersController extends AppController {

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * All other users are banned
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  

 		if ($group == Group::PARTNER_ADMIN && $this->action == 'registered_users') {
 			return true;
 		}
 		
		if ($group == Group::MANAGER || $group == Group::USER){ // Deny Managers and Users

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
		$this->Partner->recursive = 1;
		$this->set('partners', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Partner->id = $id;
		if (!$this->Partner->exists()) {
			throw new NotFoundException(__('Invalid partner'));
		}
		$this->set('partner', $this->Partner->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {			
			$this->Partner->create();
			if ($this->Partner->save($this->request->data)) {
				$this->Session->setFlash('The partner has been saved.', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partner could not be saved. Please, try again.'));
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
		$this->Partner->id = $id;
		if (!$this->Partner->exists()) {
			throw new NotFoundException(__('Invalid partner'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Partner->save($this->request->data)) {
				$this->Session->setFlash('The partner has been saved.', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partner could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Partner->read(null, $id);
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
		$this->Partner->id = $id;
		if (!$this->Partner->exists()) {
			throw new NotFoundException(__('Invalid partner'));
		}
		if ($this->Partner->delete()) {
			$this->Session->setFlash(__('Partner deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Partner was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function registered_users($id = null) {
		$partner_id = $this->Session->read('Auth.User.partner_id');
		$partner = $this->Partner->find('first', array('conditions' => array('id' => $partner_id)));
		$this->set(compact('partner'));
	}
}
