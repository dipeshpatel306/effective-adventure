<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Security Incidents');
} else {
	$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
	$this->Html->addCrumb('Security Incidents', '/security_incidents');
}
$this->Html->addCrumb('Edit Security Incident');

$source = array('Internal - Accidental' => 'Internal - Accidental', 'Internal - Deliberate' => 'Internal - Deliberate', 'Partner' => 'Partner', 'Unknown');

$cause = array('Malware' => 'Malware', 'Hacking' => 'Hacking', 'Social Exploit' => 'Social Exploit', 'Stolen Computer' => 'Stolen Computer',
'Stolen Laptop' => 'Stolen Laptop', 'Missing Laptop' => 'Missing Laptop', 'Fraud' => 'Fraud', 'Lost Media(i.e. USB Drive, CD-ROM)' => 'Lost Media(i.e. USB Drive, CD-ROM)', 'Stolen Media (i.e. USB Drive, CD-ROM)' => 'Stolen Media (i.e. USB Drive, CD-ROM)', 'Missing Media' => 'Missing Media', 'Lost Tape' => 'Lost Tape', 'Stolen Tape' => 'Stolen Tape', 'Missing Tape' => 'Missing Tape', 'Document Disposal' => 'Document Disposal', 'Laptop Disposal' => 'Laptop Disposal',
'Computer Disposal' => 'Computer Disposal', 'Media Disposal (i.e. USB Drive, CD-ROM)' => 'Media Disposal (i.e. USB Drive, CD-ROM)', 'Tape Disposal' => 'Tape Disposal', 'Other Disposal (Copy Machine)' => 'Other Disposal (Copy Machine)', 'Misuse or Privilege Abuse' => 'Misuse or Privilege Abuse', 'Physical Attack' => 'Physical Attack', 'Error or Omission' => 'Error or Omission', 'Environmental Event' => 'Environmental Event', 'Other' => 'Other' );

$assets = array('Laptop' => 'Laptop', 'Workstation' => 'Workstation', 'USB drive' => 'USB drive', 'PII on file server' => 'PII on file server', 'Smartphone' => 'Smartphone', 'Floppy drive' => 'Floppy drive', 'External harddrive' => 'External harddrive', 'Tablet PC' => 'Tablet PC', 'Portable media' => 'Portable media', 'PII on peripherals' => 'PII on peripherals', 'CD Rom' => 'CD Rom', 'Backup tape' => 'Backup tape',
'Other' => 'Other');

$system = array('Billing Systems' => 'Billing Systems', 'Database' => 'Database', 'Other' => 'Other');

$impact = array('LOW - a few records (i.e., under 10)' => 'LOW - a few records (i.e., under 10)', 'MEDIUM - many records (i.e., up to 499)' => 'MEDIUM - many records (i.e., up to 499)', 'HIGH - significant amount of records (i.e., 500 or more)' );

$options = array('Yes' => 'Yes', 'No' => 'No');

?>

<div class="securityIncidents form">
<?php echo $this->Form->create('SecurityIncident'); ?>
	<fieldset>
		<legend><?php echo __('Edit Security Incident'); ?></legend>
	<?php
		if ($group == Group::ADMIN || $group == Group::PARTNER_ADMIN) {
		  echo $this->Form->input('client_id');
		}
	?>
	
	<h3 class='highlight'>Dates Relating to Incident</h3>
	<?php
		echo $this->Form->input('date_of_incident', array('class' => 'datePick'));
		//echo $this->Form->input('time_of_incident');
		echo $this->Form->input('discovery_date', array('class' =>'datePick'));
		//echo $this->Form->input('discovery_time');
	?>
	<hr />
	<h3 class='highlight'>Information Relating to Incident</h3>
	<?php
		echo $this->Form->input('description_of_incident', array('type' => 'text', 'rows' => '5', 'cols' => '40'));

		echo $this->Form->input('number_of_records', array('min' => '0', 'class' => 'numwide'));
		echo $this->Form->input('source', array('options' => $source, 'empty' => 'Please Select'));
		echo $this->Form->input('cause_of_incident', array('options' => $cause, 'empty' => 'Please Select'));
	?>
		<div class='causeOther hidden'>
		<?php echo $this->Form->input('cause_other', array('label' => 'Cause Other'));?>
		</div>
		
	<?php 	
		echo $this->Form->input('assets_involved', array('options' => $assets, 'empty' => 'Please Select'));
	?>
		<div class='otherAssets hidden'>
		<?php echo $this->Form->input('other_assets_involved');?>
		</div>
		
	<?php	
		echo $this->Form->input('systems_involved', array('options' => $system, 'empty' => 'Please Select'));
	?>
		<div class='otherSystemsInvolved hidden'>	
		<?php echo $this->Form->input('other_systems_involved'); ?>
		</div>
	
	<?php	
		echo $this->Form->input('description_of_breached', array('label' => 'Description of Breached Information', 'type' => 'text', 'rows' => '5', 'cols' => '40'));
	?>
	<hr />
	<h3 class='highlight'>Impact Level</h3>
	<?php
		echo $this->Form->input('impact_level', array('options' => $impact, 'empty' => 'Please Select', 'empty' => 'Please Select'));
	?>
	<hr />
	<h3 class='highlight'>Resolution Details</h3>
	<?php
		echo $this->Form->input('steps_taken', array('label' =>'Steps taken for resolution'));
		echo $this->Form->input('date_of_resolution', array('class' => 'datePick'));
		//echo $this->Form->input('time_of_resolution');
	?>
	<hr />
	
	<h3 class='highlight'>Security Breach Notification Laws</h3>

	<p>A majority of states have enacted security breach laws, requiring disclosure to consumers when personal information is compromised.</p>

	<p><a href='http://www.ncsl.org/research/telecommunications-and-information-technology/security-breach-notification-laws.aspx' target='_blank'>Read More...</a></p>
		
			
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $this->request->data['SecurityIncident']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Security Incidents'), array('action' => 'index')); ?></li>
		<?php endif; ?>
        <li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Security Incident', 'id' => $this->Form->value('SecurityIncident.id'))); ?></li>
	</ul>
</div>
