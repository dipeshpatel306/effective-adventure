<?php
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
            'Actions' => array('actionPath' => 'controllers/'),
            'Controller'
            ),
        ),
        'Session',
        'Security',
        'Cookie',
        'DebugKit.Toolbar',
        'RequestHandler'
    );
    public $helpers = array('Html', 'Form', 'Session', 'Csv');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->authenticate = array( // Use email as the login username
            'Form' => array(
            'fields' => array('username' => 'email', 'password' => 'password')
            ),
        );

        $this->Auth->authorize = array('controller');
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'dashboard', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        //$this->Auth->allow('display');
        // Login information
        $this->set('logged_in', $this->Auth->loggedIn());
        //$this->set('current_user', $this->Auth->user());

        $this->Security->blackHoleCallback = 'blackhole';
        // needed? without causing blackhole errors, likely because no data is required in some forms as per request which is a bad idea.
        $this->Security->csrfCheck = false;
        //$this->Auth->allow();
        
        if (Configure::read('LogRequests')) {
            $this->capture_request_head_for_log();
        }
		
		if (!$this->javascriptModule) {
			$moduleName = Inflector::underscore($this->name);
			$this->javascriptModule = $moduleName;
		}
    }

    public function blackhole($type) {
        debug($type);
    }
    public function isAuthorized($user){
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
        if (isset($group) && $group == 1){ // is admin allow all
            return true;
        }
        $this->Session->setFlash('You are not authorized to view that!');
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
    }
    
    public static function _randomStr($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $string = "";    
    
        for ($p = 0; $p < $length; $p++) {
             $string .= $characters[mt_rand(0, strlen($characters)-1)];
        }

        return $string; 
    }
    
    public function setReferer() {
        $this->Session->write('referer', $this->referer());
    }
    
    public function origReferer() {
        return $this->Session->read('referer');
    }
    
    /*
      Log some basic basic details of the HTTP Request:
      
      Started GET "/users/lost" for 127.0.0.1 at 2012-10-24 19:18:25 -0700
      Processing by UsersController#fullcalendar as JSON
        Parameters: {"foo"=>"bar", "user"=>"1352620800"}
      */
      private function capture_request_head_for_log() {
        $url = $this->request->here;
        $parameters = null;
        if(!empty($this->request->query)) {
          $params_for_params = array();
          $params_for_url = array();
          foreach($this->request->query as $key => $value) {
            if($key === 'url') { 
              continue;
            }
            $params_for_params[] = '"' . $key . '" => ' . $value . '"';
            $params_for_url[] = $key . '=' . $value;
          }
          
          if(!empty($params_for_url)) {
            $url .= '?' . implode("&", $params_for_url);
          }
          // log any post params
          $post_params = null;
          if($this->request->isPost()) {
            $post_params = "\n POST parameters: " . print_r($this->request->data, true);
          }
          $parameters = sprintf("\n Parameters: {%s}%s", implode(", ", $params_for_params), $post_params);
        }
        $client_ip = $this->request->clientIp();
        $time = date('Y-m-d H:i:s P', time());
        $controller = ucfirst($this->request->controller) . 'Controller';
        $action = $this->request->action;
        $content_type = $this->request->header('Accept');
        $processing_by = sprintf("\n Processing by %s#%s as %s", $controller, $action, $content_type);
        $msg = sprintf('Started %s "%s" for %s at %s%s%s', $this->request->method(), $url, $client_ip, $time,
          $processing_by, $parameters);
        Configure::write('current_start_request_time', microtime(true));
        CakeLog::write('request', "\n" . $msg);
      }

     private function log_request_tail() {
        $start = Configure::read('current_start_request_time');
        $end = microtime(true);
        $tail = "Completed";
        
        $statusCode = $this->response->statusCode(null);
        $statusDescription = $this->response->httpCodes($statusCode);
        if(is_array($statusDescription) && count($statusDescription) == 1) {
          $keys = array_keys($statusDescription);
          $vals = array_values($statusDescription);
          $tail .= " " . $keys[0] . ' ' . $vals[0];
        }
        $tail .= sprintf(" in %.2fms", ($end-$start) * 1000);
        CakeLog::write('request', "\n" . $tail . "\n\n");
     }

    public function beforeRedirect($url, $status=null, $exit=true) {
        parent::beforeRedirect($url, $status, $exit);
        if (Configure::read('LogRequests')) {
            $this->log_request_tail();
        }
    }
    
    public function afterFilter() {
        parent::afterFilter();
        if (Configure::read('LogRequests')) {
            $this->log_request_tail();  
        }
    }

	public function beforeRender() {
		$this->set(array('javascriptModule' => $this->javascriptModule));
	}
    
}

