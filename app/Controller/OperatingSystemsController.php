<?php
App::uses('AppController', 'Controller');
/**
 * OperatingSystems Controller
 *
 * @property OperatingSystem $OperatingSystem
 */
class OperatingSystemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OperatingSystem->recursive = 0;
		$this->set('operatingSystems', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OperatingSystem->exists($id)) {
			throw new NotFoundException(__('Invalid operating system'));
		}
		$options = array('conditions' => array('OperatingSystem.' . $this->OperatingSystem->primaryKey => $id));
		$this->set('operatingSystem', $this->OperatingSystem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OperatingSystem->create();
			if ($this->OperatingSystem->save($this->request->data)) {
				$this->Session->setFlash(__('The operating system has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operating system could not be saved. Please, try again.'));
			}
		}
		$organizationProfiles = $this->OperatingSystem->OrganizationProfile->find('list');
		$this->set(compact('organizationProfiles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OperatingSystem->exists($id)) {
			throw new NotFoundException(__('Invalid operating system'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OperatingSystem->save($this->request->data)) {
				$this->Session->setFlash(__('The operating system has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operating system could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OperatingSystem.' . $this->OperatingSystem->primaryKey => $id));
			$this->request->data = $this->OperatingSystem->find('first', $options);
		}
		$organizationProfiles = $this->OperatingSystem->OrganizationProfile->find('list');
		$this->set(compact('organizationProfiles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OperatingSystem->id = $id;
		if (!$this->OperatingSystem->exists()) {
			throw new NotFoundException(__('Invalid operating system'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OperatingSystem->delete()) {
			$this->Session->setFlash(__('Operating system deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Operating system was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
