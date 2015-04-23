<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Service Provider Contracts');
} else {
	$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
	$this->Html->addCrumb('Service Provider Contracts', '/service_provider_contracts');
}
$this->Html->addCrumb('Edit Service Provider Contract');

	$relationship = array(
	'A CPA firm that has access to PII and/or sensitive data' => 'A CPA firm that has access to PII and/or sensitive data',
    'An Attorney who has access to PII and/or sensitive data' => 'An Attorney who has access to PII and/or sensitive data',
	'Technical vendor that may have access to computer systems that access PII and/or sensitive data' => 'Technical vendor that may have access to computer systems that access PII and/or sensitive data',
	'Lawyers, accountants, consultants' => 'Lawyers, accountants, consultants',
	'Record Storage facilities' => 'Record Storage facilities',
	'Collections agents' => 'Collections agents',
	'Credit Card processing service' => 'Credit Card processing service',
	'Billing companies' => 'Billing companies',
	'Webhosting company' => 'Webhosting company',
	'A company who provides doucment shredding services' => 'A company who provides doucment shredding services',
	'Client' => 'Client',
	'Other' => 'Other'
	);
?>
<div class="businessAssociateAgreements form">
<?php echo $this->Form->create('BusinessAssociateAgreement', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Service Provider Contract'); ?></legend>


	<h2 class='highlight'>Service Provider Contact Information</h2>
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
	<h2 class='highlight'>Service Provider Contract Info</h2>
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
		if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){  // if admin allow to choose
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
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $this->request->data['BusinessAssociateAgreement']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Service Provider Contracts'), array('action' => 'index')); ?></li>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Form->postLink(__('Delete Service Provider Contract'),
		 array('action' => 'delete', $this->Form->value('BusinessAssociateAgreement.id')), 
		 null, __('Are you sure you would like to delete this Service Provider Contract?')); ?></li>
		<?php endif; ?>
		<?php endif; ?>
	</ul>
</div>
