<?php
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb($user['User']['email']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<?php if($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Client']['name'], array('controller' => 'clients', 'action' => 'view', $user['Client']['id'])); ?>
			&nbsp;
		</dd>		
		<?php endif; ?>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($user['User']['first_name'] . ' ' . $user['User']['last_name']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<!--<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>-->		
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell Number'); ?></dt>
		<dd>
			<?php echo h($user['User']['cell_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $user['User']['last_login']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>

		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<?php endif; ?>				

	</ul>
</div>

