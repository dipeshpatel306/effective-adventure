<?php
$this->Html->addCrumb('SIRT Members', '/sirt_Members');
$this->Html->addCrumb('Edit SIRT Member');
?>
<div class="sirtMembers form">
<?php echo $this->Form->create('SirtMember'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sirt Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('company');
		echo $this->Form->input('responsibility');
		echo $this->Form->input('sirt_team_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'SIRT Member', 'id' => $this->Form->value('SirtMember.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sirt Members'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sirt Teams'), array('controller' => 'sirt_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Team'), array('controller' => 'sirt_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
