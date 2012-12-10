<div class="login"> 
	<?php 
	if($logged_in){

		echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) . '<br />';
		
		echo 'Welcome, ' . $this->Session->read('Auth.User.username') . '<br />';
		echo 'Client: ' . $this->Session->read('Auth.User.Client.name') . '<br />' ; 
		echo 'Group: ' . $this->Session->read('Auth.User.Group.name');
		
	} else {
		echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
	}
	
	?>
	

</div>
<!--<?php
$auth = $this->Session->read('Auth.User');
print "<pre>";
print_r($auth);
print "</pre>";

?>-->