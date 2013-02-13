<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Received', '/ephi_received');
$this->Html->addCrumb('Add ePHI Received');
?>
<div class="ephiReceived form">
<?php echo $this->Form->create('EphiReceived'); ?>
	<fieldset>
		<legend><?php echo __('Add Ephi Received'); ?></legend>
	<?php
		echo $this->Form->input('date_received', array('class' => 'datePick'));
		echo $this->Form->input('time_received');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('patient_name');
		echo $this->Form->input('received_by');
		echo $this->Form->input('date_returned', array('class' => 'datePick'));
		echo $this->Form->input('time_returned');
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ephi Received'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
