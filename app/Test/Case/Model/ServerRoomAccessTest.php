<?php
App::uses('ServerRoomAccess', 'Model');

/**
 * ServerRoomAccess Test Case
 *
 */
class ServerRoomAccessTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.server_room_access',
		'app.client',
		'app.user',
		'app.group',
		'app.post',
		'app.security_incident'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ServerRoomAccess = ClassRegistry::init('ServerRoomAccess');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ServerRoomAccess);

		parent::tearDown();
	}

}
