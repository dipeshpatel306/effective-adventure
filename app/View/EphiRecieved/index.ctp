<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Recieved');
?>
<div class="ephiRecieved index">
	<h2><?php echo __('Ephi Recieved'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('date_recieved'); ?></th>
			<th><?php echo $this->Paginator->sort('time_recieved'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
			<th><?php echo $this->Paginator->sort('recieved_by'); ?></th>
			<th><?php echo $this->Paginator->sort('date_returned'); ?></th>
			<th><?php echo $this->Paginator->sort('time_returned'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($ephiRecieved as $ephiRecieved): ?>
	<tr>
		<td><?php echo $this->Time->format('m/d/y', $ephiRecieved['EphiRecieved']['date_recieved']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('g:i a', $ephiRecieved['EphiRecieved']['time_recieved']); ?>&nbsp;</td>
		<td><?php echo h($ephiRecieved['EphiRecieved']['description']); ?>&nbsp;</td>
		<td><?php echo h($ephiRecieved['EphiRecieved']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($ephiRecieved['EphiRecieved']['recieved_by']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y', $ephiRecieved['EphiRecieved']['date_returned']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('g:i a', $ephiRecieved['EphiRecieved']['time_returned']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ephiRecieved['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ephiRecieved['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiRecieved['EphiRecieved']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiRecieved['EphiRecieved']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ephiRecieved['EphiRecieved']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ephiRecieved['EphiRecieved']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ephiRecieved['EphiRecieved']['id']), null, __('Are you sure you want to delete # %s?', $ephiRecieved['EphiRecieved']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ephi Recieved'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
