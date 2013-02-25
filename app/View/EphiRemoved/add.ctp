<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Removed', '/ephi_removed');
$this->Html->addCrumb('Add ePHI Removed');
?>
<div class="ephiRemoved form">
<?php echo $this->Form->create('EphiRemoved'); ?>
	<fieldset>
		<legend><?php echo __('Add Ephi Removed'); ?></legend>
	<?php
		echo $this->Form->input('date', array('class' => 'datePick'));
		echo $this->Form->input('time');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('removed_by', array('class' => 'ckeditor'));
		echo $this->Form->input('returned_by');
		
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

		<li><?php echo $this->Html->link(__('List Ephi Removed'), array('action' => 'index')); ?></li>
	</ul>
</div>
