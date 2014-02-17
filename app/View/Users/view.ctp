<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb($user['User']['last_name'] . ', ' . $user['User']['first_name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
if($user['User']['active']){
	$active = "class='active'";
} else {
	$active = "class='inactive'";
}

?>
<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<?php if($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $user['Client']['name']; ?>
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
			<?php echo $this->Text->autoLinkEmails($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $user['Group']['name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Training Course'); ?></dt>
		<dd>
		    <?php echo $user['Client']['moodle_course_name']; ?>
		</dd>
		<!--<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo ($user['User']['last_name']); ?>
			&nbsp;
		</dd>-->		
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo ($user['User']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell Number'); ?></dt>
		<dd>
			<?php echo ($user['User']['cell_number']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Last Login'); ?></dt>
		<dd>
		<?php 
			if($user['User']['last_login'] == '0000-00-00 00:00:00'){
				echo ''; 
			} else {
			echo $this->Time->format('m/d/y g:i a', $user['User']['last_login']); 
			}
		?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Account Active?'); ?></dt>
		<dd <?php echo $active; ?>>
		<?php 
			echo ($user['User']['active'] ? 'Yes' : 'No');
		?>
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

		<?php if($group == Group::ADMIN || $group == Group::MANAGER): ?>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>

		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<?php endif; ?>				

	</ul>
</div>

