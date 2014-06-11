<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');
require_once(APP . 'Vendor' . DS . 'quickbase.php');
require_once(APP . 'Vendor' . DS . 'S3.php');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    function validates($options = array()) {
        // copy the data over from a custom var, otherwise
        $actionSet = 'validate' . Inflector::camelize(Router::getParam('action'));
        if (isset($this->validationSet)) {
            $temp = $this->validate;
            $param = 'validate' . $validationSet;
            $this->validate = $this->{$param};
        } elseif (isset($this->{$actionSet})) {
            $temp = $this->validate;
            $param = $actionSet;
            $this->validate = $this->{$param};
        } 
        
        $errors = $this->invalidFields($options);
    
        // copy it back
        if (isset($temp)) {
            $this->validate = $temp;
            unset($this->validationSet);
        }
        
        if (is_array($errors)) {
            return count($errors) === 0;
        }
        return $errors;
    }
    
    public $qbFieldMap = array();
    
    function _mapQBFields($qb_rec) {
        $data = array();
        foreach ($qb_rec as $fid=>$field) {
            if (array_key_exists($fid, $this->qbFieldMap)) {
                $map_info = $this->qbFieldMap[$fid];
                $field_name = $map_info[0];
                $map_fn = $map_info[1];
                $val = (string) $field;
                if ($map_fn === null) {
                    $data[$field_name] = $val;
                } else {
                    $data[$field_name] = $this->$map_fn($val, $qb_rec);
                }
            }
        }
        return $data;
    }
    
    function getQBS3AttachmentURL($rid, $qb_rec) {
        $s3 = new S3(AWS_ACCESS_KEY, AWS_SECRET_KEY);
        return $s3->getAuthenticatedURL('hipaasecurenow', $this->qbDbid . '_' . $rid, 3600);
    }
    
    function qbConn() {
        return new QuickBase(Configure::read('QuickBase.user'), Configure::read('QuickBase.password'), true, $this->qbDbid, '', 'entegrationinc');
    }
    
    function newFromQB($rid, $qb_rec, $client_id=null) {
        return;
    }
    
    function migrateFromQB($rid, $client_id=null) {
        $qdb = $this->qbConn();
        $qb_data = $qdb->do_query(array(array('fid' => '3', 'ev' => 'EX', 'cri' => $rid)));
        $rec = $qb_data->table->records->record[0];
        if (!isset($rec)) {
            $dbid = $this->qbDbid;
            throw NotFoundException('QB record not found for $rid in $dbid');
        }
        $qb_rec = array();
        foreach ($rec->f as $field) {
            $fid = (string) $field['id'];
            $qb_rec[$fid] = $field;
        }
        $this->newFromQB($rid, $qb_rec, $client_id);
    }
    
    function migrateForQBClient($client_rid, $fid, $client_id) {
        $qdb = $this->qbConn();
        $qb_data = $qdb->do_query(array(array('fid' => $fid, 'ev' => 'EX', 'cri' => $client_rid)), 0, 0, '3');
        debug($client_id);
        foreach ($qb_data->table->records->record as $rec) {
            $this->migrateFromQB((string) $rec->f[0], $client_id);
        }
    }
}
