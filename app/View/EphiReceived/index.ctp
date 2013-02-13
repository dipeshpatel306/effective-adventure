<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Received');
?>
<div class="ephiReceived index">
	<h2><?php echo __('Ephi Received'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('date_received'); ?></th>
			<th><?php echo $this->Paginator->sort('time_received'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
			<th><?php echo $this->Paginator->sort('received_by'); ?></th>
			<th><?php echo $this->Paginator->sort('date_returned'); ?></th>
			<th><?php echo $this->Paginator->sort('time_returned'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($ephiReceived as $ephiReceived): ?>
	<tr>
		<td><?php echo $this->Time->format('m/d/y', $ephiReceived['EphiReceived']['date_received']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('g:i a', $ephiReceived['EphiReceived']['time_received']); ?>&nbsp;</td>
		<td><?php echo h($ephiReceived['EphiReceived']['description']); ?>&nbsp;</td>
		<td><?php echo h($ephiReceived['EphiReceived']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($ephiReceived['EphiReceived']['received_by']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y', $ephiReceived['EphiReceived']['date_returned']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('g:i a', $ephiReceived['EphiReceived']['time_returned']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ephiReceived['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ephiReceived['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ephiReceived['EphiReceived']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ephiReceived['EphiReceived']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ephiReceived['EphiReceived']['id']), null, __('Are you sure you want to delete # %s?', $ephiReceived['EphiReceived']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ephi Received'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
