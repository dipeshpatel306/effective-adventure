<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
/**
 * Templates Controller
 **/
class TemplateCategoriesController extends AppController {
/**
 * isAuthorized Method
 * @return void
 */
    public function isAuthorized($user){
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
        $acct = $this->Session->read('Auth.User.Client.account_type'); // Get account type

        if($group == Group::MANAGER && in_array($this->action, array('index', 'view'))){
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
        $this->TemplateCategory->recursive = 0;
        $this->paginate = array('order' => array('TemplateCategory.name' => 'ASC'));
        $this->set('categories', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->TemplateCategory->id = $id;
        if (!$this->TemplateCategory->exists()) {
            throw new NotFoundException(__('Invalid Template Catgegory'));
        }
        $this->set('category', $this->TemplateCategory->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->TemplateCategory->create();
            if ($this->TemplateCategory->save($this->request->data)) {
                $this->Session->setFlash('The template category has been saved.', 'default', array('class' => 'success message'));
                if (isset($this->request->data['next'])) {
                    $this->redirect(array('action' => 'add'));
                } else {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The template category could not be saved. Please, try again.'));
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
        $this->TemplateCategory->id = $id;
        if (!$this->TemplateCategory->exists()) {
            throw new NotFoundException(__('Invalid template category'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TemplateCategory->save($this->request->data)) {
                $this->Session->setFlash('The template category has been saved.', 'default', array('class' => 'success message'));
                if (isset($this->request->data['next'])) {
                    $this->redirect(array('action' => 'add'));
                } else {
                    $this->redirect(array('action' => 'index'));
                }   
            } else {
                $this->Session->setFlash(__('The template category could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->TemplateCategory->read(null, $id);
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
        $this->TemplateCategory->id = $id;
        if (!$this->TemplateCategory->exists()) {
            throw new NotFoundException(__('Invalid template category'));
        }
        if ($this->TemplateCategory->delete()) {
            $this->Session->setFlash(__('Template category deleted.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Template category was not deleted.'));
        $this->redirect(array('action' => 'index'));
    }
}