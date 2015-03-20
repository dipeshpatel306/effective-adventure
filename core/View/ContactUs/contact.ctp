<?php
$this->Html->addCrumb('Contact Us');
?>
<div class="contactUs form">
<?php echo $this->Form->create('ContactUs'); ?>
	<fieldset>
		<legend><?php echo __('Contact Us'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('company');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('subject');
		echo $this->Form->input('feedback');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('newsFeed'); ?>