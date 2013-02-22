<div class="userBox"> 
	<?php 
		echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) . '<br />';
		
		echo 'Welcome back, ' . ucfirst($this->Session->read('Auth.User.first_name')) . '<br />';
		echo '<b>Client:</b> ' . ucfirst($this->Session->read('Auth.User.Client.name')) . ' | ' ; 
		echo '<b>Group:</b> ' . ucfirst($this->Session->read('Auth.User.Group.name')) . '<br />';
		echo '<b>Account:</b> ' . ucfirst($this->Session->read('Auth.User.Client.account_type')) . '<br />';
		
		//echo $this->element('admin_nav');
	?>

</div>