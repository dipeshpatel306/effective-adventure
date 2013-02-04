<?php 
	// If Admin load Admin Tools
	if(($this->Session->read('Auth.User.group_id') == 1)){
		echo '<b>Administrator Tools: </b>';
		echo $this->Html->link('Clients', array('controller' => 'clients', 'action' => 'index')) . ' / ';
		echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' / ';
		echo $this->Html->link('Risk Assessments', array('controller' => 'riskassessments'));
		//echo $this->Html->link('Modules', array('controller' => 'modules', 'action' => 'index'));
		
	}
?>