<?php
App::uses('AppModel', 'Model');
App::import('Vendor', 'constants');
require_once(APP . 'Vendor' . DS . 'constants.php');
/**
 * DisasterRecoveryPlan Model
 *
 * @property Client $Client
 */
class DisasterRecoveryPlan extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    
    public $qbDbid = DRP_DBID;

/**
 * Upload Plugin Behavior
 */
	public $actsAs = array(
		'Upload.Upload' => array(
			'attachment' => array(
				'fields' => array(
					'dir' => 'attachment_dir'
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
		/*'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'attachment' => array(
			'notempty' => array(
				//'rule' => array('notempty'),
				////'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations

			),
			'1' => array(
                'rule' => array('isValidExtension', array('doc', 'docx', 'dot', 'dotx', 'pdf', 'xls', 'xlsx'), false),
                'message' => 'File type must be doc, docx, dot, dotx, pdf, xls, xlsx'
            ),
            '2' => array(
        		'rule' => 'isUnderFormSizeLimit',
        		'message' => 'File exceeds form upload filesize limit'
			),
			'3' => array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public $qbFieldMap = array(
        '6' => array('name', null),
        '7' => array('description', null),
        '8' => array('date', 'mapQBDate'),
        '12' => array('attachment', 'mapQBAttachment')
    );


/**
 * Check Client Owner
 */
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
}
