<?php
$this->Html->addCrumb('Partners', '/partners');
$this->Html->addCrumb('Edit Partner');
?>
<div class="partners form">
<?php echo $this->Form->create('Partner', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Partner'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('link', array('label'=> 'Link - Please include "http://" '));		
		echo $this->Form->input('logo', array('type' => 'file', 'label' => 'Partner Logo - (gif, jpg, jpeg, png files only)'));
		echo $this->Form->input('logo_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Partners'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete Partner'), array('action' => 'delete', $this->Form->value('Partner.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Partner.id'))); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
