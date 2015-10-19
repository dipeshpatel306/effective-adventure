<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Disaster Recovery Plans');
} else {
	$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
	$this->Html->addCrumb('Disaster Recovery Plans', '/disaster_recovery_plans');
}
$this->Html->addCrumb($disasterRecoveryPlan['DisasterRecoveryPlan']['name']);


?>
<div class="disasterRecoveryPlans view">
<h2><?php  echo __('Disaster Recovery Plan'); ?></h2>
	<dl>
		<?php if($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $disasterRecoveryPlan['Client']['name']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>

		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($disasterRecoveryPlan['DisasterRecoveryPlan']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo ($disasterRecoveryPlan['DisasterRecoveryPlan']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php
			if(!empty($disasterRecoveryPlan['DisasterRecoveryPlan']['date'])){
			echo $this->Time->format('m/d/y', $disasterRecoveryPlan['DisasterRecoveryPlan']['date']);
			}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $disasterRecoveryPlan['DisasterRecoveryPlan']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $disasterRecoveryPlan['DisasterRecoveryPlan']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
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
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $disasterRecoveryPlan['DisasterRecoveryPlan']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Disaster Recovery Plans'), array('action' => 'index')); ?> </li>
		<?php endif; ?>

		<?php if(($group == Group::ADMIN || $group == Group::PARTNER_ADMIN || $group == Group::MANAGER) && ($acct != 'AYCE Training')): ?>
		<?php if ($group != Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('New Disaster Recovery Plan'), array('action' => 'add')); ?> </li>
		<?php endif; ?>
		<li><?php echo $this->Html->link(__('Edit Disaster Recovery Plan'), array('action' => 'edit', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Disaster Recovery Plan', 'name' => 'Disaster Recovery Plan', 'id' => $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?></li>

		<?php endif; ?>

	</ul>
</div>
