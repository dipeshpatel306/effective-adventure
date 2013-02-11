<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Diaster Recovery Plans', '/disaster_recovery_plans');
$this->Html->addCrumb('Edit Disaster Recovery Plan');
?>
<div class="disasterRecoveryPlans form">
<?php echo $this->Form->create('DisasterRecoveryPlan'); ?>
	<fieldset>
		<legend><?php echo __('Edit Disaster Recovery Plan'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('details', array('class' => 'ckeditor'));
		echo $this->Form->input('client_id');
		echo $this->Form->input('attachment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DisasterRecoveryPlan.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DisasterRecoveryPlan.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Disaster Recovery Plans'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
