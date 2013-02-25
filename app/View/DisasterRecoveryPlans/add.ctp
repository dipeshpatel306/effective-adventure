<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Diaster Recovery Plans', '/disaster_recovery_plans');
$this->Html->addCrumb('Add Disaster Recovery Plan');
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="disasterRecoveryPlans form">
<?php echo $this->Form->create('DisasterRecoveryPlan'); ?>
	<fieldset>
		<legend><?php echo __('Add Disaster Recovery Plan'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('details', array('class' => 'ckeditor'));
		
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}
		
		echo $this->Form->input('attachment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Disaster Recovery Plans'), array('action' => 'index')); ?></li>

	</ul>
</div>
