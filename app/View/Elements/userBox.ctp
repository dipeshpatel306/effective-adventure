<div class="userBox"> 
	<?php 
	if($logged_in){

		echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) . '<br />';
		
		echo 'Welcome, ' . $this->Session->read('Auth.User.username') . '<br />';
		echo '<b>Client:</b> ' . $this->Session->read('Auth.User.Client.name') . ' / ' ; 
		echo '<b>Group:</b> ' . $this->Session->read('Auth.User.Group.name');
		
	} /*else {  // Not Needed?
		echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
	}*/
	
	?>
</div>