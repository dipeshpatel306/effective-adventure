<?php
App::uses('AppController', 'Controller');
/**
 * EducationCenter Controller
 *
 * @property EducationCenter $EducationCenter
 */
class EducationCenterController extends AppController {

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
		$acct = $this->Session->read('Auth.User.Client.account_type'); // Get account type 
		
		if($group == 2 || $group == 3 ){
			if(in_array($this->action, array('index'))){  // Allow Managers to Add 
				return true;
			}
		}
		if($acct == 'Initial'){
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
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}
/**
 * Learn Now method
 *
 * @return void
 */
/*	public function learn_now() {
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}*/
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		$this->set('educationCenter', $this->EducationCenter->read(null, $id));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->request->data['EducationCenter']['video_link'] = trim($this->request->data['EducationCenter']['video_link']); // clean video name
			
			$this->EducationCenter->create();
			if ($this->EducationCenter->save($this->request->data)) {
				$this->Session->setFlash('The education center has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education center could not be saved. Please, try again.'));
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
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['EducationCenter']['video_link'] = trim($this->request->data['EducationCenter']['video_link']); // clean video name
			
			if ($this->EducationCenter->save($this->request->data)) {
				$this->Session->setFlash('The education center has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education center could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EducationCenter->read(null, $id);
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
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		if ($this->EducationCenter->delete()) {
			$this->Session->setFlash(__('Education center deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Education center was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
