<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Security Incidents', '/security_incidents');
$this->Html->addCrumb('Add Security Incident');

$source = array('' => '', 'Internal - Accidental' => 'Internal - Accidental', 'Internal - Deliberate' => 'Internal - Deliberate', 'Partner' => 'Partner', 'Unknown');

$cause = array('' => '', 'Malware' => 'Malware', 'Hacking' => 'Hacking', 'Social Exploit' => 'Social Exploit', 'Stolen Computer' => 'Stolen Computer',
'Stolen Laptop' => 'Stolen Laptop', 'Missing Laptop' => 'Missing Laptop', 'Fraud' => 'Fraud', 'Lost Media(i.e. USB Drive, CD-ROM)' => 'Lost Media(i.e. USB Drive, CD-ROM)', 'Stolen Media (i.e. USB Drive, CD-ROM)' => 'Stolen Media (i.e. USB Drive, CD-ROM)', 'Missing Media' => 'Missing Media', 'Lost Tape' => 'Lost Tape', 'Stolen Tape' => 'Stolen Tape', 'Missing Tape' => 'Missing Tape', 'Document Disposal' => 'Document Disposal', 'Laptop Disposal' => 'Laptop Disposal',
'Computer Disposal' => 'Computer Disposal', 'Media Disposal (i.e. USB Drive, CD-ROM)' => 'Media Disposal (i.e. USB Drive, CD-ROM)', 'Tape Disposal' => 'Tape Disposal', 'Other Disposal (Copy Machine)' => 'Other Disposal (Copy Machine)', 'Misuse or Privilege Abuse' => 'Misuse or Privilege Abuse', 'Physical Attack' => 'Physical Attack', 'Error or Omission' => 'Error or Omission', 'Environmental Event' => 'Environmental Event', 'Other' => 'Other' );

$assets = array('' => '', 'Laptop' => 'Laptop', 'Workstation' => 'Workstation', 'USB drive' => 'USB drive', 'ePHI on file server' => 'ePHI on file server', 'Smartphone' => 'Smartphone', 'Floppy drive' => 'Floppy drive', 'EMR\EHR' => 'EMR\EHR', 'External harddrive' => 'External harddrive', 'Tablet PC' => 'Tablet PC', 'Portable media' => 'Portable media', 'ePHI on peripherals' => 'ePHI on peripherals', 'CD Rom' => 'CD Rom', 'Backup tape' => 'Backup tape',
'Other' => 'Other');

$system = array('' => '', 'EMR' => 'EMR', 'EHR' => 'EHR', 'Billing Systems' => 'Billing Systems', 'Practice Management System' => 'Practice Management System',  'Prescription System' => 'Prescription System', 'Clinical System' => 'Clinical System', 'Database' => 'Database', 'Other' => 'Other');

$impact = array('LOW - a few patient records (i.e., under 10 patients)' => 'LOW - a few patient records (i.e., under 10 patients)', 'MEDIUM - many patient records (i.e., up to 499 patients)' => 'MEDIUM - many patient records (i.e., up to 499 patients)', 'HIGH - significant amount of records (i.e., 500 or more patients)' );

$options = array('' => '', 'Yes' => 'Yes', 'No' => 'No');



// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="securityIncidents form">
<?php echo $this->Form->create('SecurityIncident'); ?>
	<fieldset>
		<legend><?php echo __('Add Security Incident'); ?></legend>

	<h3 class='highlight'>Dates Relating tio Incident</h3>
	<?php
		echo $this->Form->input('date_of_incident', array('class' => 'datePick'));
		echo $this->Form->input('time_of_incident');
		echo $this->Form->input('discovery_date', array('class' =>'datePick'));
		echo $this->Form->input('discovery_time');
	?>
	<h3 class='highlight'>Information Relating to Incident</h3>
	<?php
		echo $this->Form->input('description_of_incident', array('class' => 'ckeditor'));

		echo $this->Form->input('number_of_records');
		echo $this->Form->input('source', array('options' => $source));
		echo $this->Form->input('cause_of_incident', array('options' => $cause));
		echo $this->Form->input('assets_involved', array('options' => $assets));
		echo $this->Form->input('systems_involved', array('options' => $system));
		echo $this->Form->input('description_of_breached', array('label' => 'Description of Breached Information', 'class' => 'ckeditor'));
	?>
	<h3 class='highlight'>Impact Level</h3>
	<?php
		echo $this->Form->input('impact_level', array('options' => $impact));
	?>
	<h3 class='highlight'>Resolution Details</h3>
	<?php
		echo $this->Form->input('steps_taken', array('label' =>'Steps taken for resolution'));
		echo $this->Form->input('date_of_resolution', array('class' => 'datePick'));
		echo $this->Form->input('time_of_resolution');
	?>
	<h3 class='highlight'>Breach Notification</h3>

	<p>This section will determine if a breach notification to individuals affected by the breach is required.</p>

	<p>Please read and complete the following Breach Notification Risk Assessment before proceeding. </p>
	<p><a href='http://www.hipaasecurenow.com/portal/Improper_Disclosures_Assessment.doc' target='_blank'>Breach Notification Risk Assessment</a></p>

	<h3 class='highlight'>Breach Notification</h3>
	<?php
		echo $this->Form->input('breach_notification_ra', array('label' => 'Have you done a Breach Notification Risk Assessment?', 'options' => $options));
		echo $this->Form->input('after_completing', array('label' => 'After completing the assessment do you feel the disclosure compromises the Security and Privacy of the PHI AND Poses a significant risk to the financial, reputational or other harm to the individual to the extent it would require a notification to the affected individuals?', 'options' => $options));
		echo $this->Form->input('informed_individual', array('label' => 'Have you informed the individuals of the breach?', 'options' => $options));
		echo $this->Form->input('effect_more_than_500', array('label' => 'Did this effect more than 500 individuals?', 'options' => $options));
		echo $this->Form->input('notify_hhs', array('label' => 'Did you notify HHS of security breach?', 'options' => $options));
		echo $this->Form->input('notify_individuals', array('label' => 'Did you notify all individuals?', 'options' => $options));
		echo $this->Form->input('notify_media', array('label' => 'Did you provide notice to prominent media outlets in surrounding area (press release)?', 'options' => $options));
		echo $this->Form->input('breach_date', array('label' =>'Date Completed', 'class' => 'datePick'));
	?>

		<h3 class='highlight'>Corrective Measures</h3>
		<?php
		echo $this->Form->input('corrective_measures', array('class' => 'ckeditor'));
		?>

	<?php

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

	</ul>
</div>
