<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
/**
 * TrainingReports Controller
 **/
class TrainingReportsController extends AppController {
/**
 * isAuthorized Method
 * @return void
 */
    public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');
		$client = $this->Session->read('Auth.User.client_id');
		
		if ($group == Group::ADMIN || $this->action === 'index') {
			return true;
		}
		
		if ($this->action === 'view') {
			$id = $this->request->params['pass'][0];
			return $this->TrainingReport->isOwnedBy($id, $client);
		}

		return parent::isAuthorized($user);
 	}

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $group = $this->Session->read('Auth.User.group_id'); 
		$client = $this->Session->read('Auth.User.client_id');

		if ($group == Group::ADMIN) {
			$this->TrainingReport->recursive = 0;
			$this->paginate = array('order' => array('client_id' => 'ASC'), 'limit' => 100);			
			$this->set('reports', $this->paginate());			
		} else {
			$this->paginate = array(
				'conditions' => array('client_id' => $client),
				'order' => array('course_name' => 'ASC'),
			);
			$this->set('reports', $this->paginate());
		}
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->TrainingReport->id = $id;
        if (!$this->TrainingReport->exists()) {
            throw new NotFoundException(__('Invalid Training Report'));
        }
		$meta = $this->TrainingReport->read();
		$this->set(compact('meta'));
		$rows = $this->TrainingReport->getRows();
        $this->set(compact('rows'));
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
        $this->TrainingReport->id = $id;
        if (!$this->TrainingReport->exists()) {
            throw new NotFoundException(__('Invalid training report'));
        }
        if ($this->TrainingReport->delete()) {
            $this->Session->setFlash(__('Training report deleted.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Training report was not deleted.'));
        $this->redirect(array('action' => 'index'));
    }

	public function load() {
		$clients = $this->TrainingReport->Client->find('all', array('fields' => array('Client.id', 'Client.moodle_course_id')));
		foreach ($clients as $client) {
			$course = $client['Client']['moodle_course_id'];
			$names = $this->TrainingReport->Client->getMoodleCourseNames($course);
			$this->TrainingReport->create();
			$this->TrainingReport->save(array(
				'client_id' => $client['Client']['id'],
				'course_id' => '28',
				'course_name' => $names['fullname'],
				'course_code' => $names['shortname']
			));
		}
	}

}