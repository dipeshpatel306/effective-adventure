<?php
App::uses('AppController', 'Controller');
/**
 * ServerRoomAccess Controller
 *
 * @property ServerRoomAccess $ServerRoomAccess
 */
class ServerRoomAccessController extends AppController {

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
		$this->ServerRoomAccess->recursive = 0;
		$this->set('serverRoomAccess', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ServerRoomAccess->id = $id;
		if (!$this->ServerRoomAccess->exists()) {
			throw new NotFoundException(__('Invalid server room access'));
		}
		$this->set('serverRoomAccess', $this->ServerRoomAccess->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->ServerRoomAccess->create();
			if ($this->ServerRoomAccess->save($this->request->data)) {
				$this->Session->setFlash(__('The server room access has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The server room access could not be saved. Please, try again.'));
			}
		}
		$clients = $this->ServerRoomAccess->Client->find('list');
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
		$this->ServerRoomAccess->id = $id;
		if (!$this->ServerRoomAccess->exists()) {
			throw new NotFoundException(__('Invalid server room access'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ServerRoomAccess->save($this->request->data)) {
				$this->Session->setFlash(__('The server room access has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The server room access could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ServerRoomAccess->read(null, $id);
		}
		$clients = $this->ServerRoomAccess->Client->find('list');
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
		$this->ServerRoomAccess->id = $id;
		if (!$this->ServerRoomAccess->exists()) {
			throw new NotFoundException(__('Invalid server room access'));
		}
		if ($this->ServerRoomAccess->delete()) {
			$this->Session->setFlash(__('Server room access deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Server room access was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


}
