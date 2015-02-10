<?php
App::uses('PoliciesAndProceduresDocument', 'Model');

/**
 * PoliciesAndProceduresDocument Test Case
 *
 */
class PoliciesAndProceduresDocumentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.policies_and_procedures_document',
		'app.policies_and_procedure',
		'app.client',
		'app.partner',
		'app.organization_profile',
		'app.risk_assessment',
		'app.user',
		'app.group',
		'app.other_policies_and_procedure',
		'app.risk_assessment_document',
		'app.business_associate_agreement',
		'app.disaster_recovery_plan',
		'app.other_contracts_and_document',
		'app.security_incident',
		'app.server_room_access',
		'app.ephi_received',
		'app.ephi_removed',
		'app.sirt_team',
		'app.sirt_member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PoliciesAndProceduresDocument = ClassRegistry::init('PoliciesAndProceduresDocument');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PoliciesAndProceduresDocument);

		parent::tearDown();
	}

}
