<?php
	$document_types = array(
		'Risk Assessment Documents' => 'Risk Assessment Documents', 
		'Disaster Recovery Plans' => 'Disaster Recovery Plans',
		'Other Contracts & Documents' => 'Other Contracts & Documents'
		);
?>

<div class="documents form">
<?php echo $this->Form->create('Document'); ?>
	<fieldset>
		<legend><?php echo __('Add Contracts & Documents'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('document_type', array('options' => $document_types));
		echo $this->Form->input('description');
		echo $this->Form->input('details', array('id' => 'textEdit'));
		echo $this->Form->input('attachment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
	</ul>
</div>
