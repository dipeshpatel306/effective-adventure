<div class="disasterRecoveryPlans index">
	<h2><?php echo __('Disaster Recovery Plans'); ?></h2>
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
	foreach ($disasterRecoveryPlans as $disasterRecoveryPlan): ?>
	<tr>
		<td><?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['id']); ?>&nbsp;</td>
		<td><?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['name']); ?>&nbsp;</td>
		<td><?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['description']); ?>&nbsp;</td>
		<td><?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['details']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($disasterRecoveryPlan['Client']['name'], array('controller' => 'clients', 'action' => 'view', $disasterRecoveryPlan['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $disasterRecoveryPlan['DisasterRecoveryPlan']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $disasterRecoveryPlan['DisasterRecoveryPlan']['modified']); ?>&nbsp;</td>
		<td><?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['attachment']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $disasterRecoveryPlan['DisasterRecoveryPlan']['id']), null, __('Are you sure you want to delete # %s?', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Disaster Recovery Plan'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
