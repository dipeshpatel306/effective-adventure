<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Business Associate Agreements', '/business_associate_agreements');
$this->Html->addCrumb('Add Business Associate Agreement');
?>
<div class="businessAssociateAgreements form">
<?php echo $this->Form->create('BusinessAssociateAgreement', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Business Associate Agreement'); ?></legend>
	<?php
		echo $this->Form->input('contract_date', array('class' => 'datePick'));	
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Business Associate Agreements'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
