<?php
App::uses('AppController', 'Controller');


class RiskAssessmentQuestionSubCategoriesController extends AppController {
    public $paginate = array(
        'limit' => 50,
        'order' => array(
            'RiskAssessmentQuestionSubCategory.id' => 'asc'
        )
    );
    
    public function index() {
        $this->RiskAssessmentQuestionSubCategory->recursive = 1;
        $this->set('riskAssessmentQuestionSubCategories', $this->paginate());
    }
    
    public function view($id = null) {
        $this->RiskAssessmentQuestionSubCategory->id = $id;
        if (!$this->RiskAssessmentQuestionSubCategory->exists()) {
            throw new NotFoundException(__('Invalid risk assessment question sub-category'));
        }
        $this->set('riskAssessmentQuestionSubCategory', $this->RiskAssessmentQuestionSubCategory->read(null, $id));
    }
    
    public function edit($id = null) {
        $this->RiskAssessmentQuestionSubCategory->id = $id;
        if (!$this->RiskAssessmentQuestionSubCategory->exists()) {
            throw new NotFoundException(__('Invalid risk assessment question sub-category'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->RiskAssessmentQuestionSubCategory->save($this->request->data)) {
                $this->Session->setFlash('The risk assessment question sub-category has been saved', 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The risk assessment question sub-category could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->RiskAssessmentQuestionSubCategory->read(null, $id);
        }
    }
}
