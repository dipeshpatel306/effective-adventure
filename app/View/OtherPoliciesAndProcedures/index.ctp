<?php
$this->Html->addCrumb('Other Policies & Procedures');
?>
<div class="otherPoliciesAndProcedures index">
	<h2><?php echo __('Other Policies And Procedures'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('media'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($otherPoliciesAndProcedures as $otherPoliciesAndProcedure): ?>
	<tr>
		<td><?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otherPoliciesAndProcedure['Client']['name'], array('controller' => 'clients', 'action' => 'view', $otherPoliciesAndProcedure['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a',$otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a',$otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['modified']); ?>&nbsp;</td>
		<td><?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['attachment']); ?>&nbsp;</td>
		<td><?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['media']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id']), null, __('Are you sure you want to delete # %s?', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Other Policies And Procedure'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
