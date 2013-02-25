<?php
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb('Add User');

$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?  
if($group == 1){ // If admin allow creating another Hipaa administrator
	$groupOption = array(4 => 'Pending', 3 => 'User', 2 => 'Manager', 1 => 'HIPAA Administrator');	
} else {
	$groupOption = array(4 => 'Pending', 3 => 'User', 2 => 'Manager');
}

$client = $this->Session->read('Auth.User.client_id');  // Test Client.  If admin allow client choosing, else hide field and set it to the current client

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		//echo $this->Form->input('User.authCode', array('label' => 'Authorization Code'));
		
		echo $this->Form->input('group_id', array('options' => $groupOption, 'default' => 4));	

		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

		echo $this->Form->input('email');
		echo $this->Form->input('email2', array('label' => 'Confirm Email'));		
		echo $this->Form->input('password');
		echo $this->Form->input('password2', array('label' => 'Verify Password', 'type' => 'password'));		
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('cell_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>

	</ul>
</div>
