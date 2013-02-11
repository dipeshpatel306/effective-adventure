<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Server Room Access');
?>
<div class="serverRoomAccess index">
	<h2><?php echo __('Server Room Access'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('person'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('reason'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>-->
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($serverRoomAccess as $serverRoomAccess): ?>
	<tr>
		<td><?php echo $this->Time->format('m/d/y', $serverRoomAccess['ServerRoomAccess']['date']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('g:i a', $serverRoomAccess['ServerRoomAccess']['time']); ?>&nbsp;</td>
		<td><?php echo h($serverRoomAccess['ServerRoomAccess']['person']); ?>&nbsp;</td>
		<td><?php echo h($serverRoomAccess['ServerRoomAccess']['company']); ?>&nbsp;</td>
		<!--<td><?php echo h($serverRoomAccess['ServerRoomAccess']['reason']); ?>&nbsp;</td>
		<td><?php echo h($serverRoomAccess['ServerRoomAccess']['notes']); ?>&nbsp;</td>-->
		<td>
			<?php echo $this->Html->link($serverRoomAccess['Client']['name'], array('controller' => 'clients', 'action' => 'view', $serverRoomAccess['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $serverRoomAccess['ServerRoomAccess']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $serverRoomAccess['ServerRoomAccess']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $serverRoomAccess['ServerRoomAccess']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $serverRoomAccess['ServerRoomAccess']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $serverRoomAccess['ServerRoomAccess']['id']), null, __('Are you sure you want to delete # %s?', $serverRoomAccess['ServerRoomAccess']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Server Room Access'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
