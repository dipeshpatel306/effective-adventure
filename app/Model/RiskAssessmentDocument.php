<?php
App::uses('AppModel', 'Model');
/**
 * RiskAssessmentDocument Model
 *
 * @property Client $Client
 */
class RiskAssessmentDocument extends AppModel {

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
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'attachment' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
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
/*
 * Upload behavior
 *
 */
	public $actsAs = array(

		'Uploader.FileValidation' => array(
			'attachment' => array(
				'extension'	=> array(
					'value' => array('doc', 'docx', 'dot', 'pdf')
					),

				/*'required' => array(
					'value' => false,
					'on' => 'update',
					'allowEmpty' => true
				)*/
			)

		),

		'Uploader.Attachment' => array(
			'attachment' => array(
				'nameCallback' => 'formatFileName',
				'append' => '',
				'prepend' => '',
				'tempDir' => TMP,
				//'uploadDir'	=> 'webroot/documents/',
				//'finalPath' => '',
				'dbColumn' => 'attachment',
				'metaColumns' => array(),
				'defaultPath' => '',
				'overwrite' => true,
				'stopSave' => true,
				'allowEmpty' => true,
				'transforms' => array(),
				'transport' => array()


				//'name'		=> 'formatFileName',	// Name of the function to use to format filenames
				/*'overwrite' => true,
				'baseDir'	=> '',			// See UploaderComponent::$baseDir
				'uploadDir'	=> '/documents/',			// See UploaderComponent::$uploadDir
				'dbColumn'	=> 'attachment',	// The database column name to save the path to
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
				)*/
			)
		)


	);

/**
 * Change file directory to that of client
 *
 */
public function beforeUpload($options){
	$key = $this->data['RiskAssessmentDocument']['file_key'];
	$client = $this->data['RiskAssessmentDocument']['client_id']; // check client id


	$options['finalPath'] = 'webroot/documents/'  .  "risk_assessment_documents/$client/$key/";
	$options['uploadDir'] =  WWW_ROOT . $options['finalPath'];
	return $options;
}
/**
 * Check Client Owner
 */
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
}
