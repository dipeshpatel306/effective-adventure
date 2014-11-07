<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
/**
 * Templates Controller
 **/
class TemplatesController extends AppController {
/**
 * isAuthorized Method
 * @return void
 */
    public function isAuthorized($user){
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
        $acct = $this->Session->read('Auth.User.Client.account_type'); // Get account type

        if($group == Group::MANAGER && in_array($this->action, array('index', 'view', 'sendFile'))){
            return true;
        }

        if($group == Group::USER || $acct == 'Initial' || $acct == 'Training'){
            $this->Session->setFlash('You are not authorized to view that!');
            $this->redirect($this->referer());
            return false;
        }

        return parent::isAuthorized($user);
    }

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $categories = $this->Template->TemplateCategory->find('all', array('recursive' => 2));
        $this->set(compact('categories'));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Template->id = $id;
        if (!$this->Template->exists()) {
            throw new NotFoundException(__('Invalid Template'));
        }
        $this->set('template', $this->Template->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add($categoryId = null) {
    	if(isset($categoryId)){
			$this->set('categoryId', $categoryId);
		}
        if ($this->request->is('post')) {
            $this->Template->create();
            if ($this->Template->save($this->request->data)) {
                $this->Session->setFlash('The template has been saved.', 'default', array('class' => 'success message'));
                if (isset($this->request->data['next'])) {
                    $this->redirect(array('action' => 'add', $this->request->data['Template']['category_id']));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The template could not be saved. Please, try again.'));
            }
        }
		$categories = $this->Template->TemplateCategory->find('list');
		$this->set(compact('categories'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Template->id = $id;
        if (!$this->Template->exists()) {
            throw new NotFoundException(__('Invalid template'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Template->save($this->request->data)) {
                $this->Session->setFlash('The template has been saved.', 'default', array('class' => 'success message'));
                if (isset($this->request->data['next'])) {
                    $this->redirect(array('action' => 'add'));
                } else {
                    $this->redirect(array('controller' => 'index'));
                }   
            } else {
                $this->Session->setFlash(__('The template could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Template->read(null, $id);
        }
        $doc = $this->Template->data['Template']['attachment'];
        $this->set(compact('doc'));
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
        $this->Template->id = $id;
        if (!$this->Template->exists()) {
            throw new NotFoundException(__('Invalid template'));
        }
        if ($this->Template->delete()) {
            $this->Session->setFlash(__('Template deleted.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Template was not deleted.'));
        $this->redirect(array('action' => 'index'));
    }
}