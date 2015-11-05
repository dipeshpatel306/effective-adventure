<div class='loginBox'>
<h2>Login</h2>

<!--<p class='important'>The site will be down for maintenance between 5:30 and 7:30 PM EST.</p>-->

<?php
	echo $this->Form->create('User');
	echo $this->Form->input('email', array('value' => $email));
	echo $this->Form->input('password');
	echo $this->Html->link($this->Html->tag('span', 'New User?'),
		array('controller' => 'Users', 'action' => 'register'),
		array('escape' => false)) .  ' | ';



	echo $this->Html->link($this->Html->tag('span', 'Forgot your password?'),
		array('controller' => 'Users', 'action' => 'forgot_password'), array('escape' => false));
	echo $this->Form->end('Login');
?>
</div>