<div class="otherPolicies index">
	<h2><?php echo __('Other Policies & Procedures'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('media'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($otherPolicies as $otherPolicy): ?>
	<tr>
		<td><?php echo h($otherPolicy['OtherPolicy']['name']); ?>&nbsp;</td>
		<td><?php echo h($otherPolicy['OtherPolicy']['description']); ?>&nbsp;</td>
		<td><?php echo h($otherPolicy['OtherPolicy']['details']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otherPolicy['Client']['name'], array('controller' => 'clients', 'action' => 'view', $otherPolicy['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $otherPolicy['OtherPolicy']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $otherPolicy['OtherPolicy']['modified']); ?>&nbsp;</td>
		<td><?php echo h($otherPolicy['OtherPolicy']['attachment']); ?>&nbsp;</td>
		<td><?php echo h($otherPolicy['OtherPolicy']['media']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otherPolicy['OtherPolicy']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otherPolicy['OtherPolicy']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherPolicy['OtherPolicy']['id']), null, __('Are you sure you want to delete # %s?', $otherPolicy['OtherPolicy']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Other Policy'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
