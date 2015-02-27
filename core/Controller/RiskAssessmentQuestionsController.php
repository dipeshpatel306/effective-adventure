<?php
App::uses('AppController', 'Controller');
/**
 * RiskAssessmentQuestions Controller
 *
 * @property RiskAssessmentQuestion $RiskAssessmentQuestion
 */
class RiskAssessmentQuestionsController extends AppController {

    public $paginate = array(
        'limit' => 50,
        'order' => array(
            'RiskAssessmentQuestion.id' => 'asc'
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $questions = $this->RiskAssessmentQuestion->RiskAssessmentQuestionSafeguardCategory->find('all', array('recursive' => 2));
        $this->set(compact('questions'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RiskAssessmentQuestion->id = $id;
		if (!$this->RiskAssessmentQuestion->exists()) {
			throw new NotFoundException(__('Invalid risk assessment question'));
		}
		$this->set('riskAssessmentQuestion', $this->RiskAssessmentQuestion->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RiskAssessmentQuestion->create();
			if ($this->RiskAssessmentQuestion->save($this->request->data)) {
				$this->Session->setFlash('The risk assessment question has been saved.', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The risk assessment question could not be saved. Please, try again.'));
			}
		}
		$categories = $this->RiskAssessmentQuestion->RiskAssessmentQuestionSubCategory->find('list');
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
		$this->RiskAssessmentQuestion->id = $id;
		if (!$this->RiskAssessmentQuestion->exists()) {
			throw new NotFoundException(__('Invalid risk assessment question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RiskAssessmentQuestion->save($this->request->data)) {
				$this->Session->setFlash('The risk assessment question has been saved.', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The risk assessment question could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RiskAssessmentQuestion->read(null, $id);
		}
		$categories = $this->RiskAssessmentQuestion->RiskAssessmentQuestionSubCategory->find('list');
		$this->set(compact('categories'));
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
		$this->RiskAssessmentQuestion->id = $id;
		if (!$this->RiskAssessmentQuestion->exists()) {
			throw new NotFoundException(__('Invalid risk assessment question'));
		}
		if ($this->RiskAssessmentQuestion->delete()) {
			$this->Session->setFlash(__('Risk assessment question deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Risk assessment question was not deleted.'));
		$this->redirect(array('action' => 'index'));
	}
}
