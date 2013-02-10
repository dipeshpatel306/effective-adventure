<?php
App::uses('PoliciesAndProcedure', 'Model');

/**
 * PoliciesAndProcedure Test Case
 *
 */
class PoliciesAndProcedureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.policies_and_procedure',
		'app.client',
		'app.user',
		'app.group',
		'app.policy',
		'app.other_policy',
		'app.risk_assessment_document',
		'app.business_associate_agreement',
		'app.disaster_recovery_plan',
		'app.other_contracts_and_document',
		'app.security_incident',
		'app.server_room_access',
		'app.ephi_recieved',
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
		$this->PoliciesAndProcedure = ClassRegistry::init('PoliciesAndProcedure');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PoliciesAndProcedure);

		parent::tearDown();
	}

}
