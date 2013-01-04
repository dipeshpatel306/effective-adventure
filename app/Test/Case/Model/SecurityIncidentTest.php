<?php
App::uses('SecurityIncident', 'Model');

/**
 * SecurityIncident Test Case
 *
 */
class SecurityIncidentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.security_incident',
		'app.client',
		'app.user',
		'app.group',
		'app.post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SecurityIncident = ClassRegistry::init('SecurityIncident');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SecurityIncident);

		parent::tearDown();
	}

}
