<?php
App::uses('AppController', 'Controller');
/**
 * SirtTeams Controller
 *
 * @property SirtTeam $SirtTeam
 */
class SirtTeamsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SirtTeam->recursive = 0;
		$this->set('sirtTeams', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SirtTeam->id = $id;
		if (!$this->SirtTeam->exists()) {
			throw new NotFoundException(__('Invalid sirt team'));
		}
		$this->set('sirtTeam', $this->SirtTeam->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SirtTeam->create();
			if ($this->SirtTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The sirt team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sirt team could not be saved. Please, try again.'));
			}
		}
		$clients = $this->SirtTeam->Client->find('list');
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
		$this->SirtTeam->id = $id;
		if (!$this->SirtTeam->exists()) {
			throw new NotFoundException(__('Invalid sirt team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SirtTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The sirt team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sirt team could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SirtTeam->read(null, $id);
		}
		$clients = $this->SirtTeam->Client->find('list');
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
		$this->SirtTeam->id = $id;
		if (!$this->SirtTeam->exists()) {
			throw new NotFoundException(__('Invalid sirt team'));
		}
		if ($this->SirtTeam->delete()) {
			$this->Session->setFlash(__('Sirt team deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sirt team was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SirtTeam->recursive = 0;
		$this->set('sirtTeams', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->SirtTeam->id = $id;
		if (!$this->SirtTeam->exists()) {
			throw new NotFoundException(__('Invalid sirt team'));
		}
		$this->set('sirtTeam', $this->SirtTeam->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SirtTeam->create();
			if ($this->SirtTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The sirt team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sirt team could not be saved. Please, try again.'));
			}
		}
		$clients = $this->SirtTeam->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->SirtTeam->id = $id;
		if (!$this->SirtTeam->exists()) {
			throw new NotFoundException(__('Invalid sirt team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SirtTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The sirt team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sirt team could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SirtTeam->read(null, $id);
		}
		$clients = $this->SirtTeam->Client->find('list');
		$this->set(compact('clients'));
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
		$this->SirtTeam->id = $id;
		if (!$this->SirtTeam->exists()) {
			throw new NotFoundException(__('Invalid sirt team'));
		}
		if ($this->SirtTeam->delete()) {
			$this->Session->setFlash(__('Sirt team deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sirt team was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
