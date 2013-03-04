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
		'client_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
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

/*
 * Upload behavior
 * 
 */
	public $actsAs = array( 
		'Uploader.Attachment' => array(
			'document' => array(
				//'name'		=> 'formatFileName',	// Name of the function to use to format filenames
				'baseDir'	=> '',			// See UploaderComponent::$baseDir
				'uploadDir'	=> '/documents/',			// See UploaderComponent::$uploadDir
				'dbColumn'	=> 'document',	// The database column name to save the path to
				'importFrom'	=> '',			// Path or URL to import file
				'defaultPath'	=> '',			// Default file path if no upload present
				'maxNameLength'	=> 100,			// Max file name length
				'overwrite'	=> true,		// Overwrite file with same name if it exists
				'stopSave'	=> true,		// Stop the model save() if upload fails
				'allowEmpty'	=> true,		// Allow an empty file upload to continue
				'transforms'	=> array(),		// What transformations to do on images: scale, resize, etc
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
			'document' => array(
				'extension' => array(
					'value' => array('doc', 'docx', 'dot', 'pdf'),
					'error'	=> 'File must me .pdf, .doc, .docx or .dot'
				)
			)
		)
	);
	
/**
 * Change file directory to that of client
 * 
 */
public function beforeUpload($options){ 
	$key = $this->data['PoliciesAndProceduresDocument']['file_key'];	
	$client = $this->data['PoliciesAndProceduresDocument']['client_id']; // check client id
	$options['uploadDir'] = "/documents/policies_and_procedures/$client/$key/" ;
	return $options;
}



/**
 * Check Client Owner
 */	
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;	
	}
}
