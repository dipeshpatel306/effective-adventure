<?php
App::uses('PoliciesAndProcedures', 'Model');

/**
 * PoliciesAndProcedures Test Case
 *
 */
class PoliciesAndProceduresTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.policies_and_procedures',
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
		$this->PoliciesAndProcedures = ClassRegistry::init('PoliciesAndProcedures');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PoliciesAndProcedures);

		parent::tearDown();
	}

}
