<?php
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb('Edit User');

$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
if($group == 1){ // If admin allow creating another Hipaa administrator
	$groupOption = array(3 => 'User', 2 => 'Manager', 1 => 'HIPAA Administrator');
} else {
	$groupOption = array(3 => 'User', 2 => 'Manager');
}

$active = array('Yes' => 'Yes', 'No' => 'No');  // activate / deactivate a user

$client = $this->Session->read('Auth.User.client_id');  // Test Client.  If admin allow client choosing, else hide field and set it to the current client

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		//echo $this->Form->input('User.authCode', array('label' => 'Authorization Code'));
		if($group == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

		if($group == 1 || $group == 2){ // activate / deactivate user
			echo $this->Form->input('group_id', array('options' => $groupOption));
			echo $this->Form->input('active', array('options' => $active, 'default' => 1));
		}
		echo $this->Form->input('email');
		//echo $this->Form->input('email', array('allowEmpty' => true));
		echo $this->Form->input('email2', array('type' => 'hidden'));
		//echo $this->Form->input('password');
		//echo $this->Form->input('password2', array('label' => 'Verify Password', 'type' => 'password', 'allowEmpty' => true));
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
		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>

		<?php endif; ?>


	</ul>
</div>
