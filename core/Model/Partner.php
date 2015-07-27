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
 * Upload Plugin Behavior
 */
	public $actsAs = array(
		'Upload.Upload' => array(
			'logo' => array(
				'fields' => array(
					'dir' => 'logo_dir',			
				),
				// Requie ImageMagick TODO Reneable
				/*'thumbnailSizes' => array(
                    'big' => '300h',
                    'small' => '200h',
                    // /'thumb' => '80x80'
                )*/
		
				
			)
		)
	);	

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		/*'company' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
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
		'logo' => array(
			'notempty' => array(
				//'rule' => array('notempty'),
				////'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations

			),
			'1' => array(
				'rule' => array('isValidExtension', array('jpg', 'jpeg', 'gif', 'png'), false),
        		'message' => 'File type must be jpg, jpeg, gif, png'
			),
			'2' => array(
        		'rule' => array('isValidMimeType', array(
				'image/gif',
				'image/jpeg',
				'image/png',
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
	/*	'phone' => array(
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
	
	public function beforeSave($options = array()) {
		$this->data[$this->alias]['admin_account'] = $this->randomStr(10);
		return true;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $key=>$val) {
			if (array_key_exists('Client', $val)) {
				$count = 0;
				foreach ($results[$key]['Client'] as $client) {
					$count += $client['user_count'];
				}
				$results[$key]['Partner']['user_count'] = $count;
			}
		}
		return $results;
	}

}
