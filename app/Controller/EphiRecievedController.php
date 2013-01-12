<?php
App::uses('AppController', 'Controller');
/**
 * EphiRecieved Controller
 *
 * @property EphiRecieved $EphiRecieved
 */
class EphiRecievedController extends AppController {

 public function beforeFilter(){
	parent::beforeFilter();
 	$this->Auth->authorize = array('controller');
 }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EphiRecieved->recursive = 0;
		$this->set('ephiRecieved', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		$this->set('ephiRecieved', $this->EphiRecieved->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->EphiRecieved->create();
			if ($this->EphiRecieved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi recieved has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi recieved could not be saved. Please, try again.'));
			}
		}
		$clients = $this->EphiRecieved->Client->find('list');
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
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EphiRecieved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi recieved has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi recieved could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EphiRecieved->read(null, $id);
		}
		$clients = $this->EphiRecieved->Client->find('list');
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
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		if ($this->EphiRecieved->delete()) {
			$this->Session->setFlash(__('Ephi recieved deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ephi recieved was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EphiRecieved->recursive = 0;
		$this->set('ephiRecieved', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		$this->set('ephiRecieved', $this->EphiRecieved->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EphiRecieved->create();
			if ($this->EphiRecieved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi recieved has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi recieved could not be saved. Please, try again.'));
			}
		}
		$clients = $this->EphiRecieved->Client->find('list');
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
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EphiRecieved->save($this->request->data)) {
				$this->Session->setFlash(__('The ephi recieved has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ephi recieved could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EphiRecieved->read(null, $id);
		}
		$clients = $this->EphiRecieved->Client->find('list');
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
		$this->EphiRecieved->id = $id;
		if (!$this->EphiRecieved->exists()) {
			throw new NotFoundException(__('Invalid ephi recieved'));
		}
		if ($this->EphiRecieved->delete()) {
			$this->Session->setFlash(__('Ephi recieved deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ephi recieved was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
