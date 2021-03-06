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
			<?php echo $securityIncident['Client']['name']; ?>
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
		<td><?php echo ($securityIncident['SecurityIncident']['description_of_incident']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $securityIncident['SecurityIncident']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $securityIncident['SecurityIncident']['id'])); ?>
			<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Security Incident', 'id' => $securityIncident['SecurityIncident']['id'])); ?>
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

	</ul>
</div>
