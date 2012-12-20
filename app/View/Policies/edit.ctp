<?php
	$policy_types = array('Policies & Procedures' => 'Policies & Procedures', 'Other Policies & Procedures' => 'Other Policies & Procedures');
?>
<div class="policies form">
<?php echo $this->Form->create('Policy'); ?>
	<fieldset>
		<legend><?php echo __('Edit Policies & Procedures'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('policy_type', array('options' => $policy_types));		
		echo $this->Form->input('description');
		echo $this->Form->input('details', array('id' => 'textEdit'));
		echo $this->Form->input('attachment');
		echo $this->Form->input('media');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Policy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Policy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Policies'), array('action' => 'index')); ?></li>
	</ul>
</div>
