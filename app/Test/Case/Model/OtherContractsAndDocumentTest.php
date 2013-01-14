<?php
App::uses('OtherContractsAndDocument', 'Model');

/**
 * OtherContractsAndDocument Test Case
 *
 */
class OtherContractsAndDocumentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.other_contracts_and_document',
		'app.client',
		'app.user',
		'app.group',
		'app.policy',
		'app.other_policy',
		'app.risk_assessment_document',
		'app.business_associate_agreement',
		'app.security_incident',
		'app.server_room_access',
		'app.ephi_recieved',
		'app.ephi_removed',
		'app.sirt_team',
		'app.sirt_member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OtherContractsAndDocument = ClassRegistry::init('OtherContractsAndDocument');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OtherContractsAndDocument);

		parent::tearDown();
	}

}
