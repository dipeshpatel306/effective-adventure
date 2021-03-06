<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Received');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiReceived index">
	<h2><?php echo __('ePHI Received'); ?></h2>
	<table>
	<tr>
			<?php if($group == Group::ADMIN): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('item'); ?></th>
			<th><?php echo $this->Paginator->sort('date_received', 'Receieved Date/Time'); ?></th>
			<th><?php echo $this->Paginator->sort('received_by'); ?></th>
			<th><?php echo $this->Paginator->sort('date_returned', 'Returned Date/Time'); ?></th>

			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($ephiReceived as $ephiReceived): ?>
	<tr>
		<?php if($group == Group::ADMIN): ?>
		<td>
			<?php echo $ephiReceived['Client']['name']; ?>
		</td>
		<?php endif; ?>
		<td><?php echo ($ephiReceived['EphiReceived']['item']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y', $ephiReceived['EphiReceived']['date_received']) . ' ' .
				$this->Time->format('g:i a', $ephiReceived['EphiReceived']['time_received']);
		?>&nbsp;</td>

		<td><?php echo ($ephiReceived['EphiReceived']['received_by']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y', $ephiReceived['EphiReceived']['date_returned']) . ' ' .
				$this->Time->format('g:i a', $ephiReceived['EphiReceived']['time_returned']);
		?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ephiReceived['EphiReceived']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ephiReceived['EphiReceived']['id'])); ?>
			<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'ePHI Received', 'id' => $ephiReceived['EphiReceived']['id'])); ?>
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

		<li><?php echo $this->Html->link(__('New ePHI Received'), array('action' => 'add')); ?></li>

	</ul>
</div>
