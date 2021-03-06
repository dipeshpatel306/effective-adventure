<?php
App::uses('AppModel', 'Model');
/**
 * RiskAssessmentQuestion Model
 *
 */
class RiskAssessmentQuestion extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'question';
    public $order = 'RiskAssessmentQuestion.question_number ASC';
    public $belongsTo = array(
        'RiskAssessmentQuestionSubCategory' => array(
            'foreignKey' => 'category_id'
        ),
        'RiskAssessmentQuestionSafeguardCategory' => array(
            'foreignKey' => 'safeguard_category_id'
        )
    );


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'question_number' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'additional_information' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'how_to_answer_question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
