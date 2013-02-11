<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Removed', '/ephi_removed');
$this->Html->addCrumb('Edit ePHI Removed');
?>
<div class="ephiRemoved form">
<?php echo $this->Form->create('EphiRemoved'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ephi Removed'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date', array('class' => 'datePick'));
		echo $this->Form->input('time');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('removed_by');
		echo $this->Form->input('returned_by');
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EphiRemoved.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EphiRemoved.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ephi Removed'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
