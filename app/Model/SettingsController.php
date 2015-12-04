<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
/**
 * Settings Controller
 **/
class SettingsController extends AppController {
/**
 * isAuthorized Method
 * @return void
 */
    public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');
		return ($group == Group::ADMIN);
 	}

/**
 * index method
 *
 * @return void
 */
    public function index() {
		$this->Setting->recursive = 0;
		$this->paginate = array('order' => array('key' => 'ASC'));	
		$this->set('settings', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Setting->id = $id;
        if (!$this->Setting->exists()) {
            throw new NotFoundException(__('Invalid Setting'));
        }
		$setting = $this->Setting->read();
		$this->set(compact('setting'));
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
        $this->Setting->id = $id;
        if (!$this->Setting->exists()) {
            throw new NotFoundException(__('Invalid Setting'));
        }
        if ($this->Setting->delete()) {
            $this->Session->setFlash(__('Setting deleted.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Setting was not deleted.'));
        $this->redirect(array('action' => 'index'));
    }
	
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Setting->id = $id;
        if (!$this->Setting->exists()) {
            throw new NotFoundException(__('Invalid Setting'));
        }
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash('The setting has been saved.', 'default', array('class' => 'success message'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Setting->read(null, $id);
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash('The setting has been saved.', 'default', array('class' => 'success message'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
			}
		}
	}

}