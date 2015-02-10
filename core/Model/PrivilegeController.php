<?php
App::uses('AppModel', 'Model');


class Privilege extends AppModel {
    public $belongsTo = 'AccountType';
} 
