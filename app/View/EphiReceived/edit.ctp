<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Received', '/ephi_received');
$this->Html->addCrumb('Edit ePHI Received');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiReceived form">
<?php echo $this->Form->create('EphiReceived'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ephi Received'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date_received', array('class' => 'datePick'));
		echo $this->Form->input('time_received');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('patient_name');
		echo $this->Form->input('received_by');
		echo $this->Form->input('date_returned', array('class' => 'datePick'));
		echo $this->Form->input('time_returned');
		
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
		<li><?php echo $this->Html->link(__('List Ephi Received'), array('action' => 'index')); ?></li>
		
		<?php if($group == 1 || $group == 2): ?>		
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EphiReceived.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EphiReceived.id'))); ?></li>
		<?php endif; ?>

	</ul>
</div>
