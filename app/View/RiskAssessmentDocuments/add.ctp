<div class="riskAssessmentDocuments form">
<?php echo $this->Form->create('RiskAssessmentDocument'); ?>
	<fieldset>
		<legend><?php echo __('Add Risk Assessment Document'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('details');
		echo $this->Form->input('client_id');
		echo $this->Form->input('attachment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Risk Assessment Documents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
