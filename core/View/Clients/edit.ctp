<?php
$this->Html->addCrumb('Clients', '/clients');
$this->Html->addCrumb('Edit Client');

$acctType = array('Initial' => 'Initial', 'Subscription' => 'Subscription', 'Meaningful Use' => 'Meaningful Use', 'Training' => 'Training', 'HIPAA' => 'HIPAA');
$active = array(true => 'Yes', false => 'No');
$risk = array('' => '', 'Completed' => 'Completed');
?>
<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('account_type', array('options' => $acctType, 'default' => 'Pending'));
        echo $this->Form->input('moodle_course_id', array('label' => 'Training Course', 'options' => $moodle_courses));
		echo $this->Form->input('active', array('label' => 'Account Active?', 'options' => $active, 'empty' => ''));
		echo $this->Form->input('display_ra_org', array('label' => 'Display RA/Org?', 'options' => $active, 'default' => true));
		echo $this->Form->input('partner_id', array('empty' => 'No Partner', 'value' => ''));
		echo $this->Form->input('risk_assessment_status', array('label' => 'Risk Assessment Completed', 'class' => 'datePick'));
		echo $this->Form->input('details', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Client', 'name' => 'Client', 'id' => $this->Form->value('Client.id'))); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
