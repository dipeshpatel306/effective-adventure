<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * ContactUs Controller
 *
 * @property ContactUs $ContactUs
 */
class ContactUsController extends AppController {

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
		$email = new CakeEmail();
		$email->config('default');
		$email->from(array('test@test.com' => 'testing'));
		$email->to('test@test.com');
		//$email->subject('');
		$email->send('Message Sent!');
		
		
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

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ContactUs->recursive = 0;
		$this->set('contactUs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->ContactUs->id = $id;
		if (!$this->ContactUs->exists()) {
			throw new NotFoundException(__('Invalid contact us'));
		}
		$this->set('contactUs', $this->ContactUs->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
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
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
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
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
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
