<?php
App::uses('EducationCenter', 'Model');

/**
 * EducationCenter Test Case
 *
 */
class EducationCenterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.education_center'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EducationCenter = ClassRegistry::init('EducationCenter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EducationCenter);

		parent::tearDown();
	}

}
