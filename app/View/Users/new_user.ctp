<div class='loginBox'>
<h2>Login</h2>

<?php
	echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'new_user')));
	echo $this->Form->input('User.username');
	echo $this->Form->input('User.password');
	echo $this->Form->input('User.authCode', array('label' => 'Authorization Code'));
	echo $this->Form->end('Login');
?>
</div>