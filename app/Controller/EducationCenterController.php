<?php
App::uses('AppController', 'Controller');
/**
 * EducationCenter Controller
 *
 * @property EducationCenter $EducationCenter
 */
class EducationCenterController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}
/**
 * Learn Now method
 *
 * @return void
 */
	public function learn_Now() {
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		$this->set('educationCenter', $this->EducationCenter->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EducationCenter->create();
			if ($this->EducationCenter->save($this->request->data)) {
				$this->Session->setFlash('The education center has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education center could not be saved. Please, try again.'));
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
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EducationCenter->save($this->request->data)) {
				$this->Session->setFlash('The education center has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education center could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EducationCenter->read(null, $id);
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
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		if ($this->EducationCenter->delete()) {
			$this->Session->setFlash(__('Education center deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Education center was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
