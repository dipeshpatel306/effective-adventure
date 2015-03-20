<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb($baa_name);	
} else {
	$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
	$this->Html->addCrumb('Service Provider Contracts', '/service_provider_contracts');
}
$this->Html->addCrumb('Add Service Provider Contract');

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


		
	if(isset($clientId)){
		$selected = $clientId;
	} else{
		$selected = '';
		$clientId = '';
	}	
?>
<div class="businessAssociateAgreements form">
<?php echo $this->Form->create('BusinessAssociateAgreement', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Service Provider Contract'); ?></legend>


	<h2 class='highlight'>Business Associate Contact Information</h2>
	<?php
		echo $this->Form->input('business_name', array('label' => 'Name of Service Provider organization'));
		echo $this->Form->input('business_address', array('label' => 'Service Provider Address'));
		echo $this->Form->input('business_address2', array('label' => 'Service Provider Address2'));
		echo $this->Form->input('city');
		echo $this->Form->input('state', array('options' => $states));
		echo $this->Form->input('zip', array('class' => 'num'));
		echo $this->Form->input('contact', array('label' => 'Service Provider Contact'));
		echo $this->Form->input('email', array('label' => 'Service Provider Email'));
		echo $this->Form->input('phone', array('type' => 'tel', 'label' => 'Service Provider Contact Phone'));
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

		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Attachment'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){  // if admin allow to choose
			echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
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
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $clientId)); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Service Provider Contracts'), array('action' => 'index')); ?></li>
		<?php endif; ?>
	</ul>
</div>

