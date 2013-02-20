<?php
$this->Html->addCrumb('Partners');
?>

<div class="partners index">
	<h2><?php echo __('Partners'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('cell'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($partners as $partner): ?>
	<tr>
		<!--<td><?php echo h($partner['Partner']['id']); ?>&nbsp;</td>-->
		<td><?php echo h($partner['Partner']['company']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['name']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['email']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['phone']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['cell']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['address']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['city']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['state']); ?>&nbsp;</td>
		<td><?php echo h($partner['Partner']['zip']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $partner['Partner']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $partner['Partner']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $partner['Partner']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $partner['Partner']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $partner['Partner']['id']), null, __('Are you sure you want to delete # %s?', $partner['Partner']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Partner'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
