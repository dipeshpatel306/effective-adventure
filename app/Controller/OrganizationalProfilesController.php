<?php
App::uses('AppController', 'Controller');
/**
 * OrganizationalProfiles Controller
 *
 * @property OrganizationalProfile $OrganizationalProfile
 */
class OrganizationalProfilesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrganizationalProfile->recursive = 0;
		$this->set('organizationalProfiles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OrganizationalProfile->id = $id;
		if (!$this->OrganizationalProfile->exists()) {
			throw new NotFoundException(__('Invalid organizational profile'));
		}
		$this->set('organizationalProfile', $this->OrganizationalProfile->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			// convert array of OS installed into comma separated string
			$this->request->data['OrganizationalProfile']['os_installed'] = implode(',', $this->data['OrganizationalProfile']['os_installed']);
			
			$this->OrganizationalProfile->create();
			if ($this->OrganizationalProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The organizational profile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizational profile could not be saved. Please, try again.'));
			}
		}
		$clients = $this->OrganizationalProfile->Client->find('list');
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
		$this->OrganizationalProfile->id = $id;
		if (!$this->OrganizationalProfile->exists()) {
			throw new NotFoundException(__('Invalid organizational profile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationalProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The organizational profile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organizational profile could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OrganizationalProfile->read(null, $id);
		}
		$clients = $this->OrganizationalProfile->Client->find('list');
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
		$this->OrganizationalProfile->id = $id;
		if (!$this->OrganizationalProfile->exists()) {
			throw new NotFoundException(__('Invalid organizational profile'));
		}
		if ($this->OrganizationalProfile->delete()) {
			$this->Session->setFlash(__('Organizational profile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organizational profile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
