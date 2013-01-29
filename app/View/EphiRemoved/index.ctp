<div class="ephiRemoved index">
	<h2><?php echo __('Ephi Removed'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('removed_by'); ?></th>
			<th><?php echo $this->Paginator->sort('returned_by'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($ephiRemoved as $ephiRemoved): ?>
	<tr>
		<td><?php echo h($ephiRemoved['EphiRemoved']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiRemoved['EphiRemoved']['date']); ?>&nbsp;</td>
		<td><?php echo h($ephiRemoved['EphiRemoved']['description']); ?>&nbsp;</td>
		<td><?php echo h($ephiRemoved['EphiRemoved']['removed_by']); ?>&nbsp;</td>
		<td><?php echo h($ephiRemoved['EphiRemoved']['returned_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ephiRemoved['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ephiRemoved['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiRemoved['EphiRemoved']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $ephiRemoved['EphiRemoved']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ephiRemoved['EphiRemoved']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ephiRemoved['EphiRemoved']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ephiRemoved['EphiRemoved']['id']), null, __('Are you sure you want to delete # %s?', $ephiRemoved['EphiRemoved']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ephi Removed'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
