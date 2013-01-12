<?php
App::uses('AppController', 'Controller');
/**
 * SecurityIncidents Controller
 *
 * @property SecurityIncident $SecurityIncident
 */
class SecurityIncidentsController extends AppController {

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
		$this->SecurityIncident->recursive = 0;
		$this->set('securityIncidents', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SecurityIncident->id = $id;
		if (!$this->SecurityIncident->exists()) {
			throw new NotFoundException(__('Invalid security incident'));
		}
		$this->set('securityIncident', $this->SecurityIncident->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->SecurityIncident->create();
			if ($this->SecurityIncident->save($this->request->data)) {
				$this->Session->setFlash(__('The security incident has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The security incident could not be saved. Please, try again.'));
			}
		}
		$clients = $this->SecurityIncident->Client->find('list');
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
		$this->SecurityIncident->id = $id;
		if (!$this->SecurityIncident->exists()) {
			throw new NotFoundException(__('Invalid security incident'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SecurityIncident->save($this->request->data)) {
				$this->Session->setFlash(__('The security incident has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The security incident could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SecurityIncident->read(null, $id);
		}
		$clients = $this->SecurityIncident->Client->find('list');
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
		$this->SecurityIncident->id = $id;
		if (!$this->SecurityIncident->exists()) {
			throw new NotFoundException(__('Invalid security incident'));
		}
		if ($this->SecurityIncident->delete()) {
			$this->Session->setFlash(__('Security incident deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Security incident was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


}
