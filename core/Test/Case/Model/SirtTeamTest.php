<?php
App::uses('SirtTeam', 'Model');

/**
 * SirtTeam Test Case
 *
 */
class SirtTeamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sirt_team',
		'app.client',
		'app.user',
		'app.group',
		'app.post',
		'app.business_associate_agreement',
		'app.security_incident',
		'app.server_room_access',
		'app.ephi_recieved',
		'app.ephi_removed',
		'app.sirt_member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SirtTeam = ClassRegistry::init('SirtTeam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SirtTeam);

		parent::tearDown();
	}

}
