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
$this->Html->addCrumb('Add Security Incident');

$source = array('Internal - Accidental' => 'Internal - Accidental', 'Internal - Deliberate' => 'Internal - Deliberate', 'Partner' => 'Partner', 'Unknown');

$cause = array('Malware' => 'Malware', 'Hacking' => 'Hacking', 'Social Exploit' => 'Social Exploit', 'Stolen Computer' => 'Stolen Computer',
'Stolen Laptop' => 'Stolen Laptop', 'Missing Laptop' => 'Missing Laptop', 'Fraud' => 'Fraud', 'Lost Media(i.e. USB Drive, CD-ROM)' => 'Lost Media(i.e. USB Drive, CD-ROM)', 'Stolen Media (i.e. USB Drive, CD-ROM)' => 'Stolen Media (i.e. USB Drive, CD-ROM)', 'Missing Media' => 'Missing Media', 'Lost Tape' => 'Lost Tape', 'Stolen Tape' => 'Stolen Tape', 'Missing Tape' => 'Missing Tape', 'Document Disposal' => 'Document Disposal', 'Laptop Disposal' => 'Laptop Disposal',
'Computer Disposal' => 'Computer Disposal', 'Media Disposal (i.e. USB Drive, CD-ROM)' => 'Media Disposal (i.e. USB Drive, CD-ROM)', 'Tape Disposal' => 'Tape Disposal', 'Other Disposal (Copy Machine)' => 'Other Disposal (Copy Machine)', 'Misuse or Privilege Abuse' => 'Misuse or Privilege Abuse', 'Physical Attack' => 'Physical Attack', 'Error or Omission' => 'Error or Omission', 'Environmental Event' => 'Environmental Event', 'Other' => 'Other' );

$assets = array('Laptop' => 'Laptop', 'Workstation' => 'Workstation', 'USB drive' => 'USB drive', 'PII on file server' => 'PII on file server', 'Smartphone' => 'Smartphone', 'Floppy drive' => 'Floppy drive', 'External harddrive' => 'External harddrive', 'Tablet PC' => 'Tablet PC', 'Portable media' => 'Portable media', 'PII on peripherals' => 'PII on peripherals', 'CD Rom' => 'CD Rom', 'Backup tape' => 'Backup tape',
'Other' => 'Other');

$system = array('Billing Systems' => 'Billing Systems', 'Database' => 'Database', 'Other' => 'Other');

$impact = array('LOW - a few records (i.e., under 10)' => 'LOW - a few records (i.e., under 10)', 'MEDIUM - many records (i.e., up to 499)' => 'MEDIUM - many records (i.e., up to 499)', 'HIGH - significant amount of records (i.e., 500 or more)' );

$options = array('Yes' => 'Yes', 'No' => 'No');
	
	if(isset($clientId)){
		$selected = $clientId;
	} else{
		$selected = '';
		$clientId = '';
	}	
?>

<div class="securityIncidents form">
<?php echo $this->Form->create('SecurityIncident'); ?>
	<fieldset>
		<legend><?php echo __('Add Security Incident'); ?></legend>
	<?php

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){  // if admin allow to choose
			echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
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
		echo $this->Form->input('description_of_incident', array('type' => 'text', 'rows' => '5', 'cols' => '50'));

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
		echo $this->Form->input('description_of_breached', array('label' => 'Description of Breached Information', 'type' => 'text', 'rows' => '5', 'cols' => '50'));
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

		<hr />
		<h3 class='highlight'>Corrective Measures</h3>
		<?php
		echo $this->Form->input('corrective_measures', array('type' => 'text', 'rows' => '5', 'cols' => '50'));
		?>	
	
	
		<div class='breach_notification_please_complete dialogBox hidden'><!-- Have you done a Breach Notification Risk Assessment? = No -->
		
			<p>Please complete a Breach Notification Risk Assessment before continuing.</p>	
			<?php echo $this->element('dialogok'); ?>
		</div>
	
		<div class='breach_not_required dialogBox hidden'><!-- if After Completing == No -->
			<p>No breach notification is required</p>	
			<?php echo $this->element('dialogok'); ?>
		</div>	
		
		<div class='500individualsBox dialogBox hidden'> <!
			<p>CE must notify secretary of breaches of unsecured protected health information, by using the HHS website
-60 days or fewer (500 individuals or more)</p>

		<p><a href='http://www.hhs.gov/ocr/privacy/hipaa/administrative/breachnotificationrule/brinstruction.html'>
	http://www.hhs.gov/ocr/privacy/hipaa/administrative/breachnotificationrule/brinstruction.html</a></p>
	    <?php echo $this->element('dialogok'); ?>
		</div>
		
		<div class='breachCompletePop dialogBox hidden'>
			<p>To print, right click and click on print.</p>

		<p>
			Per individual, these must all be completed within 60 days of incident:
			<ul>
			<li>Notice in written form by 1st class mail or by email if they have agreed upon electronic mailing</li>
			<li>Description of breach</li>
			<li>Types of info involved  (ePHI)</li>
			<li>Steps they should take to protect themselves</li>
			<li>Description of what CE is doing to investigate/mitigate/prevent future occurrences</li>
			</ul>
		</p>
		<p>
			If contact information is out of date:
			<ul>
			<li>10 or more individuals: CE must post publicly  -website/major print/broadcast media  (Substitute Notice)</li>
			<li>10 or fewer: This can be done by written, telephone, other means</li>
			</ul>
		</p>
		<p></p>
			Secretary notice: CE must notify secretary of breaches of unsecured protected health information, by using the Health and Human Services (HHS) website
			<ul>
			<li>60 days or fewer (500 individuals or more)</li>
			<li>Fewer than 500 - once a year</li>
			</ul>
		</p>
		<p>
		For more information please visit <a href='http://www.hhs.gov/ocr/privacy/hipaa/administrative/breachnotificationrule/index.htm'>
			http://www.hhs.gov/ocr/privacy/hipaa/administrative/breachnotificationrule/index.htm</a>
		</p>

        <?php echo $this->element('dialogok'); ?>
		</div>
		
			
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $clientId)); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Security Incidents'), array('action' => 'index')); ?></li>
		<?php endif; ?>
	</ul>
</div>
