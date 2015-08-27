<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb('Edit User');

$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
if($group == Group::ADMIN){ // If admin allow creating another Hipaa administrator
	$groupOption = array(Group::USER => 'User', Group::MANAGER => 'Manager', Group::ADMIN => 'Administrator', Group::PARTNER_ADMIN => 'Partner Administrator');
} else {
	$groupOption = array(Group::USER => 'User', Group::MANAGER => 'Manager');
}

$active = array(true => 'Yes', false => 'No');  // activate / deactivate a user

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
		if($group == Group::ADMIN){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

		if($group == Group::ADMIN || $group == Group::MANAGER){ // activate / deactivate user
			echo $this->Form->input('group_id', array('options' => $groupOption));
			$active_sel = ($this->request->data['User']['active'] ? '1' : '0');
			echo $this->Form->input('active', array('options' => $active, 'selected' => $active_sel));
		}
		//echo $this->Form->input('email');
		//echo $this->Form->input('email', array('allowEmpty' => true));
		//echo $this->Form->input('email2', array('type' => 'hidden'));
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
		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'User', 'id' => $this->Form->value('User.id'))); ?></li>

		<?php endif; ?>


	</ul>
</div>
