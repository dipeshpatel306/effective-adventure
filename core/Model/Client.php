<?php
App::uses('AppModel', 'Model');
App::uses('Core', 'ConnectionManager');
App::import('Vendor', 'appendix_pdf');
App::import('Vendor', 'constants');
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

    public $qbDbid = CLIENTS_DBID;
    
    public $order = 'Client.name asc';

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
			'fields' => array('OrganizationProfile.id, OrganizationProfile.client_id'),
		    'qbFid' => ORG_INFO_RELATED_CLIENT
        ),
		'RiskAssessment' => array(
			'className' => 'RiskAssessment',
			'dependent' => true,
			'fields' => array('RiskAssessment.id, RiskAssessment.client_id, RiskAssessment.created, RiskAssessment.modified'),
			'qbFid' => RA_ANSWERS_RELATED_CLIENT
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
			'counterQuery' => '',
			'qbFid' => USERS_RELATED_CLIENT
		),
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
			'counterQuery' => '',
			'qbFid' => HPNP_DBID
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
			'counterQuery' => '',
			'qbFid' => OPNP_RELATED_CLIENT
		),
		'RiskAssessmentDocument' => array(
			'className' => 'RiskAssessmentDocument',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'RiskAssessmentDocument.id, RiskAssessmentDocument.client_id, RiskAssessmentDocument.name, RiskAssessmentDocument.created, RiskAssessmentDocument.modified, RiskAssessmentDocument.attachment, RiskAssessmentDocument.attachment_dir',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			'qbFid' => RA_RELATED_CLIENT
		),
		'BusinessAssociateAgreement' => array(
			'className' => 'BusinessAssociateAgreement',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'BusinessAssociateAgreement.id, BusinessAssociateAgreement.client_id, BusinessAssociateAgreement.business_name, BusinessAssociateAgreement.attachment, BusinessAssociateAgreement.attachment_dir,BusinessAssociateAgreement.email, BusinessAssociateAgreement.contract_date, BusinessAssociateAgreement.created, BusinessAssociateAgreement.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			'qbFid' => BAA_RELATED_CLIENT
		),
		'DisasterRecoveryPlan' => array(
			'className' => 'DisasterRecoveryPlan',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'DisasterRecoveryPlan.id, DisasterRecoveryPlan.client_id, DisasterRecoveryPlan.name, DisasterRecoveryPlan.created, DisasterRecoveryPlan.modified, DisasterRecoveryPlan.attachment, DisasterRecoveryPlan.attachment_dir',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			'qbFid' => DRP_RELATED_CLIENT
		),
		'OtherContractsAndDocument' => array(
			'className' => 'OtherContractsAndDocument',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'OtherContractsAndDocument.id, OtherContractsAndDocument.client_id, OtherContractsAndDocument.name, OtherContractsAndDocument.created, OtherContractsAndDocument.modified, OtherContractsAndDocument.attachment, OtherContractsAndDocument.attachment_dir',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			'qbFid' => OCND_RELATED_CLIENT
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
			'counterQuery' => '',
			'qbFid' => SI_RELATED_CLIENT
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
			'counterQuery' => '',
			'qbFid' => SRA_RELATED_CLIENT
		),
		'EphiReceived' => array(
			'className' => 'EphiReceived',
			'foreignKey' => 'client_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'EphiReceived.id, EphiReceived.client_id, EphiReceived.date_received, EphiReceived.received_by, EphiReceived.time_received, EphiReceived.date_returned, EphiReceived.time_returned, EphiReceived.created, EphiReceived.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			'qbFid' => EPHIREC_RELATED_CLIENT
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
			'counterQuery' => '',
			'qbFid' => EPHIREM_RELATED_CLIENT
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
    
    public function beforeSave($options=array()) {
        if (isset($this->data['Client']['moodle_course_id'])) {
            $course_id = $this->data['Client']['moodle_course_id'];
            $this->data['Client']['moodle_course_name'] = $this->getMoodleCourseName($course_id);
        }  
		$this->data[$this->alias]['admin_account'] = $this->randomStr(10);
		$this->data[$this->alias]['user_account'] = $this->randomStr(10);
		$this->data[$this->alias]['file_key'] = $this->randomStr(10);
        return true;
    }
    
    public function getMoodleCourseName($course_id) {
        if (!isset($course_id) || empty($course_id)) {
            $name = '';
        } else {
            $moodle = ConnectionManager::getDataSource('moodle');
            $moodle->rawQuery('SELECT shortname FROM mdl_course WHERE id=' . $course_id);
            $row = $moodle->fetchRow();
            $name = $row['mdl_course']['shortname'];
        }
        return $name;
    }
    
    public function getMoodleCourses() {
        $moodle = ConnectionManager::getDataSource('moodle');
        $moodle->rawQuery('SELECT id, shortname FROM mdl_course');
        $moodle_courses = array('' => '');
        while ($course = $moodle->fetchRow()) {
            $moodle_courses[$course['mdl_course']['id']] = $course['mdl_course']['shortname'];
        }
        return $moodle_courses;
   }

    // QB Migration Vars
    public $qbFieldMap = array(
        CLIENTS_NAME => array('name', null),
        CLIENTS_CONTACT_EMAIL => array('email', null),
        CLIENTS_SERVICE_TYPE => array('account_type', null),
        CLIENTS_MOODLE_COURSE_ID => array('moodle_course_id', null),
        CLIENTS_ACTIVE => array('active', null),
        CLIENTS_ADMIN_CODE => array('admin_account', null),
        CLIENTS_USER_CODE => array('user_account', null),
        '32' => array('risk_assessment_status', 'mapRAComplete')
    );
    
    function mapRAComplete($val, $qb_rec, $field_name, &$data) {
        if ($val == '1') {
            $data[$field_name] = date("Y-m-d");
        }
    }
    
    public function getQBClients() {
        /**
         * Returns an array of QB RID to client name sorted by name
         */
        $qdb = $this->qbConn();
        $query_data = $qdb->do_query(0, 1, 0, RECORD_ID . "." . CLIENTS_NAME);
        $qb_clients = array();
        foreach ($query_data->table->records->record as $client)   {
            $rid = (string) $client->f[0];
            $name = (string) $client->f[1];
            $qb_clients[$rid] = $name . " ($rid)";
        }
        uasort($qb_clients, function($a,$b){ if ( $a==$b ) return 0; else return ($a > $b) ? 1 : -1; });
        return $qb_clients;
    }
    
    public function newFromQB($rid, $qb_rec, $client_id=null) {
        $this->create();
        $data = $this->_mapQBFields($qb_rec);
        $this->set($data);
        $this->save(null, false);
        $children = array_merge($this->hasMany, $this->hasOne);
        foreach ($children as $key=>$association) {
            if (!isset($association['qbFid'])) continue;
            $model = $association['className'];
            $this->$model->migrateForQBClient($rid, $association['qbFid'], $this->id);
        }
        return true;
    }
	
	public function createAppendix($raQuestions) {
		$client = $this->read();
		$orgProfile = $this->OrganizationProfile->find('first', array('conditions' => array('Client.id' => $this->id)));
		$riskAssessment = $this->RiskAssessment->find('first', array('conditions' => array('Client.id' => $this->id)));
		$pdf = new AppendixPDF();
		$pdf->Create($client, $orgProfile, $riskAssessment, $raQuestions);
	}
	
	public function isOwnedByPartner($id, $partner){
		$this->id = $id;
		return $this->field('partner_id') === $partner;
    }
}
