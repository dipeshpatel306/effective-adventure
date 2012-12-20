<div class="policies form">
<?php echo $this->Form->create('Policies & Procedures'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Policy'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('details');
		echo $this->Form->input('attachment');
		echo $this->Form->input('media');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Policies'), array('action' => 'index')); ?></li>
	</ul>
</div>
