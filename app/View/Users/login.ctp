<div class='loginBox'>
<h2>Login</h2>

<?php
	echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
	echo $this->Form->input('User.email');
	echo $this->Form->input('User.password');
	echo $this->Html->link($this->Html->div('formLink', 'New User?'), 
		array('controller' => 'users', 'action' => 'new_user'), 
		array('escape' => false));
	echo $this->Form->end('Login');
?>
</div>