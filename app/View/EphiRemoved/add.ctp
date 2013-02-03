<div class="ephiRemoved form">
<?php echo $this->Form->create('EphiRemoved'); ?>
	<fieldset>
		<legend><?php echo __('Add Ephi Removed'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('removed_by', array('class' => 'ckeditor'));
		echo $this->Form->input('returned_by');
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ephi Removed'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
