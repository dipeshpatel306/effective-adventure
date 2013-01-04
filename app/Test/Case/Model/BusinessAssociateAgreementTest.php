<?php
App::uses('BusinessAssociateAgreement', 'Model');

/**
 * BusinessAssociateAgreement Test Case
 *
 */
class BusinessAssociateAgreementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.business_associate_agreement',
		'app.client',
		'app.user',
		'app.group',
		'app.post',
		'app.security_incident',
		'app.server_room_access',
		'app.ephi_recieved',
		'app.ephi_removed'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BusinessAssociateAgreement = ClassRegistry::init('BusinessAssociateAgreement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BusinessAssociateAgreement);

		parent::tearDown();
	}

}
