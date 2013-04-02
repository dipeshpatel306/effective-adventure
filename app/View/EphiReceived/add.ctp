<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Received', '/ephi_received');
$this->Html->addCrumb('Add ePHI Received');

$item = array('' => '', 'Laptop' => 'Laptop', 'USB Drive' => 'USB Drive', 'CD-ROM' => 'CD-ROM', 'DVD' => 'DVD', 'Other' => 'Other' );
$reason = array('' => '', 'Referral from another provider' => 'Referral from another provider', "Patient's Records" => "Patient's Records", 'Other' => 'Other');
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiReceived form">
<?php echo $this->Form->create('EphiReceived'); ?>
	<h2>Track ePHI received into organization </h2>
	<fieldset>
		<legend><?php echo __('Add Ephi Received'); ?></legend>

	<h2 class='highlight'>Description and Date Received</h2>
	<?php
		echo $this->Form->input('item', array('Desciprtion of item received', 'options' => $item, 'empty' => 'Please Select'));

		echo '<div class="otherDescription">' .
				$this->Form->input('other_description', array('label' => 'Other Description'))
			. "</div>";

		echo $this->Form->input('date_received', array('class' => 'datePick'));
		echo $this->Form->input('time_received');
	?>
	<h2 class='highlight'>Recieving Information</h2>
	<?php
		echo $this->Form->input('patient_name', array('label' => 'Name of patient associated with ePHI'));
		echo $this->Form->input('where_received', array('label' => 'Where was ePHI received from?'));
		echo $this->Form->input('received_by', array('label' => 'Who received / accepted the ePHI? '));
		echo $this->Form->input('reason', array('label' => 'Reason for receiving ePHI', 'options' => $reason, 'empty' => 'Please Select'));

		echo '<div class="otherReason">' .
				$this->Form->input('other_reason', array('label' => 'Other Reason'))
			. "</div>";
	?>
	<h2 class='highlight'>ePHI Returned</h2>
	<?php
		echo $this->Form->input('date_returned', array('label' => 'Date ePHI Returned', 'class' => 'datePick'));
		echo $this->Form->input('time_returned');
		echo $this->Form->input('returned_to', array('label' => 'Who was the ePhi returned to?'));
		echo $this->Form->input('returned_by', array('label' => 'Who was the person who returned the ePHI? '));
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

		<li><?php echo $this->Html->link(__('List Ephi Received'), array('action' => 'index')); ?></li>

	</ul>
</div>
