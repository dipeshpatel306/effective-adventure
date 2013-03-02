<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Client $Client
 * @property Post $Post
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'authCode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You forgot the Authorization Code.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),		
		),
		'email' => array(
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'That email address is already taken',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You forgot your Email.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			array(
				'rule' => array('confirmEmail'),
				'message' => 'The email does not match.'
			),			
		),		
		'email2' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You forgot your Email.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			array(
				'rule' => array('confirmEmail'),
				'message' => 'The email does not match.'
			),
		),			
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your forgot the Password.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			array(
				'rule' => array('passCompare'),
				'message' => 'The Passwords do not match.'
			),			
		),
		'password2' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your forgot to verify your password.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			array(
				'rule' => array('passCompare'),
				'message' => 'The Passwords do not match.'
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You forgot your First Name.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You forgot your Last Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone_number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You forgot your Phone Number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),		
		'group_id' => array(
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
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
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
 * Associate users and groups to Acl table
 */
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

/**
 * Check Client Owner
 */	
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;	
	}
 
/** 
 * Compare and Verify Password
 */
 public function passCompare(){
 	return $this->data['User']['password'] === $this->data['User']['password2'];
 }

/** 
 * Confirm Email
 */
 public function confirmEmail(){
 	 	return $this->data['User']['email'] === $this->data['User']['email2'];
 }

/**
 * Hash password before storing in the database
 * 
 */
    public function beforeSave($options = array()) {
    	parent::beforeSave($options);
    	if(!empty($this->data['User']['password'])){
    		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    	}
        return true;
    }
}
