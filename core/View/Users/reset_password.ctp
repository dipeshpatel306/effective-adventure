<div class="forgetpwd loginBox">

<h2>Reset your password</h2>
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
<?php
echo $this->Form->create('User');

echo $this->Form->input('password');
echo $this->Form->input('password2', array('label' => 'Verify Password', 'type' => 'password'));
echo $this->Form->end('Submit');

?>
</div>