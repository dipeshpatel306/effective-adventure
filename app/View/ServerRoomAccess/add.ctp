<div class="serverRoomAccess form">
<?php echo $this->Form->create('ServerRoomAccess'); ?>
	<fieldset>
		<legend><?php echo __('Add Server Room Access'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('person');
		echo $this->Form->input('company');
		echo $this->Form->input('reason');
		echo $this->Form->input('notes');
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Server Room Access'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
