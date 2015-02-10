<?php
App::uses('AppModel', 'Model');

class RiskAssessmentQuestionSafeguardCategory extends AppModel {
    public $hasMany = array(
        'RiskAssessmentQuestionSubCategory' => array(
            'foreignKey' => 'safeguard_category_id'
        )
    );   
}
