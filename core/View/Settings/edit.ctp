<?php
$this->Html->addCrumb('Settings', '/settings');
$this->Html->addCrumb('Edit Setting');
?>
<div class="settings form">
<?php echo $this->Form->create('Setting'); ?>
	<fieldset>
		<legend><?php echo __('Edit Setting'); ?></legend>
	<?php
		echo $this->Form->input('key');
		echo $this->Form->input('value');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => 5, 'cols' => '40'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?></li>
	</ul>
</div>
