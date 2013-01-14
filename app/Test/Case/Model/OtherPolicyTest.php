<?php
App::uses('OtherPolicy', 'Model');

/**
 * OtherPolicy Test Case
 *
 */
class OtherPolicyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.other_policy',
		'app.client',
		'app.user',
		'app.group',
		'app.document',
		'app.policy',
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
		$this->OtherPolicy = ClassRegistry::init('OtherPolicy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OtherPolicy);

		parent::tearDown();
	}

}
