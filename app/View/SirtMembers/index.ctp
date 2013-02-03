<div class="sirtMembers index">
	<h2><?php echo __('Sirt Members'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th><?php echo $this->Paginator->sort('responsibility'); ?></th>
			<th><?php echo $this->Paginator->sort('sirt_team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($sirtMembers as $sirtMember): ?>
	<tr>
		<td><?php echo h($sirtMember['SirtMember']['id']); ?>&nbsp;</td>
		<td><?php echo h($sirtMember['SirtMember']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($sirtMember['SirtMember']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($sirtMember['SirtMember']['company']); ?>&nbsp;</td>
		<td><?php echo h($sirtMember['SirtMember']['responsibility']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sirtMember['SirtTeam']['company_name'], array('controller' => 'sirt_teams', 'action' => 'view', $sirtMember['SirtTeam']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $sirtMember['SirtMember']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $sirtMember['SirtMember']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sirtMember['SirtMember']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sirtMember['SirtMember']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sirtMember['SirtMember']['id']), null, __('Are you sure you want to delete # %s?', $sirtMember['SirtMember']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sirt Member'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sirt Teams'), array('controller' => 'sirt_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Team'), array('controller' => 'sirt_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
