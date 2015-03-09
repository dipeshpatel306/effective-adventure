<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Other Contracts & Documents');
} else {
	$this->Html->addCrumb('Other Contracts & Documents', '/other_contracts_and_documents');
}
$this->Html->addCrumb('Add Other Contract & Document');
	
	if(isset($clientId)){
		$selected = $clientId;
	} else{
		$selected = '';
		$clientId = '';
	}
?>
<div class="otherContractsAndDocuments form">
<?php echo $this->Form->create('OtherContractsAndDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Other Contracts And Documents'); ?></legend>
	<?php

		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
		echo $this->Form->input('date', array('class' => 'datePick'));
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){  // if admin allow to choose
			echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Attachment'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
    <div class='submit'>
        <?php 
             echo $this->Form->submit('Save', array('div' => false));
             if ($group == Group::ADMIN || $group == Group::PARTNER_ADMIN) {
                 echo $this->Form->submit('Save and next', array('div' => false, 'class' => 'savenext', 'name' => 'next'));
             }
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $clientId)); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Other Contracts And Documents'), array('action' => 'index')); ?></li>
		<?php endif; ?>
	</ul>
</div>
