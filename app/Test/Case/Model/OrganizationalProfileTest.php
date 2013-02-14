<?php
App::uses('OrganizationalProfile', 'Model');

/**
 * OrganizationalProfile Test Case
 *
 */
class OrganizationalProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organizational_profile',
		'app.client',
		'app.organizationa_profile',
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
		$this->OrganizationalProfile = ClassRegistry::init('OrganizationalProfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrganizationalProfile);

		parent::tearDown();
	}

}
