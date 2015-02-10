<?php
$this->Html->addCrumb('sirt_members', '/sirt_members');
$this->Html->addCrumb($sirtMember['SirtMember']['company']);
?>

<div class="sirtMembers view">
<h2><?php  echo __('Sirt Member'); ?></h2>
	<dl>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo ($sirtMember['SirtMember']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo ($sirtMember['SirtMember']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo ($sirtMember['SirtMember']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responsibility'); ?></dt>
		<dd>
			<?php echo ($sirtMember['SirtMember']['responsibility']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sirt Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sirtMember['SirtTeam']['company_name'], array('controller' => 'sirt_teams', 'action' => 'view', $sirtMember['SirtTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $sirtMember['SirtMember']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $sirtMember['SirtMember']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sirt Member'), array('action' => 'edit', $sirtMember['SirtMember']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete SIRT Member', 'name' => 'SIRT Member', 'id' => $sirtMember['SirtMember']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('List Sirt Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Member'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sirt Teams'), array('controller' => 'sirt_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Team'), array('controller' => 'sirt_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
