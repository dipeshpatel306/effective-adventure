<div class="documents index">
	<h2><?php echo __('Risk Assessment Documents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('document_type'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>-->
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($documents as $document): ?>
	<tr>
		<!--<td><?php echo h($document['Document']['id']); ?>&nbsp;</td>-->
		<td><?php echo h($document['Document']['name']); ?>&nbsp;</td>
		<!--<td><?php echo h($document['Document']['document_type']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($document['Document']['description']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['details']); ?>&nbsp;</td>-->
		<td><?php echo h($document['Document']['created']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['modified']); ?>&nbsp;</td>
		<td><?php echo h($document['Document']['attachment']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $document['Document']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $document['Document']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $document['Document']['id']), null, __('Are you sure you want to delete # %s?', $document['Document']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?></li>
	</ul>
</div>
