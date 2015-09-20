<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');

/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {
	
	public $paginate = array(
    	'limit' => 100,	
        'order' => array('Client.name' => 'asc')
    );
			
/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * All other users are banned
 * @return void
 */
    public function isAuthorized($user){
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?

        if ((in_array($this->action, array('migrate_from_qb', 'purge')) && $group != Group::ADMIN) ||
            ($group == Group::MANAGER || $group == Group::USER)) {
                $this->Session->setFlash('You are not authorized to view that!');
                $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
                return false;
        }
			
		if (in_array($this->action, array('index', 'edit', 'add')) && $group == Group::PARTNER_ADMIN) {
			return true;
		}
		
		if ($this->action == 'view' && $group == Group::PARTNER_ADMIN) {
			$id = $this->request->params['pass'][0];
			if($this->Client->isOwnedByPartner($id, $this->Session->read('Auth.User.partner_id'))){
				return true;
			}
		}

        return parent::isAuthorized($user);
    }

/**
 * index method
 *
 * @return void
 */
    public function index() {
    	$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		
		if ($group == Group::PARTNER_ADMIN) {
			$conditions = array('Client.partner_id' => $this->Session->read('Auth.User.partner_id'));
		} else {
			$conditions = array();
		}
		
        $this->Client->recursive = 0;
		$this->Paginator->settings['limit'] = 100;
		
		if (isset($this->request->data['Client']['search'])) {
			$search = $this->request->data['Client']['search'];	
			$conditions['Client.name LIKE'] = "%$search%";
		}

        $this->set('clients', $this->Paginator->paginate('Client', $conditions));
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
        $this->Paginator->settings = array(
        	'conditions' => array('User.client_id' => $id),
            'order' => array('User.last_name' => 'ASC'),
            'fields' => array(
            	'User.id', 'User.first_name', 'User.last_name', 'User.email', 'User.group_id', 'User.client_id',
               	'User.last_login', 'User.created', 'User.modified', 'Client.id', 'Group.id', 'Group.name'
            ),
            'limit' => 50
		);
        $this->set('users', $this->Paginator->paginate('User'));
        
        $this->loadModel('PoliciesAndProceduresDocument');
        $policies = $this->PoliciesAndProceduresDocument->find('all', array(
                        'conditions' => array('Client.id' => $id),
                        'fields' => array(
                            'PoliciesAndProceduresDocument.id', 'PoliciesAndProceduresDocument.policies_and_procedure_id', 
                            'PoliciesAndProceduresDocument.client_id', 'PoliciesAndProceduresDocument.attachment', 
                            'PoliciesAndProceduresDocument.attachment_dir', 'PoliciesAndProceduresDocument.created', 
                            'PoliciesAndProceduresDocument.modified', 'PoliciesAndProcedure.id', 'PoliciesAndProcedure.name'
                        )
                    ));
        $this->set(compact('policies'));        
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
		    $this->Client->create();
			$group = $this->Session->read('Auth.User.group_id');
			
			if ($group == Group::PARTNER_ADMIN) {
				// inject values fors partner client creation
				$this->request->data['Client']['partner_id'] = $this->Session->read('Auth.User.partner_id');
				$this->request->data['Client']['moodle_course_id'] = Configure::read('__default_course');
				$this->request->data['Client']['account_type'] = Configure::read('__default_acct_type');
			}
			
            if ($this->Client->save($this->request->data)) {                
                $this->Session->setFlash('The client has been saved.', 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The client could not be saved. Please, try again.'));
            }
        }
        $partners = $this->Client->Partner->find('list');
        $this->set(compact('partners'));
        $this->set('moodle_courses', $this->Client->getMoodleCourses());
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
        $this->set('moodle_courses', $this->Client->getMoodleCourses());
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
    
    public function migrate_from_qb() {
        if ($this->request->is('post')) {
            set_time_limit(0);
            if ($this->Client->migrateFromQB($this->request->data['Client']['rid'])) {
                $this->Session->setFlash(__('Client migrated.'), 'default', array('class' => 'success message'));
            }
        }
        $this->set('qb_clients', $this->Client->getQBClients());   
    }
	
	public function appendix($id = null) {
		$this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
		$this->loadModel('RiskAssessmentQuestions');
		$raQuestions = $this->RiskAssessmentQuestions->find('all', 
			array('order' => array('RiskAssessmentQuestions.category_question_number'))
		);
		$this->autoRender=False;
		$this->response->type('pdf');
		$this->Client->createAppendix($raQuestions);
	}

	public function purge() {
		return;
		set_time_limit(1200);
		$clients = $this->Client->find('all', array('conditions' => array('Client.id !=' => 1)));
		if ($this->request->is('post')) {
			foreach ($clients as $client) {
				$this->Client->id = $client['Client']['id'];
				$this->Client->delete();
			}
			$this->Session->setFlash(__('Clients purged.'));
            $this->redirect(array('action' => 'index'));
		}	
		$this->set(compact('clients'));
	}

}