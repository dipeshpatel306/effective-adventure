<?php
App::uses('AppController', 'Controller');
App::uses('Group', 'Model');
/**
 * EducationCenter Controller
 *
 * @property EducationCenter $EducationCenter
 */
class EducationCenterController extends AppController {

/**
 * isAuthorized Method
 * Allows Hippa Admin to Add, Edit, Delete Everything
 * Client Managers & MU MAnagers can only Add Edit Delete to their own group
 * Users cannot see
 * @return void
 */
 	public function isAuthorized($user){
 		$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		$acct = $this->Session->read('Auth.User.Client.account_type'); // Get account type 
		
		if ($group == Group::MANAGER && in_array($this->action, array('training', 'training_report', 'training_report_csv', 'index', 'video'))) {
		    return true;
        }
        
        if ($group == Group::USER && in_array($this->action, array('index', 'training', 'video'))) {
            return true;
        }
		
		if($acct == 'Initial'){
				$this->Session->setFlash('You are not authorized to view that!');
				$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
				return false;
		}		
		return parent::isAuthorized($user);
 	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}
/**
 * Learn Now method
 *
 * @return void
 */
/*	public function learn_now() {
		$this->EducationCenter->recursive = 0;
		$this->set('educationCenter', $this->paginate());
	}*/
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		$this->set('educationCenter', $this->EducationCenter->read(null, $id));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->request->data['EducationCenter']['video_link'] = trim($this->request->data['EducationCenter']['video_link']); // clean video name
			
			$this->EducationCenter->create();
			if ($this->EducationCenter->save($this->request->data)) {
				$this->Session->setFlash('The education center has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education center could not be saved. Please, try again.'));
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
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['EducationCenter']['video_link'] = trim($this->request->data['EducationCenter']['video_link']); // clean video name
			
			if ($this->EducationCenter->save($this->request->data)) {
				$this->Session->setFlash('The education center has been saved', 'default', array('class' => 'success message'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education center could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EducationCenter->read(null, $id);
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
		$this->EducationCenter->id = $id;
		if (!$this->EducationCenter->exists()) {
			throw new NotFoundException(__('Invalid education center'));
		}
		if ($this->EducationCenter->delete()) {
			$this->Session->setFlash(__('Education center deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Education center was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    public function training() {
        $group = $this->Session->read('Auth.User.group_id');
        $this->set(compact('group'));
    }
 
    public function training_report() {
        $client_id = $this->Session->read('Auth.User.client_id');
        $this->loadModel('Client');
        $client = $this->Client->find('first', array('conditions' => array('Client.id' => $client_id)));
		$moodle_ids = array();
		foreach ($client['User'] as $user) {
			$moodle_ids[] = "'n" . $user['id'] . "'";
		}
		$moodle_ids = implode(', ', $moodle_ids);
        $course_id = $client['Client']['moodle_course_id'];  
        $client_name = substr($client['Client']['name'], 0, 40); // mdl_user.institution is only 40 chars
        $this->set(compact('client_name'));
        
        $moodle = ConnectionManager::getDataSource('moodle');
        $sql = "SELECT mdl_user.firstname, mdl_user.lastname, mdl_quiz_grades.grade, mdl_quiz_grades.timemodified
                FROM mdl_user, mdl_quiz_grades WHERE mdl_quiz_grades.quiz IN 
                  (SELECT mdl_quiz.id FROM mdl_quiz WHERE mdl_quiz.course = :course_id) 
                AND mdl_quiz_grades.userid = mdl_user.id AND mdl_user.institution = :client_name 
                AND mdl_user.idnumber in ($moodle_ids)
                AND mdl_user.deleted = 0 ORDER BY mdl_user.lastname ASC";
        $rows = $moodle->fetchAll($sql, array(':course_id' => $course_id, ':client_name' => $client_name));
        $this->set(compact('rows'));
    }    

    public function video($video) {
        $this->set(compact('video'));
    }
}
