<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb('Add User');

$group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
if ($group == Group::ADMIN){ // If admin allow creating another Hipaa administrator
    $groupOption = array(Group::USER => 'User', Group::MANAGER => 'Manager', Group::ADMIN => 'HIPAA Administrator');
} else {
    $groupOption = array(Group::USER => 'User', Group::MANAGER => 'Manager');
}

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
        <legend><?php echo __('Add User'); ?></legend>
    <?php
        //echo $this->Form->input('User.authCode', array('label' => 'Authorization Code'));

        if ($group == Group::ADMIN){  // if admin allow to choose
            echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
        } else {
            echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
        }

        if ($group == Group::ADMIN || $group == Group::MANAGER){ // activate / deactivate user
        echo $this->Form->input('group_id', array('options' => $groupOption, 'default' => 4));
            echo $this->Form->input('active', array('options' => $active));
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
