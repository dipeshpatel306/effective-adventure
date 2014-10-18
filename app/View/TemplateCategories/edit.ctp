<?php
$this->Html->addCrumb('Template Categories', '/template_categories');
$this->Html->addCrumb('Edit Template Category');
?>
<div class="templateCategories form">
<?php echo $this->Form->create('TemplateCategory', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Template Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Template Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Template Category', 'id' => $this->Form->value('TemplateCategory.id'))); ?></li>

	</ul>
</div>
