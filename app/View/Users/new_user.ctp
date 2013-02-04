<div class='loginBox'>
<h2>New User</h2>

<?php
	echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'new_user')));
	echo $this->Form->input('email');	
	echo $this->Form->input('User.username');
	echo $this->Form->input('User.password');
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('User.authCode', array('label' => 'Authorization Code'));
	echo $this->Form->end('Login');
?>
</div>