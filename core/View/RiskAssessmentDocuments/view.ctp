<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

$ra_docs_name = Configure::read('Theme.ra_docs_name');
$ra_doc_name = Inflector::singularize($ra_docs_name);

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb($ra_docs_name);
} else {
	$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
	$this->Html->addCrumb($ra_docs_name, '/risk_assessment_documents');
}
$this->Html->addCrumb($riskAssessmentDocument['RiskAssessmentDocument']['name']);


?>
<div class="riskAssessmentDocuments view">
<h2><?php  echo __($ra_doc_name); ?></h2>
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
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $riskAssessmentDocument['RiskAssessmentDocument']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List ' . $ra_docs_name), array('action' => 'index')); ?> </li>
		<?php endif; ?>

		<?php if(($group == Group::ADMIN || $group == Group::MANAGER || $group == Group::PARTNER_ADMIN) && $acct != 'AYCE Training'): ?>
			<?php if ($group != Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('New ' . $ra_doc_name), array('action' => 'add')); ?> </li>
			<?php endif; ?>
		<li><?php echo $this->Html->link(__('Edit ' . $ra_doc_name), array('action' => 'edit', $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete ' . $ra_doc_name, 'name' => $ra_doc_name, 'id' => $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?></li>

		<?php endif; ?>


	</ul>
</div>
