<h2 class="hightitle"><?php __('Forgot Password'); ?></h2>
<div class="forgetpwd form">
<?php //echo $this->Form->create('User', array('action' => 'reset')); ?>
 
<?php
	if(isset($errors)){
		echo '<div class="error">';
		echo "<ul>";
		foreach($errors as $error){
 		echo"<li><div class='error-message'>$error</div></li>";
	}
		echo"</ul>";
		echo'</div>';
	}
?>
 
<form method="post">
<?php
echo $this->Form->input('password',array("type"=>"password","name"=>"data[User][password]"));
echo $this->Form->input('password_confirm',array("type"=>"password","name"=>"data[User][password_confirm]"));
?>
<input type="submit"/>
 
<?php //echo $this->Form->end();?>
</form>
</div>