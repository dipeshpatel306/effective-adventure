<?php
App::uses('Group', 'Model');

$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
if ($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){ // If admin allow creating another Hipaa administrator
	$userTypeName = 'User';
	$usersTypeName = 'Users';
	if ($group == Group::ADMIN) {
		$groupOption = array(Group::USER => 'User', Group::MANAGER => 'Manager', Group::ADMIN => 'Administrator', Group::PARTNER_ADMIN => 'Partner Administrator');
	} else {
		$groupOption = array(Group::USER => 'User', Group::MANAGER => 'Manager');	
	}
} else {
	$userTypeName = 'Employee';
	$usersTypeName = 'Employees';
    $groupOption = array(Group::USER => 'Employee', Group::MANAGER => 'Manager');
}

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb($usersTypeName);
} else {
	$this->Html->addCrumb($usersTypeName, '/users');
}
$this->Html->addCrumb('Add ' . $userTypeName);

$active = array(true => 'Yes', false => 'No');  // activate / deactivate a user

$client = $this->Session->read('Auth.User.client_id');  // Test Client.  If admin allow client choosing, else hide field and set it to the current client

    if(isset($clientId)){
        $selected = $clientId;
    } else{
        $selected = '';
        $clientId = '';
    }

// Conditionally load buttons based upon user role
$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add ' . $userTypeName); ?></legend>
    <?php
        //echo $this->Form->input('User.authCode', array('label' => 'Authorization Code'));

        if ($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){  // if admin allow to choose
            echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
        } else {
            echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
        }

        if ($group == Group::ADMIN || $group == Group::PARTNER_ADMIN || $group == Group::MANAGER){ // activate / deactivate user
        echo $this->Form->input('group_id', array('options' => $groupOption, 'default' => 4));
            echo $this->Form->input('active', array('options' => $active));
        }

        echo $this->Form->input('email');
        echo $this->Form->input('email2', array('label' => 'Confirm Email'));
        echo $this->Form->input('password');
        echo $this->Form->input('password2', array('label' => 'Verify Password', 'type' => 'password'));
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
    	<?php if ($group == Group::PARTNER_ADMIN): ?>
    	<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $clientId)); ?></li>
    	<?php else: ?>
        <li><?php echo $this->Html->link(__('List ' . $usersTypeName), array('action' => 'index')); ?></li>
        <?php endif; ?>
    </ul>
</div>
