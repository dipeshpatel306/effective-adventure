<?php
App::uses('AppModel', 'Model');

class RiskAssessmentQuestionSubCategory extends AppModel {
    public $hasMany = array(
        'RiskAssessmentQuestion' => array(
            'foreignKey' => 'category_id',
            'order' => 'category_question_number'
        )
    );   
    public $belongsTo = array(
        'RiskAssessmentQuestionSafeguardCategory' => array(
            'foreignKey' => 'safeguard_category_id'
        )
    );
}
?>