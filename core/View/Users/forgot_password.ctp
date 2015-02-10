<div class="forgetpwd loginBox">

<h2>Forget Your Password?</h2>

<p>
	Please enter the email address that you registered with.
</p>

<?php
	echo $this->Form->create('User', array('action' => 'forgot_password'));
	echo $this->Form->input('email',array('style'=>'float:left'));

	echo $this->Form->end('Submit');
?>
</div>



