<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Disaster Recovery Plans');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="disasterRecoveryPlans index">
	<h2><?php echo __('Disaster Recovery Plans'); ?></h2>
	<table>
	<tr>
		<?php if($group == Group::ADMIN): ?>
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
	foreach ($disasterRecoveryPlans as $disasterRecoveryPlan): ?>
	<tr>
		<?php if($group == Group::ADMIN): ?>


		<td>
			<?php echo $disasterRecoveryPlan['Client']['name']; ?>
		</td>
		<?php endif; ?>
		<td><?php echo ($disasterRecoveryPlan['DisasterRecoveryPlan']['name']); ?>&nbsp;</td>
		<td>
			<?php
			if(!empty($disasterRecoveryPlan['DisasterRecoveryPlan']['date'])){
							echo $this->Time->format('m/d/y', $disasterRecoveryPlan['DisasterRecoveryPlan']['date']);
			}
			?>
		</td>

		<td>
		<?php

			if(!empty($disasterRecoveryPlan['DisasterRecoveryPlan']['attachment'])){

				$dir = $disasterRecoveryPlan['DisasterRecoveryPlan']['attachment_dir'];
				$file = $disasterRecoveryPlan['DisasterRecoveryPlan']['attachment'];

				$opnpLink =  preg_replace('/\/.*\//', '', $disasterRecoveryPlan['DisasterRecoveryPlan']['attachment']);
				echo $this->Html->link($disasterRecoveryPlan['DisasterRecoveryPlan']['attachment'], array(
					'controller' => 'disaster_recovery_plans',
					'action' => 'sendFile', $dir, $file));
			}

		?>


		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $disasterRecoveryPlan['DisasterRecoveryPlan']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $disasterRecoveryPlan['DisasterRecoveryPlan']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $disasterRecoveryPlan['DisasterRecoveryPlan']['id']), null, __('Are you sure you want to delete # %s?', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?>
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
		<?php if($group == Group::ADMIN || $group == Group::MANAGER): ?>
		<li><?php echo $this->Html->link(__('New Disaster Recovery Plan'), array('action' => 'add')); ?></li>
		<?php endif; ?>
	</ul>
</div>
