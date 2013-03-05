<?php
App::uses('AppController', 'Controller');
/**
 * PoliciesAndProcedures Controller
 *
 * @property PoliciesAndProcedure $PoliciesAndProcedure
 */
class PoliciesAndProceduresController extends AppController {

	
 public function beforeFilter(){
	parent::beforeFilter();
 }

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * MU Managers and Users are denied
 * Other Managers can add/edit/index/delete their own client
 * Users can read only
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		$acct = $this->Session->read('Auth.User.Client.account_type');
		
		if($group == 2){ // Allow Managers to add/edit/delete their own data
			if($acct == 'Meaningful Use' || $acct == 'Initial'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			} 
			if(in_array($this->action, array('index', 'view'))){  // Allow Managers to Add 
				return true;
			}
				
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			}
		}

		if($group == 3){
			if($acct == 'Meaningful Use' || $acct == 'Initial'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			} 
					
			if(in_array($this->action, array('edit', 'delete', 'add'))){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
					return false;	
				}
				
				if(in_array($this->action, array('index', 'view'))){  
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
		$this->PoliciesAndProcedure->recursive = 0;
		$this->set('policiesAndProcedures', $this->paginate());
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
		
		$this->PoliciesAndProcedure->id = $id;
		if (!$this->PoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid policies and procedure'));
		}
		
		if($group == 2 || $group == 3){
		$policiesAndProcedureDocument = $this->PoliciesAndProcedure->PoliciesAndProceduresDocument->find('first', array(
				'conditions' => array(
				'PoliciesAndProceduresDocument.policies_and_procedure_id' => $id,
				'PoliciesAndProceduresDocument.client_id' => $client,
				),
				'fields' => array('PoliciesAndProceduresDocument.id','PoliciesAndProceduresDocument.policies_and_procedure_id', 'PoliciesAndProceduresDocument.client_id', 
				'PoliciesAndProceduresDocument.document', 'PoliciesAndProceduresDocument.created', 'PoliciesAndProceduresDocument.modified')		
			));
			
		$this->set(compact('policiesAndProcedureDocument'));
		}
		
		$this->set('policiesAndProcedure', $this->PoliciesAndProcedure->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PoliciesAndProcedure->create();
			if ($this->PoliciesAndProcedure->save($this->request->data)) {
				$this->Session->setFlash('The policies and procedure has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies and procedure could not be saved. Please, try again.'));
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
		$this->PoliciesAndProcedure->id = $id;
		if (!$this->PoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid policies and procedure'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PoliciesAndProcedure->save($this->request->data)) {
				$this->Session->setFlash('The policies and procedure has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies and procedure could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PoliciesAndProcedure->read(null, $id);
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
		$this->PoliciesAndProcedure->id = $id;
		if (!$this->PoliciesAndProcedure->exists()) {
			throw new NotFoundException(__('Invalid policies and procedure'));
		}
		if ($this->PoliciesAndProcedure->delete()) {
			$this->Session->setFlash(__('Policies and procedure deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Policies and procedure was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
