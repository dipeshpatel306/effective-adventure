<?php
App::uses('DisasterRecoveryPlan', 'Model');

/**
 * DisasterRecoveryPlan Test Case
 *
 */
class DisasterRecoveryPlanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.disaster_recovery_plan',
		'app.client',
		'app.user',
		'app.group',
		'app.policy',
		'app.other_policy',
		'app.risk_assessment_document',
		'app.business_associate_agreement',
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
		$this->DisasterRecoveryPlan = ClassRegistry::init('DisasterRecoveryPlan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DisasterRecoveryPlan);

		parent::tearDown();
	}

}
