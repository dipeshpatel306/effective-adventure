<?php
App::uses('ContactUs', 'Model');

/**
 * ContactUs Test Case
 *
 */
class ContactUsTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contact_us'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactUs = ClassRegistry::init('ContactUs');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactUs);

		parent::tearDown();
	}

}
