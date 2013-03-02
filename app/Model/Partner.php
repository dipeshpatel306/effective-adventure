<?php
App::uses('AppModel', 'Model');
/**
 * Partner Model
 *
 * @property Client $Client
 */
class Partner extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'company' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'That Partner already exists',
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'partner_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
/*
 * Upload behavior
 * 
 */
	public $actsAs = array( 
		'Uploader.Attachment' => array(
			'logo' => array(
				//'name'		=> 'formatFileName',	// Name of the function to use to format filenames
				'baseDir'	=> '',			// See UploaderComponent::$baseDir
				'uploadDir'	=> '/documents/partners/',			// See UploaderComponent::$uploadDir
				'dbColumn'	=> 'logo',	// The database column name to save the path to
				'importFrom'	=> '',			// Path or URL to import file
				'defaultPath'	=> '',			// Default file path if no upload present
				'maxNameLength'	=> 100,			// Max file name length
				'overwrite'	=> true,		// Overwrite file with same name if it exists
				'stopSave'	=> true,		// Stop the model save() if upload fails
				'allowEmpty'	=> true,		// Allow an empty file upload to continue
				'transforms'	=> array(array('method' => 'resize', 'height' => 80, 'dbColumn' => 'logo')),// What transformations to do on images: scale, resize, etc
				's3'		=> array(),		// Array of Amazon S3 settings
				'metaColumns'	=> array(		// Mapping of meta data to database fields
					'ext' => '',
					'type' => '',
					'size' => '',
					'group' => '',
					'width' => '',
					'height' => '',
					'filesize' => ''
				)
			)
		),
		'Uploader.FileValidation' => array(
			'logo' => array(
				'extension' => array(
					'value' => array('gif', 'jpg', 'jpeg', 'png'),
					'error'	=> 'File must me .gif, .jpg, .jpeg, .png'
				)
			)
		)
	);
	
/**
 * Change file directory to that of client
 * 
 */
public function beforeUpload($options){ 
	//$key = $this->data['OtherContractsAndDocument']['file_key'];	
	$partnerName = $this->data['Partner']['name']; // get partner name
	$options['uploadDir'] = "/files/partners/$partnerName/" ;
	return $options;
}
}
