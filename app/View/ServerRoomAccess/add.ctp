<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Server Room Access', '/server_room_access');
$this->Html->addCrumb('Add Server Room Access');

$reason = array('' => '', 'Change Backup Tape' => 'Change Backup Tape', 'Maintenance' => 'Maintenance', 'It Support' => 'It Support', 'Other' => 'Other');
$changed = array('' => '', 'Yes' => 'Yes', 'No' => 'No');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
	if(isset($clientId)){
		$selected = $clientId;
	} else{
		$selected = '';
		$clientId = '';
	}	
?>
<div class="serverRoomAccess form">
<?php echo $this->Form->create('ServerRoomAccess'); ?>
	<fieldset>
		<legend><?php echo __('Add Server Room Access'); ?></legend>

	<h2 class='highlight'>Track Access to Server Room</h2>
	<?php
		echo $this->Form->input('date', array('label' => 'Date Server Room Accessed', 'class' => 'datePick'));
		echo $this->Form->input('time');
		echo $this->Form->input('person', array('label' => 'Person Accessing Server Room'));
		echo $this->Form->input('company', array('label' => 'Company of Person Accessing Server Room'));
	?>
	<h2 class='highlight'>Reason</h2>
	<?php
		echo $this->Form->input('reason', array('label' => 'Reason for Access', 'options' => $reason, 'empty' => 'Please Select'));
	?>
	<div class='otherReason'>
		<?php echo $this->Form->input('other_reason', array('label' => 'Other Reasons')); ?>
	</div>

	<h2 class='highlight'>Items Changed in Server Room</h2>
	<?php
		echo $this->Form->input('changed', array('label' => 'Was anything changed?', 'options' => $changed, 'empty' => 'Please Select'));
	?>
	<div class='whatChanged'>
		<?php echo $this->Form->input('what_changed', array('label' => 'What was changed?')); ?>
	</div>

	<h2 class='highlight'>Additional Information</h2>
	<?php
		echo $this->Form->input('notes', array('class' => 'ckeditor'));

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
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
