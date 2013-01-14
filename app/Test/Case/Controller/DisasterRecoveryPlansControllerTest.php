<?php
App::uses('DisasterRecoveryPlansController', 'Controller');

/**
 * DisasterRecoveryPlansController Test Case
 *
 */
class DisasterRecoveryPlansControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.disaster_recovery_plan',
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
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}
