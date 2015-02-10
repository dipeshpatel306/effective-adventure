<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Business Associate Agreements', '/business_associate_agreements');
$this->Html->addCrumb('Edit Business Associate Agreement');

	$states = array('AL'=>"Alabama", 'AK'=>"Alaska", 'AZ'=>"Arizona", 'AR'=>"Arkansas", 'CA'=>"California", 'CO'=>"Colorado",
					'CT'=>"Connecticut", 'DE'=>"Delaware", 'DC'=>"District Of Columbia", 'FL'=>"Florida", 'GA'=>"Georgia",
					'HI'=>"Hawaii", 'ID'=>"Idaho", 'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa", 'KS'=>"Kansas",
					'KY'=>"Kentucky", 'LA'=>"Louisiana", 'ME'=>"Maine", 'MD'=>"Maryland", 'MA'=>"Massachusetts", 'MI'=>"Michigan",
					'MN'=>"Minnesota", 'MS'=>"Mississippi", 'MO'=>"Missouri", 'MT'=>"Montana", 'NE'=>"Nebraska", 'NV'=>"Nevada",
					'NH'=>"New Hampshire", 'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York", 'NC'=>"North Carolina",
					'ND'=>"North Dakota", 'OH'=>"Ohio", 'OK'=>"Oklahoma", 'OR'=>"Oregon", 'PA'=>"Pennsylvania", 'RI'=>"Rhode Island",
					'SC'=>"South Carolina", 'SD'=>"South Dakota", 'TN'=>"Tennessee", 'TX'=>"Texas", 'UT'=>"Utah", 'VT'=>"Vermont",
					'VA'=>"Virginia", 'WA'=>"Washington", 'WV'=>"West Virginia", 'WI'=>"Wisconsin", 'WY'=>"Wyoming"
					);

	$relationship = array(
	'A third party administrator that assists a health plan with claims processing' => 'A third party administrator that assists a health plan with claims processing ',
	'A CPA firm whose accounting services to a health care provider involve access to protected health information' => 'A CPA firm whose accounting services to a health care provider involve access to protected health information',
	'An attorney whose legal services to a health plan involve access to protected health information ' => 'An attorney whose legal services to a health plan involve access to protected health information',
	'A consultant that performs utilization reviews for a hospital' => 'A consultant that performs utilization reviews for a hospital',
	'A health care clearinghouse' => 'A health care clearinghouse',
	'An independent medical transcriptionist that provides transcription services to a physician' => 'An independent medical transcriptionist that provides transcription services to a physician',
	'A pharmacy benefits manager that manages a health care plan’s pharmacist network' => 'A pharmacy benefits manager that manages a health care plan’s pharmacist network',
	'Technical vendors who have access to computer systems or databases containing ePHI' => 'Technical vendors who have access to computer systems or databases containing ePHI',
	'Lawyers, accountants, consultants' => 'Lawyers, accountants, consultants',
	'Record storage facilities' => 'Record storage facilities',
	'Collection agents' => 'Collection agents',
	'Medical Transcript Service' => 'Medical Transcript Service',
	'Practice Managers' => 'Practice Managers',
	'Billing Companies' => 'Billing Companies',
	'A company who provides document shredding services' => 'A company who provides document shredding services',
	'A person who provides medical transcription services' => 'A person who provides medical transcription services',
	'A vendor who provides billing or collection services' => 'A vendor who provides billing or collection services',
	'Client' => 'Client',
	'Other' => 'Other'
	);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="businessAssociateAgreements form">
<?php echo $this->Form->create('BusinessAssociateAgreement', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Business Associate Agreement'); ?></legend>


	<h2 class='highlight'>Business Associate Contact Information</h2>
	<?php
		echo $this->Form->input('business_name', array('label' => 'Name of Business Associate organization'));
		echo $this->Form->input('business_address', array('label' => 'Business Associate Address'));
		echo $this->Form->input('business_address2', array('label' => 'Business Associate Address2'));
		echo $this->Form->input('city');
		echo $this->Form->input('state', array('options' => $states));
		echo $this->Form->input('zip', array('class' => 'num'));
		echo $this->Form->input('contact', array('label' => 'Business Associate Contact'));
		echo $this->Form->input('email', array('label' => 'Business Associate Email'));
		echo $this->Form->input('phone', array('type' => 'tel', 'label' => 'Business Associate Contact Phone'));
	?>

	<hr>
	<br />
	<h2 class='highlight'>Business Associate Agreement Info</h2>
	<?php
		echo $this->Form->input('relationship', array('options' => $relationship));
    ?>
    <div class='otherRelationship hidden'>
        <?php echo $this->Form->input('relationship_other', array('label' => 'Other Relationship')); ?>
    </div>
    <?php
		echo $this->Form->input('contract_date', array('class' => 'datePick'));
	?>	
		<label for='currentDoc' class='labelNew'>Current Document</label>
		<div class='currentDoc'><?php echo $doc ?>
			
		</div>
	<?php	
		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Replace Document'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));

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
		<li><?php echo $this->Html->link(__('List Business Associate Agreements'), array('action' => 'index')); ?></li>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Form->postLink(__('Delete Business Associate Agreement'),
		 array('action' => 'delete', $this->Form->value('BusinessAssociateAgreement.id')), 
		 null, __('Are you sure you would like to delete this Business Associate Agreement?')); ?></li>
		<?php endif; ?>
	</ul>
</div>
