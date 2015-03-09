<?php
App::uses('AppModel', 'Model');
/**
 * PoliciesAndProcedure Model
 *
 * @property PoliciesAndProceduresDocument $PoliciesAndProceduresDocument
 */
class PoliciesAndProcedure extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'description' => array(
			// 'notempty' => array(
				// 'rule' => array('notempty'),
				// //'message' => 'Your custom message here',
				// //'allowEmpty' => false,
				// //'required' => false,
				// //'last' => false, // Stop validation after this rule
				// //'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		// ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PoliciesAndProceduresDocument' => array(
			'className' => 'PoliciesAndProceduresDocument',
			'foreignKey' => 'policies_and_procedure_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => 'PoliciesAndProceduresDocument.id, PoliciesAndProceduresDocument.policies_and_procedure_id, PoliciesAndProceduresDocument.client_id, PoliciesAndProceduresDocument.attachment, PoliciesAndProceduresDocument.attachment_dir, PoliciesAndProceduresDocument.created, PoliciesAndProceduresDocument.modified',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
