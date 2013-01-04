<?php
App::uses('SirtMember', 'Model');

/**
 * SirtMember Test Case
 *
 */
class SirtMemberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sirt_member',
		'app.sirt_team',
		'app.client',
		'app.user',
		'app.group',
		'app.post',
		'app.business_associate_agreement',
		'app.security_incident',
		'app.server_room_access',
		'app.ephi_recieved',
		'app.ephi_removed'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SirtMember = ClassRegistry::init('SirtMember');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SirtMember);

		parent::tearDown();
	}

}
