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
		// 'additional_information' => array(
			// 'notempty' => array(
				// 'rule' => array('notempty'),
				// //'message' => 'Your custom message here',
				// //'allowEmpty' => false,
				// //'required' => false,
				// //'last' => false, // Stop validation after this rule
				// //'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		// ),
		// 'how_to_answer_question' => array(
			// 'notempty' => array(
				// 'rule' => array('notempty'),
				// //'message' => 'Your custom message here',
				// //'allowEmpty' => false,
				// //'required' => false,
				// //'last' => false, // Stop validation after this rule
				// //'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		// ),
	);
	
	public function beforeSave($options = array()) {
		if (!isset($this->data[$this->alias]['id'])) {
			$options = array(
    			'conditions' => array(
        			'RiskAssessmentQuestionSubCategory.id' => $this->data[$this->alias]['category_id']
    			)	
			);
			$category = $this->RiskAssessmentQuestionSubCategory->find('first', $options);
			$this->data[$this->alias]['safeguard_category_id'] = $category['RiskAssessmentQuestionSubCategory']['safeguard_category_id'];
			$this->data[$this->alias]['question_number'] = count($this->find('list'))+1;
		} 
		return true;
	}
	
	public function afterSave($created, $options = array()) {
		if ($created) {
			$this->updateAll(
				array('RiskAssessmentQuestion.category_question_number' => 'RiskAssessmentQuestion.category_question_number+1'),
				array('RiskAssessmentQuestion.category_question_number >=' => $this->data[$this->alias]['category_question_number'],
					  'RiskAssessmentQuestion.id <>' => $this->data[$this->alias]['id'])
			);
		}
	}
	
	public function beforeDelete($cascade = true) {
		$this->updateAll(
			array('RiskAssessmentQuestion.category_question_number' => 'RiskAssessmentQuestion.category_question_number-1'),
			array('RiskAssessmentQuestion.category_question_number >' => $this->field('category_question_number'))
		);
		return true;
	}
}
