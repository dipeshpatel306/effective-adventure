<?php
App::uses('Dashboard', 'Model');

/**
 * Dashboard Test Case
 *
 */
class DashboardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dashboard'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dashboard = ClassRegistry::init('Dashboard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dashboard);

		parent::tearDown();
	}

}
