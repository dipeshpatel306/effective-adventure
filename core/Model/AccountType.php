<?php
App::uses('AppModel', 'Model');


class AccountType extends AppModel {
    public $hasMany = 'Privilege';
}
