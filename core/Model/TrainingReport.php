<?php
App::uses('AppModel', 'Model');
/**
 * TrainingReport Model
 *
 */
class TrainingReport extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'course_name';

	public $belongsTo = array(
        'Client' => array(
            'foreignKey' => 'client_id'
        )
    );
	
	public function isOwnedBy($id, $client) {
		return $this->field('id', array('id' => $id, 'client_id' => $client)) === $id;
	}
	
	public function getRows() {
		$data = $this->read();
		$client = $this->Client->find('first', array('fields' => array('Client.id', 'Client.name'), 'conditions' => array('Client.id' => $data['TrainingReport']['client_id'])));
		$moodle_ids = array();
		$users = $this->Client->User->find('all', array('fields' => array('User.id', 'Client.name'), 'conditions' => array('Client.id' => $client['Client']['id'])));
		foreach ($users as $user) {
			$moodle_ids[] = "'n" . $user['User']['id'] . "'";
		}
		$moodle_ids = implode(', ', $moodle_ids);
        $client_name_trunc = substr($client['Client']['name'], 0, 40); // mdl_user.institution is only 40 chars 
        $moodle = ConnectionManager::getDataSource('moodle');
        $sql = "SELECT mdl_user.firstname, mdl_user.lastname, mdl_quiz_grades.grade, mdl_quiz_grades.timemodified
                FROM mdl_user, mdl_quiz_grades WHERE mdl_quiz_grades.quiz IN 
                  (SELECT mdl_quiz.id FROM mdl_quiz WHERE mdl_quiz.course = :course_id) 
                AND mdl_quiz_grades.userid = mdl_user.id AND mdl_user.institution = :client_name 
                AND mdl_user.idnumber in ($moodle_ids)
                AND mdl_user.deleted = 0 ORDER BY mdl_user.lastname ASC";
        $rows = $moodle->fetchAll($sql, array(':course_id' => $data['TrainingReport']['course_id'], ':client_name' => $client_name_trunc));
		
		$new_rows_by_name = array();
		foreach ($rows as $row) {
			$name = $row['mdl_user']['lastname'].','.$row['mdl_user']['firstname'];
			$new_rows_by_name[$name] = null;
		}
		
		$old_sql = "SELECT mdl_user.firstname, mdl_user.lastname, mdl_quiz_grades.grade, mdl_quiz_grades.timemodified
                   FROM mdl_user, mdl_quiz_grades WHERE mdl_quiz_grades.quiz IN 
                   (SELECT mdl_quiz.id FROM mdl_quiz WHERE mdl_quiz.course = :course_id) 
                   AND mdl_quiz_grades.userid = mdl_user.id AND mdl_user.institution = :client_name 
                   AND mdl_user.deleted = 0 ORDER BY mdl_user.lastname ASC";
		$old_rows = $moodle->fetchAll($old_sql, array(':course_id' => $data['TrainingReport']['course_id'], ':client_name' => $client_name_trunc));
		
		foreach ($old_rows as $row) {
			$name = $row['mdl_user']['lastname'].','.$row['mdl_user']['firstname']; 
			if (!array_key_exists($name, $new_rows_by_name)) {
				$rows[] = $row;
			}
		}
		
		function cmp($a, $b) {
			return strcmp($a['mdl_user']['lastname'], $b['mdl_user']['lastnmae']);
		}
		
		uksort($rows, 'cmp');
		
		return $rows;
	}

}
