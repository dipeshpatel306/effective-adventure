<?php
$this->Html->addCrumb('Server Room Access', '/server_room_access');
$this->Html->addCrumb('Edit Server Room Access');
?>
<div class="serverRoomAccess form">
<?php echo $this->Form->create('ServerRoomAccess'); ?>
	<fieldset>
		<legend><?php echo __('Edit Server Room Access'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date', array('class' => 'datePick'));
		echo $this->Form->input('time');
		echo $this->Form->input('person');
		echo $this->Form->input('company');
		echo $this->Form->input('reason');
		echo $this->Form->input('notes', array('class' => 'ckeditor'));
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ServerRoomAccess.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ServerRoomAccess.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Server Room Access'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
