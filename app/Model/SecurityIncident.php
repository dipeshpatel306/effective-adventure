<?php
App::uses('AppModel', 'Model');
App::import('Vendor', 'constants');
/**
 * SecurityIncident Model
 *
 * @property Client $Client
 */
class SecurityIncident extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'cause_of_incident';

    public $qbDbid = SI_DBID;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		/*'date_of_incident' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'discovery_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'reported_by' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cause_of_incident' => array(
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
        '8' => array('date_of_incident', 'mapQBDate'),
        '9' => array('discovery_date', 'mapQBDate'),
        '10' => array('description_of_incident', null),
        '11' => array('cause_of_incident', null),
        '12' => array('assets_involved', null),
        '13' => array('steps_taken', null),
        '14' => array('date_of_resolution', 'mapQBDate'),
        '15' => array('cause_other', null),
        '20' => array('number_of_records', null),
        '21' => array('source', null),
        '32' => array('other_assets_involved', null),
        '33' => array('breach_notification_ra', null),
        '34' => array('after_completing', null),
        '35' => array('informed_individual', null),
        '36' => array('breach_date_completed', 'mapQBDate'),
        '37' => array('give_description', null),
        '38' => array('recommend_steps', null),
        '39' => array('give_breach_description', null),
        '40' => array('effect_more_than_500', null),
        '41' => array('notify_hhs', null),
        '42' => array('notify_hhs_date', 'mapQBDate'),
        '43' => array('notify_individuals', null),
        '44' => array('notify_individual_date', 'mapQBDate'),
        '45' => array('notify_media', null),
        '46' => array('notify_media_date', 'mapQBDate'),
        '49' => array('impact_level', null),
        '50' => array('systems_involved', null),
        '51' => array('other_systems_involved', null),
        '52' => array('description_of_breached', null),
        '53' => array('corrective_measures', null)
     );
/**
 * Check Client Owner
 */
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
}
