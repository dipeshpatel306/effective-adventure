<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Risk Assessment Documents');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="riskAssessmentDocuments index">
	<h2><?php echo __('Risk Assessment Documents'); ?></h2>
	<table>
	<tr>
			<?php if($group == 1 ): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($riskAssessmentDocuments as $riskAssessmentDocument): ?>
	<tr>
		<?php if($group == 1): ?>
		<td>
			<?php echo $riskAssessmentDocument['Client']['name']; ?>
		</td>
		<?php endif; ?>
		<td><?php echo ($riskAssessmentDocument['RiskAssessmentDocument']['name']); ?>&nbsp;</td>
		<td>
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
		&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $riskAssessmentDocument['RiskAssessmentDocument']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $riskAssessmentDocument['RiskAssessmentDocument']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $riskAssessmentDocument['RiskAssessmentDocument']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessmentDocument['RiskAssessmentDocument']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Risk Assessment Document'), array('action' => 'add')); ?></li>
		<?php endif; ?>

	</ul>
</div>
