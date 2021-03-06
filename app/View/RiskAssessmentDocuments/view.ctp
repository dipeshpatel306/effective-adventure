<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Risk Assessment Documents', '/risk_assessment_documents');
$this->Html->addCrumb($riskAssessmentDocument['RiskAssessmentDocument']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="riskAssessmentDocuments view">
<h2><?php  echo __('Risk Assessment Document'); ?></h2>
	<dl>
		<?php if ($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $riskAssessmentDocument['Client']['name']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($riskAssessmentDocument['RiskAssessmentDocument']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo ($riskAssessmentDocument['RiskAssessmentDocument']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo ($riskAssessmentDocument['RiskAssessmentDocument']['details']); ?>
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
		<?php
			if(!empty($riskAssessmentDocument['RiskAssessmentDocument']['attachment'])){
				$dir = $riskAssessmentDocument['RiskAssessmentDocument']['attachment_dir'] ;
				$file = $riskAssessmentDocument['RiskAssessmentDocument']['attachment'];

				$opnpLink =  preg_replace('/\/.*\//', '', $riskAssessmentDocument['RiskAssessmentDocument']['attachment']);
				echo $this->Html->link($riskAssessmentDocument['RiskAssessmentDocument']['attachment'], array(
					'controller' => 'risk_assessment_documents',
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
		<li><?php echo $this->Html->link(__('List Risk Assessment Documents'), array('action' => 'index')); ?> </li>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('New Risk Assessment Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Risk Assessment Document'), array('action' => 'edit', $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Risk Assessment Document', 'name' => 'Risk Assessment Document', 'id' => $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?></li>

		<?php endif; ?>


	</ul>
</div>
