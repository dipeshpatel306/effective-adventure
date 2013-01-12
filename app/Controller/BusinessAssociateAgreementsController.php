<?php
App::uses('AppController', 'Controller');
/**
 * BusinessAssociateAgreements Controller
 *
 * @property BusinessAssociateAgreement $BusinessAssociateAgreement
 */
class BusinessAssociateAgreementsController extends AppController {

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
		$this->BusinessAssociateAgreement->recursive = 0;
		$this->set('businessAssociateAgreements', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}
		$this->set('businessAssociateAgreement', $this->BusinessAssociateAgreement->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->BusinessAssociateAgreement->create();
			if ($this->BusinessAssociateAgreement->save($this->request->data)) {
				$this->Session->setFlash(__('The business associate agreement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business associate agreement could not be saved. Please, try again.'));
			}
		}
		$clients = $this->BusinessAssociateAgreement->Client->find('list');
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
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusinessAssociateAgreement->save($this->request->data)) {
				$this->Session->setFlash(__('The business associate agreement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business associate agreement could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BusinessAssociateAgreement->read(null, $id);
		}
		$clients = $this->BusinessAssociateAgreement->Client->find('list');
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
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}
		if ($this->BusinessAssociateAgreement->delete()) {
			$this->Session->setFlash(__('Business associate agreement deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Business associate agreement was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BusinessAssociateAgreement->recursive = 0;
		$this->set('businessAssociateAgreements', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}
		$this->set('businessAssociateAgreement', $this->BusinessAssociateAgreement->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BusinessAssociateAgreement->create();
			if ($this->BusinessAssociateAgreement->save($this->request->data)) {
				$this->Session->setFlash(__('The business associate agreement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business associate agreement could not be saved. Please, try again.'));
			}
		}
		$clients = $this->BusinessAssociateAgreement->Client->find('list');
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
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BusinessAssociateAgreement->save($this->request->data)) {
				$this->Session->setFlash(__('The business associate agreement has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business associate agreement could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BusinessAssociateAgreement->read(null, $id);
		}
		$clients = $this->BusinessAssociateAgreement->Client->find('list');
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
		$this->BusinessAssociateAgreement->id = $id;
		if (!$this->BusinessAssociateAgreement->exists()) {
			throw new NotFoundException(__('Invalid business associate agreement'));
		}
		if ($this->BusinessAssociateAgreement->delete()) {
			$this->Session->setFlash(__('Business associate agreement deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Business associate agreement was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
