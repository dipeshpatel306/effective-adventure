#!/usr/bin/php -q
<?php
/**
 * Command-line code generation utility to automate programmer chores.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Console
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$ds = DIRECTORY_SEPARATOR;
$dispatcher = 'Cake' . $ds . 'Console' . $ds . 'ShellDispatcher.php';

// hacking here to make cake console work after changing app directory stucture - DGF
define('APP_BRAND', 'bsn');
define('APP_CORE_PATH', dirname(dirname(dirname(dirname(__FILE__)))) . $ds . 'core' . $ds);

echo APP_CORE_PATH;
if (function_exists('ini_set')) {
	ini_set('include_path', APP_CORE_PATH . ini_get('include_path'));
}

if (!include ($dispatcher)) {
	trigger_error('Could not locate CakePHP core files.', E_USER_ERROR);
}
unset($paths, $path, $dispatcher, $root, $ds);

return ShellDispatcher::run($argv);
