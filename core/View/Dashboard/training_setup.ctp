<?php
$this->Html->addCrumb('Training Setup');
?>
<div class="training_setup form">
<?php echo $this->Form->create(); ?>
	<fieldset>
		<legend><?php echo __('Training Setup'); ?></legend>
	<?php
		echo $this->Form->input('default_acct_type', array('label' => 'Default Account Type', 'options' => array('Training' => 'Training')));
		echo $this->Form->input('default_course', array('label' => 'Default Training Course', 'options' => $moodle_courses));
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
