<?php
App::uses('AppModel', 'Model');
require_once(APP . 'Vendor' . DS . 'constants.php');
/**
 * EphiReceived Model
 *
 * @property Client $Client
 */
class EphiReceived extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ephi_received';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';
    
    public $qbDbid = EPHIREC_DBID;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		/*'date_received' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'received_by' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_returned' => array(
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
        '7' => array('item', null),
        '8' => array('date_received', 'mapQBDate'),
        '10' => array('where_received', null),
        '11' => array('recevied_by', null),
        '12' => array('reason', null),
        '13' => array('date_returned', 'mapQBDate'),
        '14' => array('returned_to', null),
        '15' => array('returned_by', null),
        '17' => array('other_description', null),
        '18' => array('other_reason', null),
        '24' => array('notes', null)
    );
/**
 * Check Client Owner
 */
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
}
