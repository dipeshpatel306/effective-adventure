<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Server Room Access');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="serverRoomAccess index">
	<h2><?php echo __('Server Room Access'); ?></h2>
	<table>
	<tr>
			<?php if($group == 1): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>		
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('date', 'Date/Time'); ?></th>
			<th><?php echo $this->Paginator->sort('person'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('reason'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>-->

			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($serverRoomAccess as $serverRoomAccess): ?>
	<tr>
		<?php if($group == 1): ?>
		<td>
			<?php echo $serverRoomAccess['Client']['name']; ?>
		</td>			
		<?php endif; ?>
		<td><?php echo $this->Time->format('m/d/y', $serverRoomAccess['ServerRoomAccess']['date']) . ' ' .
				$this->Time->format('g:i a', $serverRoomAccess['ServerRoomAccess']['time']);
			 ?>&nbsp;</td>

		<td><?php echo ($serverRoomAccess['ServerRoomAccess']['person']); ?>&nbsp;</td>
		<td><?php echo ($serverRoomAccess['ServerRoomAccess']['company']); ?>&nbsp;</td>
		<!--<td><?php echo ($serverRoomAccess['ServerRoomAccess']['reason']); ?>&nbsp;</td>
		<td><?php echo ($serverRoomAccess['ServerRoomAccess']['notes']); ?>&nbsp;</td>-->

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

	</ul>
</div>
