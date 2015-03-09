<?php
App::uses('AppModel', 'Model');
App::import('Vendor', 'constants');
//App::uses('Upload', 'UploadBehavior.Model');
/**
 * BusinessAssociateAgreement Model
 *
 * @property Client $Client
 */
class BusinessAssociateAgreement extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    
    public $qbDbid = BAA_DBID;

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
/*		'business_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'business_address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'zip' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
			'phone' => array(
				'rule' => array('phone'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'business_associate_agreement' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contract_date' => array(
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
				//'message' => 'Your custom message here',
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
        '6' => array('business_name', null),
        '7' => array('business_address', null),
        '8' => array('business_address2', null),
        '9' => array('city', null),
        '10' => array('state', null),
        '11' => array('contact', null),
        '12' => array('email', null),
        '13' => array('phone', null),
        '14' => array('relationship', null),
        '15' => array('contract_date', 'mapQBDate'),
        '24' => array('attachment', null)
    );
}
