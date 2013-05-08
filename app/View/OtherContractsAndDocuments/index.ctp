<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Other Contracts & Documents');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="otherContractsAndDocuments index">
	<h2><?php echo __('Other Contracts And Documents'); ?></h2>
	<table>
	<tr>
			<?php if($group ==1): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif; ?>

			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($otherContractsAndDocuments as $otherContractsAndDocument): ?>
	<tr>
		<?php if($group == 1 ): ?>
		<td>
			<?php echo $otherContractsAndDocument['Client']['name']; ?>
		</td>
		<?php endif; ?>

		<td><?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['name']); ?>&nbsp;</td>
		<td><?php
		if(!empty($otherContractsAndDocument['OtherContractsAndDocument']['date'])){
			echo $this->Time->format('m/d/y', $otherContractsAndDocument['OtherContractsAndDocument']['date']);
		}
		 ?>&nbsp;</td>
		<td>
		<?php

			if(!empty($otherContractsAndDocument['OtherContractsAndDocument']['attachment'])){
				$attr_dir = '/files/other_contracts_and_document/attachment/'.
				$otherContractsAndDocument['OtherContractsAndDocument']['attachment_dir'] . '/' .
				$otherContractsAndDocument['OtherContractsAndDocument']['attachment'];

				$opnpLink =  preg_replace('/\/.*\//', '', $otherContractsAndDocument['OtherContractsAndDocument']['attachment']);
				echo $this->Html->link($otherContractsAndDocument['OtherContractsAndDocument']['attachment'], $attr_dir);

			}

		?>
		&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherContractsAndDocument['OtherContractsAndDocument']['id']), null, __('Are you sure you want to delete # %s?', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Other Contracts And Document'), array('action' => 'add')); ?></li>
		<?php endif; ?>


	</ul>
</div>
