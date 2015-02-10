<?php
App::uses('EphiReceived', 'Model');

/**
 * EphiReceived Test Case
 *
 */
class EphiReceivedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ephi_received',
		'app.client',
		'app.user',
		'app.group',
		'app.post',
		'app.security_incident',
		'app.server_room_access'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EphiReceived = ClassRegistry::init('EphiReceived');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EphiReceived);

		parent::tearDown();
	}

}
