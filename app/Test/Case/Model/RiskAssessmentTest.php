<?php
App::uses('RiskAssessment', 'Model');

/**
 * RiskAssessment Test Case
 *
 */
class RiskAssessmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.risk_assessment',
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
		'app.sirt_member',
		'app.ra_answer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RiskAssessment = ClassRegistry::init('RiskAssessment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RiskAssessment);

		parent::tearDown();
	}

}
