<?php
$this->Html->addCrumb('View Risk Assessment - ' . $riskAssessment['Client']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="riskAssessments view">
<h2><?php  echo __('Risk Assessment'); ?></h2>


	<div>
		<h4 class='highlight'>Client</h4>
		<p>
			<?php echo $this->Html->link($riskAssessment['Client']['name'], array('controller' => 'clients', 'action' => 'view', $riskAssessment['Client']['id'])); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Created'); ?></h4>
		<p>
			<?php echo $this->Time->format('m/d/y g:i a', $riskAssessment['RiskAssessment']['created']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Modified'); ?></h4>
		<p>
			<?php echo $this->Time->format('m/d/y g:i a', $riskAssessment['RiskAssessment']['modified']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[0]['RiskAssessmentQuestions']['question'] ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_1']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[1]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_2']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[2]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_3']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[3]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_4']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[4]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_5']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[5]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_6']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[6]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_7']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[7]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_8']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[8]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_9']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[9]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_10']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[10]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_11']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[11]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_12']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[12]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_13']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[13]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_14']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[14]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_15']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[15]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_16']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[16]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_17']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[17]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_18']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[18]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_19']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[19]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_20']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[20]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_21']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[21]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_22']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[22]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_23']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[23]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_24']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[24]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_25']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[25]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_26']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[26]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_27']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[27]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_28']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[28]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_29']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[29]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_30']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[30]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_31']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[31]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_32']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[32]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_33']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[33]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_34']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[34]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_35']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[35]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_36']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[36]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_37']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[37]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_38']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[38]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_39']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[39]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_40']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[40]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_41']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[41]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_42']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[42]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_43']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[43]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_44']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[44]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_45']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[45]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_46']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[46]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_47']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo $ra[47]['RiskAssessmentQuestions']['question']; ?></h4>
		<p>
			<?php echo ($riskAssessment['RiskAssessment']['question_48']); ?>
			&nbsp;
		</p>
	</div>
</div>
<div class="actions">
	<h4 class='highlight'><?php echo __('Actions'); ?></h4>
	<ul>

		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Risk Assessment'), array('action' => 'edit', $riskAssessment['RiskAssessment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Risk Assessment'), array('action' => 'delete', $riskAssessment['RiskAssessment']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessment['RiskAssessment']['id'])); ?> </li>

		<?php endif; ?>

	</ul>
</div>
