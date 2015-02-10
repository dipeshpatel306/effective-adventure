<?php
$this->Html->addCrumb('View Risk Assessment Questions');
?>
<div class="riskAssessmentQuestions view">
<h2><?php  echo __('Risk Assessment Question'); ?></h2>
	<dl>
		<dt><?php echo __('Question Number'); ?></dt>
		<dd>
			<?php echo ($riskAssessmentQuestion['RiskAssessmentQuestion']['question_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo ($riskAssessmentQuestion['RiskAssessmentQuestion']['question']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Additional Information'); ?></dt>
		<dd>
			<?php echo ($riskAssessmentQuestion['RiskAssessmentQuestion']['additional_information']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('How To Answer Question'); ?></dt>
		<dd>
			<?php echo ($riskAssessmentQuestion['RiskAssessmentQuestion']['how_to_answer_question']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Risk Assessment Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Risk Assessment Question'), array('action' => 'add')); ?> </li>		
		<li><?php echo $this->Html->link(__('Edit Risk Assessment Question'), array('action' => 'edit', $riskAssessmentQuestion['RiskAssessmentQuestion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Risk Assessment Question'), array('action' => 'delete', $riskAssessmentQuestion['RiskAssessmentQuestion']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessmentQuestion['RiskAssessmentQuestion']['id'])); ?> </li>

	</ul>
</div>
