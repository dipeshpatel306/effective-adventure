<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * ContactUs Controller
 *
 * @property ContactUs $ContactUs
 */
class ContactUsController extends AppController {

 public function beforeFilter(){
	parent::beforeFilter();
 	$this->Auth->authorize = array('controller');
 }

/**
 * isAuthorized Method
 * Allows Hipaa Admin to index, view and delete messages
 * Allows Managers and USers to Contact
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 

 		if ($group == 1){ // is admin allow all
 			return true;
 		}
		
		if ($group == 2){ //managers to send message
			
			if(in_array($this->action, array('contact'))){  // allow contact form
					return true;
			}
			
			if(in_array($this->action, array('add', 'edit', 'delete', 'index', 'view'))){
							
				$this->Session->setFlash('You are not authorized to view that!');  // Deny all other cases
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			}
			
		}
		
		if($group == 3){ // Deny users from viewing
			if(in_array($this->action, array('contact'))){  // allow contact form
				return true;
			}
			
			if(in_array($this->action, array('add', 'edit', 'delete', 'index', 'view'))){
											
				$this->Session->setFlash('You are not authorized to view that!');  // Deny all other cases
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
			}
		}
		
		return parent::isAuthorized($user);
 	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContactUs->recursive = 0;
		$this->set('contactUs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContactUs->id = $id;
		if (!$this->ContactUs->exists()) {
			throw new NotFoundException(__('Invalid contact us'));
		}
		$this->set('contactUs', $this->ContactUs->read(null, $id));
	}

/**
 * contact method
 *
 * @return void
 */
	public function contact() {  // TODO create template and test email
		/*$email = new CakeEmail();
		$email->config('default');
		$email->from(array('test@test.com' => 'testing'));
		$email->to('test@test.com');
		//$email->subject('');
		$email->send('Message Sent!');*/
		
		
		if ($this->request->is('post')) {
			$this->ContactUs->create();
			if ($this->ContactUs->save($this->request->data)) {
				$this->Session->setFlash(__('The contact us has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact us could not be saved. Please, try again.'));
			}
		}
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContactUs->create();
			if ($this->ContactUs->save($this->request->data)) {
				$this->Session->setFlash(__('The contact us has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact us could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ContactUs->id = $id;
		if (!$this->ContactUs->exists()) {
			throw new NotFoundException(__('Invalid contact us'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContactUs->save($this->request->data)) {
				$this->Session->setFlash(__('The contact us has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact us could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContactUs->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ContactUs->id = $id;
		if (!$this->ContactUs->exists()) {
			throw new NotFoundException(__('Invalid contact us'));
		}
		if ($this->ContactUs->delete()) {
			$this->Session->setFlash(__('Contact us deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact us was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}