<div class="businessAssociateAgreements index">
	<h2><?php echo __('Business Associate Agreements'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('contract_date'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($businessAssociateAgreements as $businessAssociateAgreement): ?>
	<tr>
		<td><?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['name']); ?>&nbsp;</td>
		<td><?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['email']); ?>&nbsp;</td>
		<td><?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['phone']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y', $businessAssociateAgreement['BusinessAssociateAgreement']['contract_date']); ?>&nbsp;</td>
		<td><?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['attachment']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($businessAssociateAgreement['Client']['name'], array('controller' => 'clients', 'action' => 'view', $businessAssociateAgreement['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $businessAssociateAgreement['BusinessAssociateAgreement']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $businessAssociateAgreement['BusinessAssociateAgreement']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $businessAssociateAgreement['BusinessAssociateAgreement']['id']), null, __('Are you sure you want to delete # %s?', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Business Associate Agreement'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
