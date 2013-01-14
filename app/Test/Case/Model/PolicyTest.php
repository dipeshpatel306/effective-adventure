<?php
App::uses('Policy', 'Model');

/**
 * Policy Test Case
 *
 */
class PolicyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.policy',
		'app.client',
		'app.user',
		'app.group',
		'app.document',
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
		$this->Policy = ClassRegistry::init('Policy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Policy);

		parent::tearDown();
	}

}
