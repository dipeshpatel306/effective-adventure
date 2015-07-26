<?php
$this->Html->addCrumb('Partners', '/partners');
$this->Html->addCrumb('Add Partner');
?>
<div class="partners form">
<?php echo $this->Form->create('Partner', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Partner'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('link', array('value' => "http://", 'label'=> 'Link - Please include "http://" '));		
		
		echo $this->Form->input('logo', array('type' => 'file', 'label' => 'Partner Logo - (gif, jpg, jpeg, png files only)'));
		echo $this->Form->input('logo_dir', array('type' => 'hidden'));
		echo $this->Form->input('users_limit', array('label' => 'Registered Users Limit', 'value' => 5000, 'class' => 'numwide'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Partners'), array('action' => 'index')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
