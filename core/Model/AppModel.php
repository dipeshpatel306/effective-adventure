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
App::uses('HttpSocket', 'Network/Http');
App::uses('QuickBase', 'Vendor');
App::uses('S3', 'Vendor');

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
                    $this->$map_fn($val, $qb_rec, $field_name, $data);
                }
            }
        }
        return $data;
    }
    
    function mapQBAttachment($name, $qb_rec, $field_name, &$data) {
        $s3 = new S3(AWS_ACCESS_KEY, AWS_SECRET_KEY);
        $url = $s3->getAuthenticatedURL('hipaasecurenow', $this->qbDbid . '_' . $qb_rec[RECORD_ID], 3600);
        $socket = new HttpSocket();
        $response = $socket->get($url);
        $tmp_name = sys_get_temp_dir() . '/' . $name;
        file_put_contents($tmp_name, $response->body);
        $attachment = array(
            'name' => $name,
            'type' => $response->getHeader('Content-Type'),
            'tmp_name' => $tmp_name,
            'error' => 0,
            'size' => strlen($response->body)
        );
        $data[$field_name] = $attachment;
    }
    
    function mapQBDate($qb_date, $qb_rec, $field_name, &$data) {
        $timestamp = (((float) $qb_date) + 14400) / 1000;
        $date = gmdate("Y-m-d\TH:i:s\Z", $timestamp);
        $data[$field_name] = $date;
    }
    
    function mapQBPhone($qb_phone, $qb_rec, $field_name, &$data) {
        $parts = explode(' x', $qb_phone);
        $data[$field_name] = $parts[0];
        if (count($parts) > 1) {
            $data[$field_name . '_ext'] = $parts[1];
        }
    }
    
    function mapQBBool($qb_val, $qb_rec, $field_name, &$data) {
        $data[$field_name] = ($qb_val === '1') ? 'Yes' : 'No';
    }
    
    function qbConn() {
        return new QuickBase(Configure::read('QuickBase.user'), Configure::read('QuickBase.password'), true, $this->qbDbid, '', 'entegrationinc');
    }
    
    function newFromQB($rid, $qb_rec, $client_id=null) {
        $this->create();
        $data = $this->_mapQBFields($qb_rec);
        if ($client_id) {
            $data['client_id'] = $client_id;
        }
        $this->set($data);
        return $this->save(null, false);
    }
    
    function migrateFromQB($rid, $client_id=null) {
        $qdb = $this->qbConn();
        $clist = array_keys($this->qbFieldMap);
        array_push($clist, RECORD_ID);
        $qb_data = $qdb->do_query(array(array('fid' => '3', 'ev' => 'EX', 'cri' => $rid)), 0, 0, join('.', $clist));
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
        return $this->newFromQB($rid, $qb_rec, $client_id);
    }
    
    function migrateForQBClient($client_rid, $fid, $client_id) {
        $qdb = $this->qbConn();
        $qb_data = $qdb->do_query(array(array('fid' => $fid, 'ev' => 'EX', 'cri' => $client_rid)), 0, 0, '3');
        foreach ($qb_data->table->records->record as $rec) {
            $this->migrateFromQB((string) $rec->f[0], $client_id);
        }
    }
}
