<?php
App::uses('AppModel', 'Model');
/**
 * PoliciesAndProceduresDocument Model
 *
 * @property PoliciesAndProcedure $PoliciesAndProcedure
 * @property Client $Client
 */
class PoliciesAndProceduresDocument extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'client_id';

/**
 * Upload Plugin Behavior
 */
	public $actsAs = array(
		'Upload.Upload' => array(
			'document' => array(
				'fields' => array(
					'dir' => 'document_dir'
				),

			)
		)
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'policies_and_procedure_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'document' => array(
			'notempty' => array(
				//'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'1' => array(
				'rule' => array('isValidExtension', array('doc', 'docx', 'dot', 'dotx', 'pdf'), false),
        		'message' => 'File type must be doc, docx, dot, dotx, pdf'
			),
			'2' => array(
        		'rule' => array('isValidMimeType', array(
				'application/msword',
				'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
				'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
				'application/pdf'
			), false),
       	 		'message' => 'File type must be doc, docx, dot, dotx, pdf'
			),
			'3' => array(
        		'rule' => 'isUnderFormSizeLimit',
        		'message' => 'File exceeds form upload filesize limit'
			),
			'4' => array(
        		'rule' => 'isCompletedUpload',
        		'message' => 'File was not successfully uploaded'
			),
		),

		'client_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your forgot the client',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*'document' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PoliciesAndProcedure' => array(
			'className' => 'PoliciesAndProcedure',
			'foreignKey' => 'policies_and_procedure_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * Check Client Owner
 */
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
}
