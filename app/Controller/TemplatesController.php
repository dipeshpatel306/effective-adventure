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
        $client = $this->Session->read('Auth.User.client_id');  // Test Client.
        $acct = $this->Session->read('Auth.User.Client.account_type'); // Get account type

        if($group == Group::MANAGER){
            if(in_array($this->action, array('index', 'view'))) { 
                return true;
            }

            if($this->action == 'sendFile') {
                $id = $this->request->params['pass'][0];
                if($this->Template->isOwnedBy($id, $client)){
                    return true;
                }
            }
        }

        if($group == Group::USER || $acct == 'Initial' || $acct == 'Training'){
            $this->Session->setFlash('You are not authorized to view that!');
            $this->redirect($this->referrer());
            return false;
        }

        return parent::isAuthorized($user);
    }
/**
 * SendFile Method
 *
 */
    public function sendFile($dir, $file) {
        //$file = $this->Attachment->getFile($id);
        $file = WWW_ROOT . '/files/templates/attachment/' . $dir . '/' . $file;
        $this->response->file($file, array('download' => true));
        //Return reponse object to prevent controller from trying to render a view
        return $this->response;
    }
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
        $client = $this->Session->read('Auth.User.client_id');  // Test Client.

        if($group == Group::ADMIN){
            $this->Template->recursive = 0;
            $this->paginate = array('order' => array('Template.client_id' => 'ASC'));
            $this->set('templates', $this->paginate());
        } elseif ($group == Group::MANAGER) {
            $this->paginate = array(
                'conditions' => array('Template.client_id' => $client),
                'order' => array('Template.name' => 'ASC')
            );
            $this->set('templates', $this->paginate());
        } else {
            $this->Session->setFlash('You are not authorized to view that!');
            $this->redirect($this->referrer());
        }
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
        $client = $this->Session->read('Auth.User.client_id');  // Test Client.

        $this->Template->id = $id;
        if (!$this->Template->exists()) {
            throw new NotFoundException(__('Invalid Template'));
        }

        if ($group == Group::ADMIN) {
            $this->set('template', $this->Template->read(null, $id));
        } elseif ($group == Group::MANAGER) {
                $is_authorized = $this->Template->find('first', array(
                'conditions' => array(
                    'Template.id' => $id,
                    'AND' => array('Template.client_id' => $client)
                )
            ));

            if($is_authorized){
                $this->set('template', $this->Template->read(null, $id));
            } else { // Else Banned!
                $this->Session->setFlash('You are not authorized to view that!');
                $this->redirect($this->referrer());
            }
        } else {
            $this->Session->setFlash('You are not authorized to view that!');
            $this->redirect($this->referrer());
        }
    }

/**
 * add method
 *
 * @return void
 */
    public function add($clientId = null) {
        if(isset($clientId)){
            $this->set('clientId', $clientId);
        }   
        if ($this->request->is('post')) {
            // If user is a client automatically set the client id accordingly. Admin can change client ids
            $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
            $this->loadModel('Client');
            $key = $this->Client->find('first', array('conditions' => array(
                        'Client.id' => $this->request->data['Template']['client_id']),
                        'fields' => 'Client.file_key'
                        ));
            $this->request->data['Template']['file_key'] = $key['Client']['file_key'];

            $this->Template->create();
            if ($this->Template->save($this->request->data)) {
                $this->Session->setFlash('The template has been saved.', 'default', array('class' => 'success message'));
                if (isset($this->request->data['next'])) {
                    $this->redirect(array('action' => 'add'));
                } else {
                    $this->redirect(array('controller' => 'clients', 'action' => 'view', $this->request->data['Template']['client_id']));
                }
            } else {
                $this->Session->setFlash(__('The template could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Template->Client->find('list');
        $this->set(compact('clients'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null, $clientId = null) {
        if(isset($clientId)){
            $this->set('clientId', $clientId);
        }           
        $this->Template->id = $id;
        if (!$this->Template->exists()) {
            throw new NotFoundException(__('Invalid template'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->loadModel('Client');
            $key = $this->Client->find('first', array('conditions' => array(
                        'Client.id' => $this->request->data['Template']['client_id']),
                        'fields' => 'Client.file_key'
                        ));
            $this->request->data['Template']['file_key'] = $key['Client']['file_key'];
            if ($this->Template->save($this->request->data)) {
                $this->Session->setFlash('The template has been saved.', 'default', array('class' => 'success message'));
                if (isset($this->request->data['next'])) {
                    $this->redirect(array('action' => 'add'));
                } else {
                    $this->redirect(array('controller' => 'clients', 'action' => 'view', $this->request->data['Template']['client_id']));
                }   
            } else {
                $this->Session->setFlash(__('The template could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Template->read(null, $id);
        }
        $clients = $this->Template->Client->find('list');
        $doc = $this->Template->data['Template']['attachment'];
        $this->set(compact('clients', 'doc'));
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