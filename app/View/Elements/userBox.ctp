<div class="userBox">
	<?php
		echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'logoutLink')) . '<br />';

		echo 'Welcome back, ' . ucfirst($this->Session->read('Auth.User.first_name')) . '<br />';
		echo 'Client: <span class="highlight">' . ucfirst($this->Session->read('Auth.User.Client.name')) . '</span> | ' ;

		$groupName = ucfirst($this->Session->read('Auth.User.Group.name'));

		if($groupName == 'Users'){
			$groupName = 'Employee';
		}

		echo 'Group: <span class="highlight">' . $groupName . '</span><br />';

		$acctDisplay = $this->Session->read('Auth.User.Client.account_type');
		if(!empty($acctDisplay)){
			echo 'Account: <span class="highlight">' . ucfirst($this->Session->read('Auth.User.Client.account_type')) . '</span><br />';
		}

	?>
</div>