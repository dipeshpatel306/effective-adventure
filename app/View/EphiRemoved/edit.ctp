<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Removed', '/ephi_removed');
$this->Html->addCrumb('Edit ePHI Removed');

$item = array('' => '', 'Laptop' => 'Laptop', 'USB Drive' => 'USB Drive', 'CD-ROM' => 'CD-ROM', 'DVD' => 'DVD', 'Other' => 'Other' );
$reason = array('' => '', 'Work form home' => 'Work from home', 'Transfer to another office' => 'Transfer to another office', 'Presentation' => 'Presentation', 'Other' => 'Other' );


// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiRemoved form">
<?php echo $this->Form->create('EphiRemoved'); ?>
	<h2><strong>Tracked ePHI removed from organization </strong></h2>
	<fieldset>
		<legend><?php echo __('Add ePHI Removed'); ?></legend>

	<h2 class='highlight'>Description and Date Removed</h2>
	<?php
		echo $this->Form->input('item', array('label' => 'Description of item removed', 'options' => $item, 'empty' => 'Please Select'));
		echo '<div class="otherDescription hidden">' .
				$this->Form->input('other_description', array('label' => 'Other Description'))
			. "</div>";

		echo $this->Form->input('date', array('label' => 'Date Removed', 'class' => 'datePick'));
		echo $this->Form->input('time');
	?>
	<h2 class='highlight'>Removing Information</h2>
	<?php
		echo $this->Form->input('reason', array('label' => 'Reason for removing ePHI', 'options' => $reason, 'empty' => 'Please Select'));

		echo '<div class="otherReason hidden">' .
				$this->Form->input('other_reason', array('label' => 'Other Reason'))
			. "</div>";

		echo $this->Form->input('removed_by', array('label' => 'Who removed ePHI?'));
		echo $this->Form->input('approved', array('label' => 'Who approved of removal of ePHI?'));
	?>
	<h2 class='highlight'>Receiving Information</h2>
	<?php
		echo $this->Form->input('returned_by', array('label' => 'Who returned ePHI?'));
		echo $this->Form->input('when_returned', array('label' => 'When was ePHI Returned?', 'class' => 'datePick'));
		echo $this->Form->input('notes', array('type' => 'text', 'rows' => '5', 'cols' => '40'));


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

		<li><?php echo $this->Html->link(__('List ePHI Removed'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EphiRemoved.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EphiRemoved.id'))); ?></li>

	</ul>
</div>
