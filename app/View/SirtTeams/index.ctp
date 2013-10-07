<?php
$this->Html->addCrumb('SIRT Teams');
?>
<div class="sirtTeams index">
	<h2><?php echo __('Sirt Teams'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('address_1'); ?></th>
			<th><?php echo $this->Paginator->sort('address_2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>-->
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($sirtTeams as $sirtTeam): ?>
	<tr>
		<td><?php echo ($sirtTeam['SirtTeam']['company_name']); ?>&nbsp;</td>
		<!--<td><?php echo ($sirtTeam['SirtTeam']['address_1']); ?>&nbsp;</td>
		<td><?php echo ($sirtTeam['SirtTeam']['address_2']); ?>&nbsp;</td>
		<td><?php echo ($sirtTeam['SirtTeam']['city']); ?>&nbsp;</td>
		<td><?php echo ($sirtTeam['SirtTeam']['state']); ?>&nbsp;</td>
		<td><?php echo ($sirtTeam['SirtTeam']['zip']); ?>&nbsp;</td>
		<td><?php echo ($sirtTeam['SirtTeam']['phone']); ?>&nbsp;</td>
		<td><?php echo ($sirtTeam['SirtTeam']['website']); ?>&nbsp;</td>-->
		<td>
			<?php echo $sirtTeam['Client']['name']; ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $sirtTeam['SirtTeam']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $sirtTeam['SirtTeam']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sirtTeam['SirtTeam']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sirtTeam['SirtTeam']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sirtTeam['SirtTeam']['id']), null, __('Are you sure you want to delete # %s?', $sirtTeam['SirtTeam']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sirt Team'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sirt Members'), array('controller' => 'sirt_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Member'), array('controller' => 'sirt_members', 'action' => 'add')); ?> </li>
	</ul>
</div>
