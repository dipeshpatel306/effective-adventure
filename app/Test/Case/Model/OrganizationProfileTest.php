<?php
App::uses('OrganizationProfile', 'Model');

/**
 * OrganizationProfile Test Case
 *
 */
class OrganizationProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organization_profile',
		'app.client',
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
		$this->OrganizationProfile = ClassRegistry::init('OrganizationProfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrganizationProfile);

		parent::tearDown();
	}

}
