<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Security Incidents');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="securityIncidents index">
	<h2><?php echo __('Security Incidents'); ?></h2>
	<table>
	<tr>
			<?php if($group == 1): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif ?>		
			<th><?php echo $this->Paginator->sort('date_of_incident', 'Incident Date/Time'); ?></th>
			<th><?php echo $this->Paginator->sort('discovery_date', 'Discovery Date/Time'); ?></th>
			<th><?php echo $this->Paginator->sort('reported_by'); ?></th>
			<th><?php echo $this->Paginator->sort('description_of_incident'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($securityIncidents as $securityIncident): ?>
	<tr>
		<?php if ($group == 1): ?> 		
		<td>
			<?php echo $this->Html->link($securityIncident['Client']['name'], array('controller' => 'clients', 'action' => 'view', $securityIncident['Client']['id'])); ?>
		</td>
		<?php endif; ?>
		
		<td>
		<?php echo $this->Time->format('m/d/y', $securityIncident['SecurityIncident']['date_of_incident']) . ' ' . 
				$this->Time->format('g:i a', $securityIncident['SecurityIncident']['time_of_incident']);
		?>&nbsp;</td>
		<td>
		<?php echo $this->Time->format('m/d/y', $securityIncident['SecurityIncident']['discovery_date']) . ' ' .
				$this->Time->format('g:i a', $securityIncident['SecurityIncident']['discovery_time']); 
		?>&nbsp;</td>
		<td><?php echo h($securityIncident['SecurityIncident']['reported_by']); ?>&nbsp;</td>
		<td><?php echo h($securityIncident['SecurityIncident']['description_of_incident']); ?>&nbsp;</td>
		<!--<td><?php echo h($securityIncident['SecurityIncident']['cause_of_incident']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($securityIncident['SecurityIncident']['assets_involved']); ?>&nbsp;</td>-->
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['modified']); ?>&nbsp;</td>

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

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('New Security Incident'), array('action' => 'add')); ?></li>
		<?php endif; ?>
	</ul>
</div>
