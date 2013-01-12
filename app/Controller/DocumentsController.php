<?php
App::uses('AppController', 'Controller');
/**
 * Documents Controller
 *
 * @property Document $Document
 */
class DocumentsController extends AppController {

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
		$this->Document->recursive = 0;
		$this->set('documents', $this->paginate());
	}

/**
 * Risk Assessment Documents method
 * @return void
 */
	public function risk_assessment_documents() {
		$this->paginate = array(
			'conditions' => array('Document.document_type LIKE' => 'Risk Assessment Documents'),
			'order' => array('Document.name' => 'ASC')
		);
		$this->Document->recursive = 0;
		$this->set('documents', $this->paginate());
	}
/**
 * Disaster Recovery Plans method
 * @return void
 */
	public function disaster_recovery_plans() {
		$this->paginate = array(
			'conditions' => array('Document.document_type LIKE' => 'Disaster Recovery Plans'),
			'order' => array('Document.name' => 'ASC')
		);
		$this->Document->recursive = 0;
		$this->set('documents', $this->paginate());
	}
/**
 * Other Contracts & Documents method
 * @return void
 */
	public function other_contracts_and_documents() {
		$this->paginate = array(
			'conditions' => array('Document.document_type LIKE' => 'Other Contracts & Documents'),
			'order' => array('Document.name' => 'ASC')
		);
		$this->Document->recursive = 0;
		$this->set('documents', $this->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		$this->set('document', $this->Document->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->Document->create();
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('The document has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
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
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('The document has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Document->read(null, $id);
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
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		if ($this->Document->delete()) {
			$this->Session->setFlash(__('Document deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Document was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}