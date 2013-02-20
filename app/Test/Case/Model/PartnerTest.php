<?php
App::uses('Partner', 'Model');

/**
 * Partner Test Case
 *
 */
class PartnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.partner',
		'app.client',
		'app.organizational_profile',
		'app.risk_assessment',
		'app.user',
		'app.group',
		'app.policies_and_procedure',
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
		$this->Partner = ClassRegistry::init('Partner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Partner);

		parent::tearDown();
	}

}
