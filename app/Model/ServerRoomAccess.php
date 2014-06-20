<?php
App::uses('AppModel', 'Model');
require_once(APP . 'Vendor' . DS . 'constants.php');
/**
 * ServerRoomAccess Model
 *
 * @property Client $Client
 */
class ServerRoomAccess extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'server_room_access';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'reason';
    
    public $qbDbid = SRA_DBID;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		/*'date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'person' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reason' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
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
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public $qbFieldMap = array(
        '6' => array('date', null),
        '7' => array('person', null),
        '8' => array('company', null),
        '9' => array('reason', null),
        '10' => array('changed', null),
        '11' => array('what_changed', null),
        '12' => array('other_reason', null),
        '13' => array('notes', null)
    );
/**
 * Check Client Owner
 */
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
}
