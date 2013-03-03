<div class="dashboard form">
<?php echo $this->Form->create('Dashboard'); ?>
	<fieldset>
		<legend><?php echo __('Add Dashboard'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('title');
		echo $this->Form->input('body', array('class' => 'ckeditor'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<!--<ul>

		<li><?php echo $this->Html->link(__('List Dashboard'), array('action' => 'index')); ?></li>
	</ul>-->
</div>
