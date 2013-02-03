<div class="securityIncidents form">
<?php echo $this->Form->create('SecurityIncident'); ?>
	<fieldset>
		<legend><?php echo __('Add Security Incident'); ?></legend>
	<?php
		echo $this->Form->input('date_of_incident');
		echo $this->Form->input('discovery_date');
		echo $this->Form->input('reported_by');
		echo $this->Form->input('description_of_incident', array('class' => 'ckeditor'));
		echo $this->Form->input('cause_of_incident');
		echo $this->Form->input('assets_involved');
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Security Incidents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
