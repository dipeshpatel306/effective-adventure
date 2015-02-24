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
        $this->paginate = array(
            'fields' => array(
                'OrganizationProfile.id', 'OrganizationProfile.administrator_name',
                'OrganizationProfile.administrator_email', 'OrganizationProfile.administrator_phone',
                'OrganizationProfile.created', 'OrganizationProfile.modified', 'OrganizationProfile.client_id',
                'Client.name', 'Client.id'
            ),
            'limit' => 100,
            'order' => array('Client.name' => 'ASC')
        );
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
	    $client = $this->Auth->User('client_id');
	    $this->OrganizationProfile->create();
        $this->OrganizationProfile->set(array('client_id' => $client));
        $this->OrganizationProfile->save();
        $this->redirect(array('action' => 'edit', $this->OrganizationProfile->id));
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
		    if ($this->request->is('ajax')) {
		        $this->autoRender = false;
                $this->OrganizationProfile->set($this->request->data);
                if ($this->OrganizationProfile->validates()) {
                    $this->OrganizationProfile->save(null, false);
                }
                $errors = $this->OrganizationProfile->validationErrors;
                $this->set(compact('errors'));
                $this->render('ajax_edit', 'ajax');
		    } elseif ($this->OrganizationProfile->save($this->request->data)) {
			    $this->Session->setFlash(__('The organization profile has been saved.'), 'default', array('class' => 'success message'));
                $this->redirect($this->origReferer());
			} else {
			    $this->Session->setFlash(__('The organization profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrganizationProfile.' . $this->OrganizationProfile->primaryKey => $id));
			$this->request->data = $this->OrganizationProfile->find('first', $options);
		}
		if (!$this->request->is('ajax')) {
			$this->setReferer();
		}
		$this->loadModel('State');
		$states = $this->State->getStates();
		$clients = $this->OrganizationProfile->Client->find('list');
		$this->set(compact('clients', 'states'));
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
			$this->Session->setFlash(__('Organization profile deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organization profile was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}
}
