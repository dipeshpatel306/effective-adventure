<?php
App::uses('AppController', 'Controller');
/**
 * OrganizationProfiles Controller
 *
 * @property OrganizationProfile $OrganizationProfile
 */
class OrganizationProfilesController extends AppController {

/**
 * isAuthorized Method
 * Only Allow Hipaa Admin to add groups
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
 		$acct = $this->Session->read('Auth.User.Client.account_type');

		if ($group == 2 || $group == 3 || $acct == 'Initial'){ //allow
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
		$this->OrganizationProfile->recursive = 0;
		$this->set('organizationProfiles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OrganizationProfile->id = $id;
		if (!$this->OrganizationProfile->exists()) {
			throw new NotFoundException(__('Invalid organization profile'));
		}
		$this->set('organizationProfile', $this->OrganizationProfile->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			// convert array of OS installed into comma separated string
			$this->request->data['OrganizationProfile']['os_installed'] = implode(',', $this->data['OrganizationProfile']['os_installed']);
			
			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
			if($group != 1){
				$this->request->data['OrganizationProfile']['client_id'] = $this->Auth->User('client_id');
			}	
			
			$this->OrganizationProfile->create();
			if ($this->OrganizationProfile->save($this->request->data)) {
				$this->Session->setFlash('The organization profile has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization profile could not be saved. Please, try again.'));
			}
		}
		$clients = $this->OrganizationProfile->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->OrganizationProfile->id = $id;
		if (!$this->OrganizationProfile->exists()) {
			throw new NotFoundException(__('Invalid organization profile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationProfile->save($this->request->data)) {
				$this->Session->setFlash('The organization profile has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization profile could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OrganizationProfile->read(null, $id);
		}
		$clients = $this->OrganizationProfile->Client->find('list');
		$this->set(compact('clients'));
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
		$this->OrganizationProfile->id = $id;
		if (!$this->OrganizationProfile->exists()) {
			throw new NotFoundException(__('Invalid organization profile'));
		}
		if ($this->OrganizationProfile->delete()) {
			$this->Session->setFlash(__('Organization profile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organization profile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
