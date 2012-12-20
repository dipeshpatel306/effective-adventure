<?php
App::uses('AppController', 'Controller');
/**
 * Policies Controller
 *
 * @property Policy $Policy
 */
class PoliciesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}

/**
 * Policies and Procedures method
 * @return void
 */
	public function policies_and_procedures() {
		$this->paginate = array(
			'conditions' => array('Policy.policy_type LIKE' => 'Policies & Procedures'),
			'order' => array('Policy.name' => 'ASC')
		);
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}
/**
 * Other Policies and Procedures method
 * @return void
 */
	public function other_policies_and_procedures() {
		$this->paginate = array(
			'conditions' => array('Policy.policy_type LIKE' => 'Other Policies & Procedures'),
			'order' => array('Policy.name' => 'ASC')
		);
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		$this->set('policy', $this->Policy->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Policy->create();
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
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
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Policy->read(null, $id);
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
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		if ($this->Policy->delete()) {
			$this->Session->setFlash(__('Policy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Policy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		$this->set('policy', $this->Policy->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Policy->create();
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Policy->save($this->request->data)) {
				$this->Session->setFlash(__('The policy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Policy->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Policy->id = $id;
		if (!$this->Policy->exists()) {
			throw new NotFoundException(__('Invalid policy'));
		}
		if ($this->Policy->delete()) {
			$this->Session->setFlash(__('Policy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Policy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
