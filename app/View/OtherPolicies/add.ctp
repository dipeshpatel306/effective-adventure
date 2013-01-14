<div class="otherPolicies form">
<?php echo $this->Form->create('OtherPolicy', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Other Policies & Procedures'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('details', array('id' => 'textEdit'));
		echo $this->Form->input('client_id');
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('media');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Other Policies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
