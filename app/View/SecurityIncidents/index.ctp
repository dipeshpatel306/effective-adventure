<div class="securityIncidents index">
	<h2><?php echo __('Security Incidents'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('date_of_incident'); ?></th>
			<th><?php echo $this->Paginator->sort('discovery_date'); ?></th>
			<th><?php echo $this->Paginator->sort('reported_by'); ?></th>
			<th><?php echo $this->Paginator->sort('description_of_incident'); ?></th>
			<th><?php echo $this->Paginator->sort('cause_of_incident'); ?></th>
			<th><?php echo $this->Paginator->sort('assets_involved'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($securityIncidents as $securityIncident): ?>
	<tr>
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['date_of_incident']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['discovery_date']); ?>&nbsp;</td>
		<td><?php echo h($securityIncident['SecurityIncident']['reported_by']); ?>&nbsp;</td>
		<td><?php echo h($securityIncident['SecurityIncident']['description_of_incident']); ?>&nbsp;</td>
		<td><?php echo h($securityIncident['SecurityIncident']['cause_of_incident']); ?>&nbsp;</td>
		<td><?php echo h($securityIncident['SecurityIncident']['assets_involved']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($securityIncident['Client']['name'], array('controller' => 'clients', 'action' => 'view', $securityIncident['Client']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $securityIncident['SecurityIncident']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $securityIncident['SecurityIncident']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $securityIncident['SecurityIncident']['id']), null, __('Are you sure you want to delete # %s?', $securityIncident['SecurityIncident']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Security Incident'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
