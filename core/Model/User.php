<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
App::import('Vendor', 'constants');
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

    public $qbDbid = USERS_DBID;
	
	public $virtualFields = array('active_real' => 'User.active && (Client.active || Partner.active)');
/**
 * Validation rules
 *
 * @var array
 */
    public $validateAdminEdit = array(
        'password' => array(
            array(
                'rule' => array('passCompare'),
                'message' => 'The Passwords do not match.'
            ),
        ),
        'password2' => array(
            array(
                'rule' => array('passCompare'),
                'message' => 'The Passwords do not match.'
            ),
        )
    );
 
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
                'allowEmpty' => true,
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
        ),
        'Partner' => array(
			'className' => 'Partner',
			'foreignKey' => 'partner_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );

/**
 * Associate users and groups to Acl table
 */
    //public $actsAs = array('Acl' => array('type' => 'requester'));

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
	public function isOwnedByPartner($id, $partner){
        return $this->field('id', array('id' => $id, 'partner_id' => $partner)) === $id;
    }
/**
 * Allow user to edit their own profile
 */
    public function isUser($id){
        return $this->field('id', array('id' => $id)) === $id;
    }

/**
 * Compare and Verify Password
 */
 public function passCompare(){
    if (empty($this->data['User']['password']) && empty($this->data['User']['password2'])) {
        return true; // for admin_edit
    }
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
/**
 * Account Activation Hash method
 */
    public function getActivationHash(){
        if(!isset($this->id)){
            return false;
        }
        return substr(Security::hash(Configure::read('Security.salt').$this->field('created').date(Ymd)), 0, 8);
    }
    
    public $qbFieldMap = array(
        USERS_FIRST_NAME => array('first_name', null),
        USERS_LAST_NAME => array('last_name', null),
        USERS_EMAIL_ADDRESS => array('email', null),
        USERS_EMAIL_VALIDATED => array('email_validated', null),
        USERS_PHONE_NUMBER => array('phone_number', null),
        USERS_CELL_PHONE => array('cell_number', null),
        USERS_ACTIVE => array('active', null),
        USERS_PASSWORD => array('password_old', null),
        USERS_RELATED_ROLE => array('group_id', 'mapQBRole')
    );
    
    public function mapQBRole($qb_val, $qb_rec, $field_name, &$data) {
        if ($qb_val === '1') {
            $data[$field_name] = Group::ADMIN;
        } elseif (in_array($qb_val, array('2', '3', '5', '7', '9'))) {
            $data[$field_name] = Group::MANAGER;
        } elseif (in_array($qb_val, array('4', '6', '8'))) {
            $data[$field_name] = Group::USER;
        }
    }
    
    public function newFromQB($rid, $qb_rec, $client_id=null) {
        $this->create();
        $data = $this->_mapQBFields($qb_rec);
        $data['client_id'] = $client_id;
        $this->set($data);
        $this->save(null, false);
    }

}
