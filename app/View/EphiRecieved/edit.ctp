<div class="ephiRecieved form">
<?php echo $this->Form->create('EphiRecieved'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ephi Recieved'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date_recieved');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('patient_name');
		echo $this->Form->input('recieved_by');
		echo $this->Form->input('date_returned');
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EphiRecieved.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EphiRecieved.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ephi Recieved'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
