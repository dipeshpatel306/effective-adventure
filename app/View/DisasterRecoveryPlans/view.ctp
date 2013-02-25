<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Diaster Recovery Plans', '/disaster_recovery_plans');
$this->Html->addCrumb($disasterRecoveryPlan['DisasterRecoveryPlan']['name']);
?>
<div class="disasterRecoveryPlans view">
<h2><?php  echo __('Disaster Recovery Plan'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($disasterRecoveryPlan['Client']['name'], array('controller' => 'clients', 'action' => 'view', $disasterRecoveryPlan['Client']['id'])); ?>
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
			<?php echo h($disasterRecoveryPlan['DisasterRecoveryPlan']['attachment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Disaster Recovery Plans'), array('action' => 'index')); ?> </li>		
		
		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('Edit Disaster Recovery Plan'), array('action' => 'edit', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Disaster Recovery Plan'), array('action' => 'delete', $disasterRecoveryPlan['DisasterRecoveryPlan']['id']), null, __('Are you sure you want to delete # %s?', $disasterRecoveryPlan['DisasterRecoveryPlan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Disaster Recovery Plan'), array('action' => 'add')); ?> </li>
		<?php endif; ?>	
	
	</ul>
</div>
