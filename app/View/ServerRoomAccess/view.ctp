<?php
$this->Html->addCrumb('Server Room Access', '/serevr_room_access');
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $serverRoomAccess['ServerRoomAccess']['date']));
?>
<div class="serverRoomAccess view">
<h2><?php  echo __('Server Room Access'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($serverRoomAccess['ServerRoomAccess']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $serverRoomAccess['ServerRoomAccess']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $serverRoomAccess['ServerRoomAccess']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo h($serverRoomAccess['ServerRoomAccess']['person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($serverRoomAccess['ServerRoomAccess']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reason'); ?></dt>
		<dd>
			<?php echo h($serverRoomAccess['ServerRoomAccess']['reason']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($serverRoomAccess['ServerRoomAccess']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($serverRoomAccess['Client']['name'], array('controller' => 'clients', 'action' => 'view', $serverRoomAccess['Client']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Server Room Access'), array('action' => 'edit', $serverRoomAccess['ServerRoomAccess']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Server Room Access'), array('action' => 'delete', $serverRoomAccess['ServerRoomAccess']['id']), null, __('Are you sure you want to delete # %s?', $serverRoomAccess['ServerRoomAccess']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Server Room Access'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server Room Access'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
