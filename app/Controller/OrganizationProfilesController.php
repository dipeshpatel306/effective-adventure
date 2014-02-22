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
 * Only Allow Hipaa Admin to add Edit Org Profile
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
 		$acct = $this->Session->read('Auth.User.Client.account_type');
		$client = $this->Auth->User('client_id');
		if ($group == 2 || $group == 3 || $acct == 'Initial'){ //allow
			if(in_array($this->action, array('view','add'))){  // Allow Managers to Add
				return true;
			}

			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->OrganizationProfile->isOwnedBy($id, $client)){
					return true;
				}
			}

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
		if (!$this->OrganizationProfile->exists($id)) {
			throw new NotFoundException(__('Invalid organization profile'));
		}
		$options = array('conditions' => array('OrganizationProfile.' . $this->OrganizationProfile->primaryKey => $id));
		$this->set('organizationProfile', $this->OrganizationProfile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {


			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
			if($group != 1){
				$this->request->data['OrganizationProfile']['client_id'] = $this->Auth->User('client_id');
			}

			$this->OrganizationProfile->create();
			if ($this->OrganizationProfile->save($this->request->data)) {
				$this->Session->setFlash('The organization profile has been saved.', 'default', array('class' => 'success message'));
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization profile could not be saved. Please, try again.'));
			}
		}
		$clients = $this->OrganizationProfile->Client->find('list');
		$operatingSystems = $this->OrganizationProfile->OperatingSystem->find('list');
		$this->set(compact('clients', 'operatingSystems'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationProfile->exists($id)) {
			throw new NotFoundException(__('Invalid organization profile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		    $this->OrganizationProfile->id = $id;
			if ($this->OrganizationProfile->save($this->request->data)) {
				$this->Session->setFlash('The organization profile has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrganizationProfile.' . $this->OrganizationProfile->primaryKey => $id));
			$this->request->data = $this->OrganizationProfile->find('first', $options);
		}
		$clients = $this->OrganizationProfile->Client->find('list');
		$operatingSystems = $this->OrganizationProfile->OperatingSystem->find('list');
		$this->set(compact('clients', 'operatingSystems'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrganizationProfile->id = $id;
		if (!$this->OrganizationProfile->exists()) {
			throw new NotFoundException(__('Invalid organization profile'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationProfile->delete()) {
			$this->Session->setFlash(__('Organization profile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organization profile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
