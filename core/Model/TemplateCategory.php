<?php
App::uses('AppModel', 'Model');
/**
 * TemplateCategory Model
 *
 */
class TemplateCategory extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';

	public $hasMany = array(
        'Template' => array(
            'foreignKey' => 'category_id'
        )
    );  

}