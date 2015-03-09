<?php
App::uses('AppModel', 'Model');
App::import('Vendor', 'constants');
/**
 * EphiRemoved Model
 *
 * @property Client $Client
 */
class EphiRemoved extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ephi_removed';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';
    
    public $qbDbid = EPHIREM_DBID;

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
		'removed_by' => array(
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
        '6' => array('date', 'mapQBDate'),
        '22' => array('other_description', null),
        '8' => array('removed_by', null),
        '9' => array('when_returned', 'mapQBDate'),
        '7' => array('item', null),
        '19' => array('approved', null),
        '18' => array('reason', null),
        '23' => array('other_reason', null),
        '21' => array('returned_by', null),
        '25' => array('notes', null)
    );
    
}
