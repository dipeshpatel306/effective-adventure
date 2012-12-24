<?php
App::uses('AppModel', 'Model');
/**
 * Policy Model
 *
 */
class Policy extends AppModel {

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
		'policy_type' => array(
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

/*
 * Upload behavior
 * 
 */
	public $actsAs = array( 
		'Uploader.Attachment' => array(
			'attachment' => array(
				//'name'		=> 'formatFileName',	// Name of the function to use to format filenames
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
				)
			)
		)
	);


}
