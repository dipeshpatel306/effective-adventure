<?php
/**
 * SecurityIncidentFixture
 *
 */
class SecurityIncidentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 30, 'key' => 'primary'),
		'date_of_incident' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'discovery_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'reported_by' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description_of_incident' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'cause_of_incident' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'assets_involved' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'client_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 30),
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
			'date_of_incident' => '2013-01-04 02:19:26',
			'discovery_date' => '2013-01-04 02:19:26',
			'reported_by' => 'Lorem ipsum dolor sit amet',
			'description_of_incident' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'cause_of_incident' => 'Lorem ipsum dolor sit amet',
			'assets_involved' => 1,
			'created' => '2013-01-04 02:19:26',
			'modified' => '2013-01-04 02:19:26',
			'client_id' => 1
		),
	);

}
