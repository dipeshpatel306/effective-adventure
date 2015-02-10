<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Template Categories', '/template_categories');
$this->Html->addCrumb('Add Template Category');
?>
<div class="templateCategories form">
<?php echo $this->Form->create('TemplateCategory', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Template Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
    <div class='submit'>
        <?php 
             echo $this->Form->submit('Save', array('div' => false));
             echo $this->Form->submit('Save and next', array('div' => false, 'class' => 'savenext', 'name' => 'next'));
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Templates'), array('controller' => 'templates', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Template Categories'), array('action' => 'index')); ?></li>

	</ul>
</div>
