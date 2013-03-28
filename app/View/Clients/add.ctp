<?php
$this->Html->addCrumb('Clients', '/clients');
$this->Html->addCrumb('Add Client');

$acctType = array('Initial' => 'Initial', 'Subscription' => 'Subscription', 'Meaningful Use' => 'Meaningful Use', 'HIPAA' => 'HIPAA');
$active = array('Yes' => 'Yes', 'No' => 'No');
$risk = array('' => '', 'Completed' => 'Completed');

?>
<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
	<fieldset>
		<legend><?php echo __('Add Client'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('account_type', array('options' => $acctType, 'default' => 'Pending'));
		echo $this->Form->input('active', array('label' => 'Account Active?', 'options' => $active, 'default' => 'Yes'));
		echo $this->Form->input('partner_id', array('default' => '', 'empty' => ''));
		echo $this->Form->input('risk_assessment_status', array('label' => 'Risk Assessment Completed', 'class' => 'datePick'));
		echo $this->Form->input('details', array('class' => 'ckeditor'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<br />
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
