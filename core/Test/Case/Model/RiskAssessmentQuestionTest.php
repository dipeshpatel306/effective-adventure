<?php
App::uses('RiskAssessmentQuestion', 'Model');

/**
 * RiskAssessmentQuestion Test Case
 *
 */
class RiskAssessmentQuestionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.risk_assessment_question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RiskAssessmentQuestion = ClassRegistry::init('RiskAssessmentQuestion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RiskAssessmentQuestion);

		parent::tearDown();
	}

}
