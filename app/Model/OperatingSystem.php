<?php
App::uses('AppModel', 'Model');
/**
 * OperatingSystem Model
 *
 * @property OrganizationProfile $OrganizationProfile
 */
class OperatingSystem extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'os_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'os_name' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'OrganizationProfile' => array(
			'className' => 'OrganizationProfile',
			'joinTable' => 'operating_systems_organization_profiles',
			'foreignKey' => 'operating_system_id',
			'associationForeignKey' => 'organization_profile_id',
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

}
