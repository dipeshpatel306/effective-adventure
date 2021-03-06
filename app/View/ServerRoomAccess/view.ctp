<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Server Room Access', '/serevr_room_access');
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $serverRoomAccess['ServerRoomAccess']['date']));

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="serverRoomAccess view">
<h2><?php  echo __('Server Room Access'); ?></h2>
	<dl>
		<?php if($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $serverRoomAccess['Client']['name']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt><?php echo __('Date / Time'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $serverRoomAccess['ServerRoomAccess']['date']) . ' ' . $this->Time->format('g:i a', $serverRoomAccess['ServerRoomAccess']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person Accessing Server Room'); ?></dt>
		<dd>
			<?php echo ($serverRoomAccess['ServerRoomAccess']['person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company of Person Accessing Server Room'); ?></dt>
		<dd>
			<?php echo ($serverRoomAccess['ServerRoomAccess']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reason for Access'); ?></dt>
		<dd>
			<?php echo ($serverRoomAccess['ServerRoomAccess']['reason']) . ' '; ?>
			<?php echo ($serverRoomAccess['ServerRoomAccess']['other_reason']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Items changed in server room'); ?></dt>
		<dd>
			<?php echo ($serverRoomAccess['ServerRoomAccess']['changed']) . ' '; ?>
			<?php echo ($serverRoomAccess['ServerRoomAccess']['what_changed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo ($serverRoomAccess['ServerRoomAccess']['notes']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $serverRoomAccess['ServerRoomAccess']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $serverRoomAccess['ServerRoomAccess']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Server Room Access'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server Room Access'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Server Room Access'), array('action' => 'edit', $serverRoomAccess['ServerRoomAccess']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Server Room Access', 'name' => 'Server Room Access', 'id' => $serverRoomAccess['ServerRoomAccess']['id'])); ?></li>
	</ul>
</div>
