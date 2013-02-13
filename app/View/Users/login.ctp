<div class='loginBox'>
<h2>Login</h2>

<?php
	echo $this->Form->create('User');
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Html->link($this->Html->div('formLink', 'New User?'), 
		array('controller' => 'users', 'action' => 'new_user'), 
		array('escape' => false));
	echo $this->Form->end('Login');
?>
</div>