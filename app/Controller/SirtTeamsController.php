<?php
App::uses('AppController', 'Controller');
/**
 * SirtTeams Controller
 *
 * @property SirtTeam $SirtTeam
 */
class SirtTeamsController extends AppController {

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
			
			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
			if($group != 1){
				$this->request->data['SirtTeam']['client_id'] = $this->Auth->User('client_id');
			}	
			

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


}
