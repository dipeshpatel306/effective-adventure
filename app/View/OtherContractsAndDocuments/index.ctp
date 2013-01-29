<div class="otherContractsAndDocuments index">
	<h2><?php echo __('Other Contracts And Documents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($otherContractsAndDocuments as $otherContractsAndDocument): ?>
	<tr>
		<td><?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['id']); ?>&nbsp;</td>
		<td><?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['name']); ?>&nbsp;</td>
		<td><?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['description']); ?>&nbsp;</td>
		<td><?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['details']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otherContractsAndDocument['Client']['name'], array('controller' => 'clients', 'action' => 'view', $otherContractsAndDocument['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['modified']); ?>&nbsp;</td>
		<td><?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['attachment']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherContractsAndDocument['OtherContractsAndDocument']['id']), null, __('Are you sure you want to delete # %s?', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Other Contracts And Document'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
