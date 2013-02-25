<div class="userBox"> 
	<?php 
		echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'logoutLink')) . '<br />';
		
		echo 'Welcome back, ' . ucfirst($this->Session->read('Auth.User.first_name')) . '<br />';
		echo 'Client: <span class="highlight">' . ucfirst($this->Session->read('Auth.User.Client.name')) . '</span> | ' ; 
		echo 'Group: <span class="highlight">' . ucfirst($this->Session->read('Auth.User.Group.name')) . '</span><br />';
		
		$acctDisplay = $this->Session->read('Auth.User.Client.account_type');
		if(!empty($acctDisplay)){
			echo 'Account: <span class="highlight">' . ucfirst($this->Session->read('Auth.User.Client.account_type')) . '</span><br />';
		}

	?>

</div>