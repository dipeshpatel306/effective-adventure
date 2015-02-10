<?php
/**
 * PoliciesAndProceduresDocumentFixture
 *
 */
class PoliciesAndProceduresDocumentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'policies_and_procedure_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'document' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'policies_and_procedure_id' => 1,
			'client_id' => 1,
			'document' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-03-03 21:12:02',
			'modified' => '2013-03-03 21:12:02'
		),
	);

}
