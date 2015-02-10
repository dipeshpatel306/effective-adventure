<?php
/**
 * EphiRecievedFixture
 *
 */
class EphiRecievedFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ephi_recieved';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 30, 'key' => 'primary'),
		'date_recieved' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'recieved_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'date_returned' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'date_recieved' => '2013-01-04 02:52:13',
			'description' => 'Lorem ipsum dolor sit amet',
			'recieved_by' => 'Lorem ipsum dolor sit amet',
			'date_returned' => '2013-01-04 02:52:13',
			'client_id' => 1,
			'created' => '2013-01-04 02:52:13',
			'modified' => '2013-01-04 02:52:13'
		),
	);

}
