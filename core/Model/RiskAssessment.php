<?php
App::uses('AppModel', 'Model');
App::import('Vendor', 'constants');
/**
 * RiskAssessment Model
 *
 * @property Client $Client
 */
class RiskAssessment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'client_id';
    
    public $qbDbid = RA_ANSWERS_DBID;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'client_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    function migrateForQBClient($client_rid, $fid, $client_id) {
        $qdb = $this->qbConn();
        $qb_data = $qdb->do_query(array(array('fid' => $fid, 'ev' => 'EX', 'cri' => $client_rid)), 0, 0, '9.7');   
        $data = array('client_id' => $client_id);
        foreach ($qb_data->table->records->record as $qrec) {
            $qnum = (string) $qrec->f[0];
            $data['question_' . $qnum] = (string) $qrec->f[1];
        }
        $this->create();
        $this->set($data);
        $this->save(null, false);
    }
}
