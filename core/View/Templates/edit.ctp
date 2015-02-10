<?php
$this->Html->addCrumb('Templates', '/templates');
$this->Html->addCrumb('Edit Template');
?>
<div class="templates form">
<?php echo $this->Form->create('Template', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Template'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
	?>
		<label for='currentDoc' class='labelNew'>Current Document</label>
		<div class='currentDoc'><?php echo $doc ?></div>
	<?php 

		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Replace Document'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Template', 'id' => $this->Form->value('Template.id'))); ?></li>

	</ul>
</div>
