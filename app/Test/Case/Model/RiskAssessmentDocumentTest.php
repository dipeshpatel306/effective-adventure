<?php
App::uses('RiskAssessmentDocument', 'Model');

/**
 * RiskAssessmentDocument Test Case
 *
 */
class RiskAssessmentDocumentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.risk_assessment_document',
		'app.client',
		'app.user',
		'app.group',
		'app.document',
		'app.policy',
		'app.other_policy',
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
		$this->RiskAssessmentDocument = ClassRegistry::init('RiskAssessmentDocument');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RiskAssessmentDocument);

		parent::tearDown();
	}

}
