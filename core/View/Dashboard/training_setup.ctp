<?php
$this->Html->addCrumb('Training Setup');
$acctType = array('Initial' => 'Initial', 'Subscription' => 'Subscription',
	 'Meaningful Use' => 'Meaningful Use', 'Training' => 'Training', 'Admin' => 'Admin',
	 'AYCE Training' => 'AYCE Training');
?>
<div class="training_setup form">
<?php echo $this->Form->create(); ?>
	<fieldset>
		<legend><?php echo __('Training Setup'); ?></legend>
	<?php
		echo $this->Form->input('default_acct_type', array('label' => 'Default Account Type', 'options' => $acctType, 'value' => $default_acct_type));
		echo $this->Form->input('default_course', array('label' => 'Default Training Course', 'options' => $moodle_courses, 'value' => $default_course));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Training Setup'), array('controller' => 'dashboard', 'action' => 'training_setup')); ?></li>
	</ul>
</div>
