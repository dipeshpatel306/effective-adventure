<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Server Room Access', '/server_room_access');
$this->Html->addCrumb('Add Server Room Access');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="serverRoomAccess form">
<?php echo $this->Form->create('ServerRoomAccess'); ?>
	<fieldset>
		<legend><?php echo __('Add Server Room Access'); ?></legend>
	<?php
		echo $this->Form->input('date', array('class' => 'datePick'));
		echo $this->Form->input('time');
		echo $this->Form->input('person');
		echo $this->Form->input('company');
		echo $this->Form->input('reason');
		echo $this->Form->input('notes', array('class' => 'ckeditor'));
		
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Server Room Access'), array('action' => 'index')); ?></li>
	</ul>
</div>
