<?php
$this->Html->addCrumb('View Risk Assessment - ' . $riskAssessment['Client']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="riskAssessments view">
<h2><?php  echo __('Risk Assessment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($riskAssessment['Client']['name'], array('controller' => 'clients', 'action' => 'view', $riskAssessment['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $riskAssessment['RiskAssessment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $riskAssessment['RiskAssessment']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 1'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 2'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 3'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 4'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 5'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 6'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 7'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_7']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 8'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_8']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 9'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_9']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 10'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_10']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 11'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_11']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 12'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_12']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 13'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_13']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 14'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_14']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 15'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_15']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 16'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_16']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 17'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_17']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 18'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_18']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 19'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_19']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 20'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_20']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 21'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_21']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 22'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_22']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 23'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_23']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 24'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_24']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 25'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_25']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 26'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_26']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 27'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_27']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 28'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_28']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 29'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_29']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 30'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_30']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 31'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_31']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 32'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_32']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 33'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_33']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 34'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_34']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 35'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_35']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 36'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_36']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 37'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_37']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 38'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_38']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 39'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_39']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 40'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_40']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 41'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_41']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 42'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_42']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 43'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_43']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 44'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_44']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 45'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_45']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 46'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_46']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 47'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_47']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question 48'); ?></dt>
		<dd>
			<?php echo h($riskAssessment['RiskAssessment']['question_48']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('Edit Risk Assessment'), array('action' => 'edit', $riskAssessment['RiskAssessment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Risk Assessment'), array('action' => 'delete', $riskAssessment['RiskAssessment']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessment['RiskAssessment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?> </li>		
		<?php endif; ?>

	</ul>
</div>
