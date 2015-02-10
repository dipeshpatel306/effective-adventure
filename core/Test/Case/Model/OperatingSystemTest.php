<?php
App::uses('OperatingSystem', 'Model');

/**
 * OperatingSystem Test Case
 *
 */
class OperatingSystemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.operating_system',
		'app.organization_profile',
		'app.client',
		'app.partner',
		'app.risk_assessment',
		'app.user',
		'app.group',
		'app.policies_and_procedures_document',
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
		'app.sirt_member',
		'app.operating_systems_organization_profile'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OperatingSystem = ClassRegistry::init('OperatingSystem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OperatingSystem);

		parent::tearDown();
	}

}
