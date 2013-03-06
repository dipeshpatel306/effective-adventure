<?php
$this->Html->addCrumb('Education Center', '/education_center/admin_index');
$this->Html->addCrumb('Add Education Center Video/Link');

$options = array('Video' => 'Video', 'Link' => 'Link');

?>

<div class="educationCenter form">
<?php echo $this->Form->create('EducationCenter'); ?>
	<fieldset>
		<legend><?php echo __('Add Education Center'); ?></legend>
		<p><b>Note: Don't forget to add javascript event for pop up! See "/js/scripts.js". Only needed for Videos.</b></p>		
	<?php
		echo $this->Form->input('header', array('value' => 'Education Video'));	
		echo $this->Form->input('name');
		echo $this->Form->input('video_link', array('type' => 'radio', 'options' => $options, 'value' => 'Video', 'legend' => false));		
		echo $this->Form->input('video', array('label' => 'Video - (Enter the name of the Video with no extension)'));
		echo $this->Form->input('link', array('value' => 'http://'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Education Center'), array('controller' => 'admin_index', 'action' => 'index')); ?></li>
	</ul>
</div>
