<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Removed');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiRemoved index">
	<h2><?php echo __('Ephi Removed'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
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
		<td><?php echo $this->Time->format('m/d/y', $ephiRemoved['EphiRemoved']['date']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('g:i a', $ephiRemoved['EphiRemoved']['time']); ?>&nbsp;</td>
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
		<?php if($group == 1 || $group == 2): ?>		
		<li><?php echo $this->Html->link(__('New Ephi Removed'), array('action' => 'add')); ?></li>
		<?php endif; ?>
	</ul>
</div>
