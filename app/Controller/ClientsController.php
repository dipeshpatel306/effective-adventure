<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
App::uses('Core', 'ConnectionManager');
/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {
 public function beforeFilter(){
    parent::beforeFilter();
 }
 
/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * All other users are banned
 * @return void
 */
    public function isAuthorized($user){
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?

        if ($group == Group::MANAGER || $group == Group::USER){ // Deny Managers and Users
                $this->Session->setFlash('You are not authorized to view that!');
                $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
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
        $this->Client->recursive = 0;
        $this->paginate = array(
            'limit' => 100,
            'order' => array('Client.name' => 'asc')
        );
        $this->set('clients', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Client->recursive = 1;
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('client', $this->Client->read(null, $id));

        // Paginate Users and Get Group Role
        $this->paginate = array('conditions' => array('User.client_id' => $id),
                                'order' => array('User.last_name' => 'ASC'),
                                'fields' => array('User.id', 'User.first_name', 'User.last_name', 'User.email', 'User.group_id', 'User.client_id',
                                            'User.last_login', 'User.created', 'User.modified', 'Client.id', 'Group.id', 'Group.name'
                                ),'limit' => 50);
        $this->set('users', $this->paginate($this->Client->User));
        
        $this->loadModel('PoliciesAndProceduresDocument');
        $policies = $this->PoliciesAndProceduresDocument->find('all', array(
                        'conditions' => array('Client.id' => $id),
                        'fields' => array(
                            'PoliciesAndProceduresDocument.id', 'PoliciesAndProceduresDocument.policies_and_procedure_id', 
                            'PoliciesAndProceduresDocument.client_id', 'PoliciesAndProceduresDocument.document', 
                            'PoliciesAndProceduresDocument.document_dir', 'PoliciesAndProceduresDocument.created', 
                            'PoliciesAndProceduresDocument.modified', 'PoliciesAndProcedure.id', 'PoliciesAndProcedure.name'
                        )
                    ));
        $this->set(compact('policies'));        
        //pr($policies);        
        //$this->set('users', $users);
    }
/**
 * SendFile Method
 *
 */
    public function sendFile($dir, $file, $section) {
        //$file = $this->Attachment->getFile($id);
        $file = WWW_ROOT . '/files/' . $section . '/' . $dir . '/' . $file;
        $this->response->file($file, array('download' => true));
        //Return reponse object to prevent controller from trying to render a view
        return $this->response;
    }

    public function _updateMoodleCourseName($course_id) {
        if (!isset($course_id) || empty($course_id)) {
            $name = '';
        } else {
            $moodle = ConnectionManager::getDataSource('moodle');
            $moodle->rawQuery('SELECT shortname FROM mdl_course WHERE id=' . $course_id);
            $row = $moodle->fetchRow();
            $name = $row['mdl_course']['shortname'];
        }
        $this->Client->saveField('moodle_course_name', $name);
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Client->create();
            if ($this->Client->save($this->request->data)) {

                // Call method to generate user Strings
                $adminString = self::_randomStr(10);  // admin
                $this->Client->saveField('admin_account', $adminString);

                $userString = self::_randomStr(10); // user
                $this->Client->saveField('user_account', $userString);

                $securityString = self::_randomStr(10);
                $this->Client->saveField('file_key', $securityString);
                
                if (array_key_exists('moodle_course_id', $this->request->data['Client'])) {
                    $this->_updateMoodleCourseName($this->request->data['Client']['moodle_course_id']);
                }

                $this->Session->setFlash('The client has been saved.', 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The client could not be saved. Please, try again.'));
            }
        }
        $partners = $this->Client->Partner->find('list');
        $this->set(compact('partners'));
        $this->set('moodle_courses', $this->_getMoodleCourses());
    }
   
    public function _getMoodleCourses() {
        $moodle = ConnectionManager::getDataSource('moodle');
        $moodle->rawQuery('SELECT id, shortname FROM mdl_course');
        $moodle_courses = array('' => '');
        while ($course = $moodle->fetchRow()) {
            $moodle_courses[$course['mdl_course']['id']] = $course['mdl_course']['shortname'];
        }
        return $moodle_courses;
   }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Client->save($this->request->data)) {
                if (array_key_exists('moodle_course_id', $this->request->data['Client'])) {
                    $course_id = $this->request->data['Client']['moodle_course_id'];
                    $this->_updateMoodleCourseName($course_id);
                }
                $this->Session->setFlash('The client has been saved.', 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The client could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Client->read(null, $id);
        }
        $partners = $this->Client->Partner->find('list');
        $this->set(compact('partners'));
        $this->set('moodle_courses', $this->_getMoodleCourses());
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
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        if ($this->Client->delete()) {
            $this->Session->setFlash(__('Client deleted.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Client was not deleted.'));
        $this->redirect(array('action' => 'index'));
    }

}