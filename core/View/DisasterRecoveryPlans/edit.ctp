<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Disaster Recovery Plans');
} else {
	$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
	$this->Html->addCrumb('Disaster Recovery Plans', '/disaster_recovery_plans');
}
$this->Html->addCrumb('Edit Disaster Recovery Plan');

?>
<div class="disasterRecoveryPlans form">
<?php echo $this->Form->create('DisasterRecoveryPlan', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Disaster Recovery Plan', array('type' => 'file')); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
		echo $this->Form->input('date', array('class' => 'datePick'));

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}
	?>
		<label for='currentDoc' class='labelNew'>Current Document</label>
		<div class='currentDoc'><?php echo $doc ?></div>
	<?php

		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Replace Document'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $this->request->data['DisasterRecoveryPlan']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Disaster Recovery Plans'), array('action' => 'index')); ?></li>
		<?php endif; ?>
		
		<?php if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN || $group == Group::MANAGER): ?>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Disaster Recovery Plan', 'id' => $this->Form->value('DisasterRecoveryPlan.id'))); ?></li>
		<?php endif; ?>

	</ul>
</div>
