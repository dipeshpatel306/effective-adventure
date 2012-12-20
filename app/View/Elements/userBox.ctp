<div class="userBox"> 
	<?php 
		echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) . '<br />';
		
		echo 'Welcome, ' . $this->Session->read('Auth.User.username') . '<br />';
		echo '<b>Client:</b> ' . $this->Session->read('Auth.User.Client.name') . ' / ' ; 
		echo '<b>Group:</b> ' . $this->Session->read('Auth.User.Group.name') . '<br />';
		
		echo $this->element('admin_nav');
	?>

</div>