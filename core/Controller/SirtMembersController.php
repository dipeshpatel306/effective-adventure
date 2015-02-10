<?php
App::uses('AppController', 'Controller');
/**
 * SirtMembers Controller
 *
 * @property SirtMember $SirtMember
 */
class SirtMembersController extends AppController {
	
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
		$this->SirtMember->recursive = 0;
		$this->set('sirtMembers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SirtMember->id = $id;
		if (!$this->SirtMember->exists()) {
			throw new NotFoundException(__('Invalid sirt member'));
		}
		$this->set('sirtMember', $this->SirtMember->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Policy']['client_id'] = $this->Auth->User('client_id');
			$this->SirtMember->create();
			if ($this->SirtMember->save($this->request->data)) {
				$this->Session->setFlash('The sirt member has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sirt member could not be saved. Please, try again.'));
			}
		}
		$sirtTeams = $this->SirtMember->SirtTeam->find('list');
		$this->set(compact('sirtTeams'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->SirtMember->id = $id;
		if (!$this->SirtMember->exists()) {
			throw new NotFoundException(__('Invalid sirt member'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SirtMember->save($this->request->data)) {
				$this->Session->setFlash('The sirt member has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sirt member could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SirtMember->read(null, $id);
		}
		$sirtTeams = $this->SirtMember->SirtTeam->find('list');
		$this->set(compact('sirtTeams'));
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
		$this->SirtMember->id = $id;
		if (!$this->SirtMember->exists()) {
			throw new NotFoundException(__('Invalid sirt member'));
		}
		if ($this->SirtMember->delete()) {
			$this->Session->setFlash(__('Sirt member deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sirt member was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


}
