<?php
App::uses('AppController', 'Controller');
/**
 * EphiRemoved Controller
 *
 * @property EphiRemoved $EphiRemoved
 */
class EphiRemovedController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EphiRemoved->recursive = 0;
		$this->set('ephiRemoved', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		$this->set('ephiRemoved', $this->EphiRemoved->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EphiRemoved->create();
			if ($this->EphiRemoved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi removed has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi removed could not be saved. Please, try again.'));
			}
		}
		$clients = $this->EphiRemoved->Client->find('list');
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
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EphiRemoved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi removed has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi removed could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EphiRemoved->read(null, $id);
		}
		$clients = $this->EphiRemoved->Client->find('list');
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
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		if ($this->EphiRemoved->delete()) {
			$this->Session->setFlash(__('Ephi removed deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ephi removed was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EphiRemoved->recursive = 0;
		$this->set('ephiRemoved', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		$this->set('ephiRemoved', $this->EphiRemoved->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EphiRemoved->create();
			if ($this->EphiRemoved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi removed has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi removed could not be saved. Please, try again.'));
			}
		}
		$clients = $this->EphiRemoved->Client->find('list');
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
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EphiRemoved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi removed has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi removed could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EphiRemoved->read(null, $id);
		}
		$clients = $this->EphiRemoved->Client->find('list');
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
		$this->EphiRemoved->id = $id;
		if (!$this->EphiRemoved->exists()) {
			throw new NotFoundException(__('Invalid ephi removed'));
		}
		if ($this->EphiRemoved->delete()) {
			$this->Session->setFlash(__('Ephi removed deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ephi removed was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
