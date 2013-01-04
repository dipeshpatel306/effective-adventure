<?php
/**
 * EphiRemovedFixture
 *
 */
class EphiRemovedFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ephi_removed';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 30, 'key' => 'primary'),
		'date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'removed_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'returned_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 30),
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
			'date' => '2013-01-04 02:54:50',
			'description' => 'Lorem ipsum dolor sit amet',
			'removed_by' => 'Lorem ipsum dolor sit amet',
			'returned_by' => 'Lorem ipsum dolor sit amet',
			'client_id' => 1,
			'created' => '2013-01-04 02:54:50',
			'modified' => '2013-01-04 02:54:50'
		),
	);

}
