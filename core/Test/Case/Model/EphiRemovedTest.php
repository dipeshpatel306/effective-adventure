<?php
App::uses('EphiRemoved', 'Model');

/**
 * EphiRemoved Test Case
 *
 */
class EphiRemovedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ephi_removed',
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
		$this->EphiRemoved = ClassRegistry::init('EphiRemoved');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EphiRemoved);

		parent::tearDown();
	}

}
