<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Security Incidents', '/security_incidents');
$this->Html->addCrumb('Edit Security Incident');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="securityIncidents form">
<?php echo $this->Form->create('SecurityIncident'); ?>
	<fieldset>
		<legend><?php echo __('Edit Security Incident'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date_of_incident', array('class' => 'datePick'));
		echo $this->Form->input('time_of_incident');
		echo $this->Form->input('discovery_date', array('class' =>'datePick'));
		echo $this->Form->input('discovery_time');
		echo $this->Form->input('reported_by');
		echo $this->Form->input('description_of_incident', array('class' => 'ckeditor'));
		echo $this->Form->input('cause_of_incident');
		echo $this->Form->input('assets_involved');
		
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
		<li><?php echo $this->Html->link(__('List Security Incidents'), array('action' => 'index')); ?></li>		

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SecurityIncident.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SecurityIncident.id'))); ?></li>

		<?php endif; ?>

	</ul>
</div>
