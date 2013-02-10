<?php
App::uses('OtherPoliciesAndProcedure', 'Model');

/**
 * OtherPoliciesAndProcedure Test Case
 *
 */
class OtherPoliciesAndProcedureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.other_policies_and_procedure',
		'app.client',
		'app.user',
		'app.group',
		'app.policies_and_procedure',
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
		$this->OtherPoliciesAndProcedure = ClassRegistry::init('OtherPoliciesAndProcedure');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OtherPoliciesAndProcedure);

		parent::tearDown();
	}

}
