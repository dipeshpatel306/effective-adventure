<?php
App::uses('EphiRecieved', 'Model');

/**
 * EphiRecieved Test Case
 *
 */
class EphiRecievedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ephi_recieved',
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
		$this->EphiRecieved = ClassRegistry::init('EphiRecieved');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EphiRecieved);

		parent::tearDown();
	}

}
