<?php
App::uses('AppController', 'Controller');
/**
 * RiskAssessmentDocuments Controller
 *
 * @property RiskAssessmentDocument $RiskAssessmentDocument
 */
class RiskAssessmentDocumentsController extends AppController {

 public function beforeFilter(){
	parent::beforeFilter();
 }
/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * Client Managers & MU MAnagers can only Add Edit Delete to their own group
 * Users cannot see
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		$clientId = $this->Session->read('Auth.User.Client.account_type');
		
		if($group == 2){
			if(in_array($this->action, array('index', 'view','add'))){  // Allow Managers to Add 
				return true;
			}
				
			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->RiskAssessmentDocument->isOwnedBy($id, $client)){
					return true;
				}
			}
		}
		
		if($group == 3){
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
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 

		if($group == 1){
			$this->RiskAssessmentDocument->recursive = 0;
			$this->paginate = array('order' => array('RiskAssessmentDocument.client_id' => 'ASC'));			
			$this->set('riskAssessmentDocuments', $this->paginate());			
		}elseif($group == 2) {
			$this->paginate = array(
				'conditions' => array('RiskAssessmentDocument.client_id' => $client),
				'order' => array('RiskAssessmentDocument.name' => 'ASC')
			);
			$this->set('riskAssessmentDocuments', $this->paginate());
		} else {
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
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
		
		$this->RiskAssessmentDocument->id = $id;
		if (!$this->RiskAssessmentDocument->exists()) {
			throw new NotFoundException(__('Invalid Risk Assessment Document'));
		}

		if($group == 1){
			$this->set('riskAssessmentDocument', $this->RiskAssessmentDocument->read(null, $id));
		} elseif($group == 2){
				$is_authorized = $this->RiskAssessmentDocument->find('first', array(
				'conditions' => array(
					'RiskAssessmentDocument.id' => $id,
					'AND' => array('RiskAssessmentDocument.client_id' => $client)
				)
			));
			
			if($is_authorized){
				$this->set('riskAssessmentDocument', $this->RiskAssessmentDocument->read(null, $id));
			} else { // Else Banned!
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
			} 
		} else { 
			$this->Session->setFlash('You are not authorized to view that!');
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RiskAssessmentDocument->create();
			if ($this->RiskAssessmentDocument->save($this->request->data)) {
				$this->Session->setFlash(__('The risk assessment document has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The risk assessment document could not be saved. Please, try again.'));
			}
		}
		$clients = $this->RiskAssessmentDocument->Client->find('list');
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
		$this->RiskAssessmentDocument->id = $id;
		if (!$this->RiskAssessmentDocument->exists()) {
			throw new NotFoundException(__('Invalid risk assessment document'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RiskAssessmentDocument->save($this->request->data)) {
				$this->Session->setFlash(__('The risk assessment document has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The risk assessment document could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RiskAssessmentDocument->read(null, $id);
		}
		$clients = $this->RiskAssessmentDocument->Client->find('list');
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
		$this->RiskAssessmentDocument->id = $id;
		if (!$this->RiskAssessmentDocument->exists()) {
			throw new NotFoundException(__('Invalid risk assessment document'));
		}
		if ($this->RiskAssessmentDocument->delete()) {
			$this->Session->setFlash(__('Risk assessment document deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Risk assessment document was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}