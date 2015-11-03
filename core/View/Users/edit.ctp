<?php
App::uses('Group', 'Model');

$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
if($group == Group::ADMIN){ // If admin allow creating another Hipaa administrator
	$groupOption = array(Group::USER => 'User', Group::MANAGER => 'Manager', Group::ADMIN => 'Administrator', Group::PARTNER_ADMIN => 'Partner Administrator');
	$userTypeName = 'User';
	$usersTypeName = 'Users';
} else {
	$groupOption = array(3 => 'Employee', 2 => 'Manager');
	$userTypeName = 'Employee';
	$usersTypeName = 'Employees';
}

if ($group != Group::PARTNER_ADMIN) {
	$this->Html->addCrumb($usersTypeName, '/users');
}
$this->Html->addCrumb('Edit ' . $userTypeName);



$active = array(true => 'Yes', false => 'No'); // activate / deactivate a user

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit ' . $userTypeName); ?></legend>
	<?php
		//echo $this->Form->input('User.authCode', array('label' => 'Authorization Code'));
		if($group == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		}

		if($group == 1 || $group == 2){ // activate / deactivate user
			echo $this->Form->input('group_id', array('options' => $groupOption, 'required' => false));
			$active_sel = ($this->request->data['User']['active'] ? '1' : '0');
			echo $this->Form->input('active', array('options' => $active, 'selected' => $active_sel));
		}

		//echo $this->Form->input('email', array('allowEmpty' => true));
		//echo $this->Form->input('email2', array('label' => 'Confirm Email'));
		echo $this->Form->input('password', array('label' => 'Password', 'value' => null, 'required' => false));
		echo $this->Form->input('password2', array('label' => 'Verify Password', 'value' => null, 'type' => 'password', 'required' => false));
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone_number', array('type' => 'tel'));
		echo $this->Form->input('cell_number', array('type' => 'tel'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if($group == Group::ADMIN || $group == Group::MANAGER): ?>
		<li><?php echo $this->Html->link(__('List ' . $usersTypeName), array('action' => 'index')); ?></li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => $userTypeName, 'id' => $this->Form->value('User.id'))); ?></li>

		<?php endif; ?>


	</ul>
</div>
