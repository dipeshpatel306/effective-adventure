<?php
App::uses('AppModel', 'Model');
/**
 * Client Model
 *
 * @property User $User
 */
class Client extends AppModel {

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
				'message' => 'You forgot the Client name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'That Client name already exists',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * hasOne associations
 * @var array
 */
	public $hasOne = array(
		'OrganizationProfile' => array(
			'className' => 'OrganizationProfile',
			'dependent' => true,
			'fields' => array('OrganizationProfile.id, OrganizationProfile.client_id')
		),
		'RiskAssessment' => array(
			'className' => 'RiskAssessment',
			'dependent' => true,
			'fields' => array('RiskAssessment.id, RiskAssessment.client_id, RiskAssessment.created, RiskAssessment.modified')
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Partner' => array(
			'className' => 'Partner',
			'foreignKey' => 'partner_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'fields' => array('Partner.id, Partner.name')
		),
	);


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => array('User.id, User.first_name, User.last_name, User.email, User.group_id, User.client_id, User.last_login, User.created, User.modified'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
/*		'PoliciesAndProcedure' => array(
			'className' => 'PoliciesAndProcedure',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => array('PoliciesAndProcedure.id, PoliciesAndProcedure.name, PoliciesAndProcedure.client_id, PoliciesAndProcedure.created, PoliciesAndProcedure.modified, PoliciesAndProcedure.attachment'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'PoliciesAndProceduresDocument' => array(
			'className' => 'PoliciesAndProceduresDocument',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => array(),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'OtherPoliciesAndProcedure' => array(
			'className' => 'OtherPoliciesAndProcedure',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => array('OtherPoliciesAndProcedure.id, OtherPoliciesAndProcedure.name, OtherPoliciesAndProcedure.client_id, OtherPoliciesAndProcedure.created, OtherPoliciesAndProcedure.modified, OtherPoliciesAndProcedure.attachment, OtherPoliciesAndProcedure.attachment_dir'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'RiskAssessmentDocument' => array(
			'className' => 'RiskAssessmentDocument',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'RiskAssessmentDocument.id, RiskAssessmentDocument.client_id, RiskAssessmentDocument.name, RiskAssessmentDocument.created, RiskAssessmentDocument.modified, RiskAssessmentDocument.attachment',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'BusinessAssociateAgreement' => array(
			'className' => 'BusinessAssociateAgreement',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'BusinessAssociateAgreement.id, BusinessAssociateAgreement.client_id, BusinessAssociateAgreement.business_name, BusinessAssociateAgreement.attachment, BusinessAssociateAgreement.email, BusinessAssociateAgreement.contract_date, BusinessAssociateAgreement.created, BusinessAssociateAgreement.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'DisasterRecoveryPlan' => array(
			'className' => 'DisasterRecoveryPlan',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'DisasterRecoveryPlan.id, DisasterRecoveryPlan.client_id, DisasterRecoveryPlan.name, DisasterRecoveryPlan.created, DisasterRecoveryPlan.modified, DisasterRecoveryPlan.attachment',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'OtherContractsAndDocument' => array(
			'className' => 'OtherContractsAndDocument',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'OtherContractsAndDocument.id, OtherContractsAndDocument.client_id, OtherContractsAndDocument.name, OtherContractsAndDocument.created, OtherContractsAndDocument.modified, OtherContractsAndDocument.attachment',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SecurityIncident' => array(
			'className' => 'SecurityIncident',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'SecurityIncident.id, SecurityIncident.client_id, SecurityIncident.date_of_incident, SecurityIncident.time_of_incident, SecurityIncident.discovery_date, SecurityIncident.description_of_incident,SecurityIncident.created, SecurityIncident.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ServerRoomAccess' => array(
			'className' => 'ServerRoomAccess',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'ServerRoomAccess.id, ServerRoomAccess.client_id, ServerRoomAccess.date, ServerRoomAccess.time, ServerRoomAccess.person, ServerRoomAccess.reason, ServerRoomAccess.company, ServerRoomAccess.created, ServerRoomAccess.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EphiReceived' => array(
			'className' => 'EphiReceived',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'EphiReceived.id, EphiReceived.client_id, EphiReceived.date_received, EphiReceived.received_by, EphiReceived.time_received, EphiReceived.patient_name, EphiReceived.date_returned, EphiReceived.time_returned, EphiReceived.created, EphiReceived.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EphiRemoved' => array(
			'className' => 'EphiRemoved',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'EphiRemoved.id, EphiRemoved.client_id, EphiRemoved.date, EphiRemoved.time, EphiRemoved.removed_by, EphiRemoved.returned_by, EphiRemoved.created, EphiRemoved.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SirtTeam' => array(
			'className' => 'SirtTeam',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'SirtTeam.id, SirtTeam.client_id, SirtTeam.company_name, SirtTeam.created, SirtTeam.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),

	);
}
