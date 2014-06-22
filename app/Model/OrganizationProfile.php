<?php
App::uses('AppModel', 'Model');
require_once(APP . 'Vendor' . DS . 'constants.php');
/**
 * OrganizationProfile Model
 *
 * @property Client $Client
 * @property OperatingSystem $OperatingSystem
 */
class OrganizationProfile extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'organization_name';
    
    public $qbDbid = ORG_INFO_DBID;
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		/*'organization_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You forgot your Organization Name',
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
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public $qbFieldMap = array(
        '7' => array('second_location', 'mapQBBool'),
        '8' => array('third_location', 'mapQBBool'),
        '9' => array('fourth_location', 'mapQBBool'),
        '10' => array('fifth_location', 'mapQBBool'),
        '11' => array('address_1', null),
        '12' => array('address_2', null),
        '13' => array('city', null),
        '14' => array('state', null),
        '15' => array('zip', null),
        '16' => array('administrator_name', null),
        '17' => array('administrator_phone', 'mapQBPhone'),
        '18' => array('administrator_phone_alt', 'mapQBPhone'),
        '19' => array('administrator_email', null),
        '20' => array('second_address_1', null),
        '21' => array('second_address_2', null),
        '22' => array('second_city', null),
        '23' => array('second_state', null),
        '24' => array('second_zip', null),
        '25' => array('third_address_1', null),
        '26' => array('third_address_2', null),
        '27' => array('third_city', null),
        '28' => array('third_state', null),
        '29' => array('third_zip', null),
        '30' => array('fourth_address_1', null),
        '31' => array('fourth_address_2', null),
        '32' => array('fourth_city', null),
        '33' => array('fourth_state', null),
        '34' => array('fourth_zip', null),
        '35' => array('fifth_address_1', null),
        '36' => array('fifth_address_2', null),
        '37' => array('fifth_city', null),
        '38' => array('fifth_state', null),
        '39' => array('fifth_zip', null),
        '40' => array('number_employees', null),
        '41' => array('number_of_servers', null),
        '42' => array('network_operating_system', null),
        '43' => array('number_workstations', null),
        '44' => array('number_laptops', null),
        '45' => array('emr_ehr_implemented', null),
        '46' => array('emr_ehr_vendor', null),
        '47' => array('emr_ehr_internal_name', null),
        '48' => array('emr_ehr_os', null),
        '49' => array('email', null),
        '50' => array('email_vendor', null),
        '51' => array('email_vendor_details', null),
        '53' => array('emr_ehr_location', null),
        '64' => array('emr_ehr_os_other', null),
        '65' => array('emr_ehr_other_location', null),
        '67' => array('email_details', null),
        '68' => array('os_win7', null),
        '69' => array('os_winvista', null),
        '70' => array('os_winxp', null),
        '71' => array('os_winold', null),
        '72' => array('system_1_name', null),
        '73' => array('system_1_os', null),
        '74' => array('system_1_vendor', null),
        '75' => array('system_1_location', null),
        '76' => array('system_1_ephi', null),
        '77' => array('system_1_details', null),
        '78' => array('system_2_name', null),
        '79' => array('system_2_os', null),
        '80' => array('system_2_vendor', null),
        '81' => array('system_2_location', null),
        '82' => array('system_2_ephi', null),
        '83' => array('system_2_details', null),
        '84' => array('system_3_name', null),
        '85' => array('system_3_os', null),
        '86' => array('system_3_vendor', null),
        '87' => array('system_3_location', null),
        '88' => array('system_3_ephi', null),
        '89' => array('system_3_details', null),
        '90' => array('system_4_name', null),
        '91' => array('system_4_os', null),
        '92' => array('system_4_vendor', null),
        '93' => array('system_4_location', null),
        '94' => array('system_4_ephi', null),
        '95' => array('system_4_details', null),
        '96' => array('system_5_name', null),
        '97' => array('system_5_os', null),
        '98' => array('system_5_vendor', null),
        '99' => array('system_5_location', null),
        '100' => array('system_5_ephi', null),
        '101' => array('system_5_details', null),
        '102' => array('additional_info', null),
        '103' => array('portable_media_devices', null),
        '104' => array('backup_media', null),
        '105' => array('smartphones', null),
        '106' => array('list_smartphone_vendors', null),
        '108' => array('tablets', null),
        '110' => array('os_mac', null),
        '111' => array('os_win8', null),
        '112' => array('phi_on_servers', null),
        '113' => array('phi_on_laptops', null),
        '114' => array('phi_on_workstations', null),
        '115' => array('phi_on_email', null),
        '116' => array('phi_on_portable_media', null),
        '117' => array('phi_on_smartphones', null),
        '118' => array('mu_incentive_program', null)
    );

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'OperatingSystem' => array(
			'className' => 'OperatingSystem',
			'joinTable' => 'operating_systems_organization_profiles',
			'foreignKey' => 'organization_profile_id',
			'associationForeignKey' => 'operating_system_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);


/**
 * Check Client Owner
 */
	public function isOwnedBy($id, $client){
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
}
