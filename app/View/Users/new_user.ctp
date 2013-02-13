<div class='loginBox'>
<h2>Create Account</h2>

<?php
	echo $this->Form->create('User');
	echo $this->Form->input('authCode', array('label' => 'Authorization Code'));
	echo $this->Form->input('email');	
	echo $this->Form->input('password');
	echo $this->Form->input('password2', array('label' => 'Verify Password', 'type' => 'password'));
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('phone_number');
	echo $this->Form->input('cell_number');
	echo $this->Form->end('Create Account');
?>
</div>