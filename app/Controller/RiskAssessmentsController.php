<?php
App::uses('AppController', 'Controller');
App::uses('QuickBase', 'Vendor');
App::uses('Group', 'Model');
/**
 * RiskAssessments Controller
 *
 * @property RiskAssessment $RiskAssessment
 */
class RiskAssessmentsController extends AppController {

/**
 * isAuthorized Method
 * Only Allow Hipaa Admin to add Edit Risk Assessment
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
 		$acct = $this->Session->read('Auth.User.Client.account_type');
		$client = $this->Auth->User('client_id');
		if ($group == 2 || $group == 3 || $acct == 'Initial'){ //allow
			if(in_array($this->action, array('view','take_risk_assessment'))){  // Allow Managers to Add
				return true;
			}

			if(in_array($this->action, array('edit', 'delete'))){ // Allow Managers to Edit, delete their own
				$id = $this->request->params['pass'][0];
				if($this->RiskAssessment->isOwnedBy($id, $client)){
					return true;
				}
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
		$this->loadModel('RiskAssessmentQuestions');
		$this->set('questions', $this->RiskAssessmentQuestions->find('all', array('order' => array('RiskAssessmentQuestions.category_question_number'))));

		if (!$this->RiskAssessment->exists()) {
			throw new NotFoundException(__('Invalid risk assessment'));
		}
		$this->set('ra', $this->RiskAssessment->read(null, $id));
	}

    public function view_print($id = null) {
        $this->RiskAssessment->id = $id;
        $this->loadModel('RiskAssessmentQuestions');
        $this->set('questions', $this->RiskAssessmentQuestions->find('all', array('order' => array('RiskAssessmentQuestions.category_question_number'))));

        if (!$this->RiskAssessment->exists()) {
            throw new NotFoundException(__('Invalid risk assessment'));
        }
        $this->set('ra', $this->RiskAssessment->read(null, $id));
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
				$this->Session->setFlash('The risk assessment has been saved.', 'default', array('class' => 'success message'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The risk assessment could not be saved. Please, try again.'));
			}
		}
        $this->setReferer();
		$clients = $this->RiskAssessment->Client->find('list');
		$this->set(compact('clients'));
	}

    public function take_risk_assessment() {
        $this->loadModel('RiskAssessmentQuestion');
        $num_questions = $this->RiskAssessmentQuestion->find('count');
        $this->set(compact('num_questions'));
        
        $this->loadModel('RiskAssessmentQuestionSafeguardCategory');
        $questions = $this->RiskAssessmentQuestionSafeguardCategory->find('all', array('recursive' => 2));
        $this->set(compact('questions'));
        if ($this->request->is('post')) {
            // If user is a client automatically set the client id accordingly. Admin can change client ids
            $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
            if($group != Group::ADMIN){
                $this->request->data['RiskAssessment']['client_id'] = $this->Auth->User('client_id');
            }
            $this->RiskAssessment->create();
            if ($this->RiskAssessment->save($this->request->data)) {

                $this->Session->setFlash('Your risk assessment has been saved', 'default', array('class' => 'success message'));
                $this->redirect($this->origReferer());
            } else {
                $this->Session->setFlash(__('Your risk assessment could not be saved. Please, try again.'));
            }
        }
        $this->setReferer();
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
		$this->loadModel('RiskAssessmentQuestion');
        $num_questions = $this->RiskAssessmentQuestion->find('count');
        $this->set(compact('num_questions'));
        
        $this->set('riskAssessment', $this->RiskAssessment->read(null, $id));
        
        $this->loadModel('RiskAssessmentQuestionSafeguardCategory');
        $questions = $this->RiskAssessmentQuestionSafeguardCategory->find('all', array('recursive' => 2));
        $this->set(compact('questions'));

		// If user is a client automatically set the client id accordingly. Admin can change client ids
		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
		if($group != Group::ADMIN){
			$this->request->data['RiskAssessment']['client_id'] = $this->Auth->User('client_id');
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RiskAssessment->save($this->request->data)) {
				$this->Session->setFlash('The risk assessment has been saved.', 'default', array('class' => 'success message'));
				$this->redirect($this->origReferer());
			} else {
				$this->Session->setFlash(__('The risk assessment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RiskAssessment->read(null, $id);
		}
        $this->setReferer();
		$clients = $this->RiskAssessment->Client->find('list');
		$this->set(compact('clients'));
        $this->render('take_risk_assessment');
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
			$this->Session->setFlash(__('Risk assessment deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Risk assessment was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}
    
}
