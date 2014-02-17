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
 }

/**
 * isAuthorized Method
 * Allows Hipaa Admin to index, view and delete messages
 * Allows Managers and USers to Contact
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		//$client = $this->Session->read('Auth.User.client_id');  // Test Client. 
		
		if ($group ==  2 || $group == 3){ //managers to send message
			
			if(in_array($this->action, array('contact'))){  // allow contact form
					return true;
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
		
		if ($this->request->is('post')) {
			$this->ContactUs->create();
			if ($this->ContactUs->save($this->request->data)) {
				// Send Email
				$data = $this->request->data['ContactUs'];
				$email = new CakeEmail('hipaaMail');
				$email->subject('HIPAA Compliance Portal - Contact Form Submission - ' . $data['subject'])
                    ->to(Configure::read('App.adminEmailTo'))
                    ->template('contact')
                    ->viewVars($data)
                    ->emailFormat('text')
                    ->send();

				$this->Session->setFlash('Your message has been sent! Someone will get back to you shortly.', 'default', array('class' => 'success message'));
				$this->redirect(array('controller' => 'dashboard','action' => 'index'));
			} else {
				$this->Session->setFlash(__('Message could not be sent. Please, try again.'));
			}
		}
	}


/**
 * add method
 *
 * @return void
 */
/*	public function add() {
		if ($this->request->is('post')) {
			$this->ContactUs->create();
			if ($this->ContactUs->save($this->request->data)) {
				$this->Session->setFlash(__('The contact us has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact us could not be saved. Please, try again.'));
			}
		}
	}*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function edit($id = null) {
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
	}*/

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