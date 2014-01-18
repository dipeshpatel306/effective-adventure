<?php
/**
  * @author Dan Felicetta
  * 
  * HIPAA Compliance Portal authentication plugin
  *
  */
  
if (!defined('MOODLE_INTERNAL'))	{
	die('Direct access to this script is forbidden.'); /// It must be included from a Moodle page
}

require_once($CFG->libdir.'/authlib.php');
require_once($CFG->dirroot.'/auth/db/auth.php');

/**
 * HIPAA Compliance Portal authentication plugin
 */
class auth_plugin_hcp extends auth_plugin_db	{
	
    function auth_plugin_hcp() {
        $this->authtype = 'db';
        $this->config = get_config('auth/hcp');
        if (empty($this->config->extencoding)) {
            $this->config->extencoding = 'utf-8';
        }
    }
    
	function loginpage_hook()	{        
	    global $frm;
        global $user;
        
        if (isset($_COOKIE['hipaa']['hipaa_training_user']) && isset($_COOKIE['hipaa']['hipaa_training_token']))	{
            echo 'HERE2';
		    $_POST['username'] = $_COOKIE['hipaa']['hipaa_training_user'];
			$_POST['password'] = $_COOKIE['hipaa']['hipaa_training_token'];
		}
	}
	
	function user_login($username, $password)	{
        if (!isset($username) || !isset($password)) {
            return false;
        }
        
        echo $this->config->host;
        echo $this->config->user;
        echo $this->config->pass;
	    $authdb = $this->db_init();
        
        $textlib = textlib_get_instance();
        $extusername = $textlib->convert(stripslashes($username), 'utf-8', $this->config->extencoding);
        $extpassword = $textlib->convert(stripslashes($password), 'utf-8', $this->config->extencoding);
        
        $rs = $authdb->Execute("SELECT * FROM {$this->config->table} 
                                WHERE {$this->config->fielduser} = '".$this->ext_addslashes($extusername)."' 
                                AND moodle_token = '".$this->ext_addslashes($extpassword)."' ");
        
        if (!$rs) {
            $authdb->Close();
            print_error('auth_dbcantconnect','auth');
            return false;
        }
        
        if ( !$rs->EOF ) {
            $rs->Close();
            $authdb->Close();
            return true;
        }
        
	}
	
    /**
     * Processes and stores configuration data for this authentication plugin.
     */
    function process_config($config) {
        // set to defaults if undefined
        if (!isset($config->host)) {
            $config->host = 'localhost';
        }
        if (!isset($config->type)) {
            $config->type = 'mysql';
        }
        if (!isset($config->sybasequoting)) {
            $config->sybasequoting = 0;
        }
        if (!isset($config->name)) {
            $config->name = '';
        }
        if (!isset($config->user)) {
            $config->user = '';
        }
        if (!isset($config->pass)) {
            $config->pass = '';
        }
        if (!isset($config->table)) {
            $config->table = '';
        }
        if (!isset($config->fielduser)) {
            $config->fielduser = '';
        }
        if (!isset($config->fieldpass)) {
            $config->fieldpass = '';
        }
        if (!isset($config->passtype)) {
            $config->passtype = 'plaintext';
        }
        if (!isset($config->extencoding)) {
            $config->extencoding = 'utf-8';
        }
        if (!isset($config->setupsql)) {
            $config->setupsql = '';
        }
        if (!isset($config->debugauthdb)) {
            $config->debugauthdb = 0;
        }
        if (!isset($config->removeuser)) {
            $config->removeuser = 0;
        }
        if (!isset($config->changepasswordurl)) {
            $config->changepasswordurl = '';
        }

        $config = stripslashes_recursive($config);
        // save settings
        set_config('host',          $config->host,          'auth/hcp');
        set_config('type',          $config->type,          'auth/hcp');
        set_config('sybasequoting', $config->sybasequoting, 'auth/hcp');
        set_config('name',          $config->name,          'auth/hcp');
        set_config('user',          $config->user,          'auth/hcp');
        set_config('pass',          $config->pass,          'auth/hcp');
        set_config('table',         $config->table,         'auth/hcp');
        set_config('fielduser',     $config->fielduser,     'auth/hcp');
        set_config('fieldpass',     $config->fieldpass,     'auth/hcp');
        set_config('passtype',      $config->passtype,      'auth/hcp');
        set_config('extencoding',   trim($config->extencoding), 'auth/hcp');
        set_config('setupsql',      trim($config->setupsql),'auth/hcp');
        set_config('debugauthdb',   $config->debugauthdb,   'auth/hcp');
        set_config('removeuser',    $config->removeuser,    'auth/hcp');
        set_config('changepasswordurl', trim($config->changepasswordurl), 'auth/hcp');

        return true;
    }
    
	function get_title()	{
		return 'hcp';
	}
}
?>