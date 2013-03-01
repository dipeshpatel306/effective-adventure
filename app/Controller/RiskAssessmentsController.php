<?php
App::uses('AppController', 'Controller');
/**
 * RiskAssessments Controller
 *
 * @property RiskAssessment $RiskAssessment
 */
class RiskAssessmentsController extends AppController {

/**
 * isAuthorized Method
 * Only Allow Hipaa Admin to add groups
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
 		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		$acct = $this->Session->read('Auth.User.Client.account_type');

		if ($group == 2 || $group == 3){ //allow
				return true;
		}
		
		return parent::isAuthorized($user);
 	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RiskAssessment->recursive = 0;
		$this->set('riskAssessments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RiskAssessment->id = $id;
		if (!$this->RiskAssessment->exists()) {
			throw new NotFoundException(__('Invalid risk assessment'));
		}
		$this->set('riskAssessment', $this->RiskAssessment->read(null, $id));
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
				$this->request->data['RiskAssessment']['client_id'] = $this->Auth->User('client_id');
			}	
						
			$this->RiskAssessment->create();
			if ($this->RiskAssessment->save($this->request->data)) {
				$this->Session->setFlash('The risk assessment has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The risk assessment could not be saved. Please, try again.'));
			}
		}
		$clients = $this->RiskAssessment->Client->find('list');
		$this->set(compact('clients'));
	}
/**
 * get_assessed method
 *
 * @return void
 */
	public function take_risk_assessment() {
		$this->loadModel('RiskAssessmentQuestion');
		$RaQ = $this->RiskAssessmentQuestion->find('all');
		$this->set('RaQ', $RaQ);	
		
		if ($this->request->is('post')) {
			
			// If user is a client automatically set the client id accordingly. Admin can change client ids
			$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
			if($group != 1){
				$this->request->data['RiskAssessment']['client_id'] = $this->Auth->User('client_id');
			}	
							
			
			$this->request->data['RiskAssessment']['client_id'] = $this->Auth->User('client_id');			
			$this->RiskAssessment->create();
			if ($this->RiskAssessment->save($this->request->data)) {
						
				$this->Session->setFlash('Your risk assessment has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Your risk assessment could not be saved. Please, try again.'));
			}
		}
		$clients = $this->RiskAssessment->Client->find('list');
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
		$this->RiskAssessment->id = $id;
		if (!$this->RiskAssessment->exists()) {
			throw new NotFoundException(__('Invalid risk assessment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RiskAssessment->save($this->request->data)) {
				$this->Session->setFlash('The risk assessment has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The risk assessment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RiskAssessment->read(null, $id);
		}
		$clients = $this->RiskAssessment->Client->find('list');
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
		$this->RiskAssessment->id = $id;
		if (!$this->RiskAssessment->exists()) {
			throw new NotFoundException(__('Invalid risk assessment'));
		}
		if ($this->RiskAssessment->delete()) {
			$this->Session->setFlash(__('Risk assessment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Risk assessment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}