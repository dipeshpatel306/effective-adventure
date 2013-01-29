<div class="riskAssessmentDocuments view">
<h2><?php  echo __('Risk Assessment Document'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($riskAssessmentDocument['RiskAssessmentDocument']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($riskAssessmentDocument['RiskAssessmentDocument']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($riskAssessmentDocument['RiskAssessmentDocument']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($riskAssessmentDocument['RiskAssessmentDocument']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($riskAssessmentDocument['Client']['name'], array('controller' => 'clients', 'action' => 'view', $riskAssessmentDocument['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $riskAssessmentDocument['RiskAssessmentDocument']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $riskAssessmentDocument['RiskAssessmentDocument']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($riskAssessmentDocument['RiskAssessmentDocument']['attachment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Risk Assessment Document'), array('action' => 'edit', $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Risk Assessment Document'), array('action' => 'delete', $riskAssessmentDocument['RiskAssessmentDocument']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Risk Assessment Documents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Risk Assessment Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
