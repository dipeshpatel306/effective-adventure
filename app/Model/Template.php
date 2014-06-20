<?php
App::uses('AppModel', 'Model');
/**
 * Template Model
 *
 * @property Client $Client
 */
class Template extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';

/**
 * Upload Plugin Behavior
 */
    public $actsAs = array(
        'Upload.Upload' => array(
            'attachment' => array(
                'fields' => array(
                    'dir' => 'attachment_dir'
                ),

            )
        )
    );
/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'attachment' => array(
            'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            '1' => array(
                'rule' => array('isValidExtension', array('doc', 'docx', 'dot', 'dotx', 'pdf', 'xls', 'xlsx'), false),
                'message' => 'File type must be doc, docx, dot, dotx, pdf, xls, xlsx'
            ),
            '2' => array(
                'rule' => 'isUnderFormSizeLimit',
                'message' => 'File exceeds form upload filesize limit'
            ),
            '3' => array(
                'rule' => 'isCompletedUpload',
                'message' => 'File was not successfully uploaded'
            ),
        ),
    );

}
