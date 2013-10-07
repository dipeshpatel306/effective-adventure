<?php
$this->Html->addCrumb('Risk Assessments');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="riskAssessments index">
	<h2><?php echo __('Risk Assessments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('question_1'); ?></th>
			<th><?php echo $this->Paginator->sort('question_2'); ?></th>
			<th><?php echo $this->Paginator->sort('question_3'); ?></th>
			<th><?php echo $this->Paginator->sort('question_4'); ?></th>
			<th><?php echo $this->Paginator->sort('question_5'); ?></th>
			<th><?php echo $this->Paginator->sort('question_6'); ?></th>
			<th><?php echo $this->Paginator->sort('question_7'); ?></th>
			<th><?php echo $this->Paginator->sort('question_8'); ?></th>
			<th><?php echo $this->Paginator->sort('question_9'); ?></th>
			<th><?php echo $this->Paginator->sort('question_10'); ?></th>
			<th><?php echo $this->Paginator->sort('question_11'); ?></th>
			<th><?php echo $this->Paginator->sort('question_12'); ?></th>
			<th><?php echo $this->Paginator->sort('question_13'); ?></th>
			<th><?php echo $this->Paginator->sort('question_14'); ?></th>
			<th><?php echo $this->Paginator->sort('question_15'); ?></th>
			<th><?php echo $this->Paginator->sort('question_16'); ?></th>
			<th><?php echo $this->Paginator->sort('question_17'); ?></th>
			<th><?php echo $this->Paginator->sort('question_18'); ?></th>
			<th><?php echo $this->Paginator->sort('question_19'); ?></th>
			<th><?php echo $this->Paginator->sort('question_20'); ?></th>
			<th><?php echo $this->Paginator->sort('question_21'); ?></th>
			<th><?php echo $this->Paginator->sort('question_22'); ?></th>
			<th><?php echo $this->Paginator->sort('question_23'); ?></th>
			<th><?php echo $this->Paginator->sort('question_24'); ?></th>
			<th><?php echo $this->Paginator->sort('question_25'); ?></th>
			<th><?php echo $this->Paginator->sort('question_26'); ?></th>
			<th><?php echo $this->Paginator->sort('question_27'); ?></th>
			<th><?php echo $this->Paginator->sort('question_28'); ?></th>
			<th><?php echo $this->Paginator->sort('question_29'); ?></th>
			<th><?php echo $this->Paginator->sort('question_30'); ?></th>
			<th><?php echo $this->Paginator->sort('question_31'); ?></th>
			<th><?php echo $this->Paginator->sort('question_32'); ?></th>
			<th><?php echo $this->Paginator->sort('question_33'); ?></th>
			<th><?php echo $this->Paginator->sort('question_34'); ?></th>
			<th><?php echo $this->Paginator->sort('question_35'); ?></th>
			<th><?php echo $this->Paginator->sort('question_36'); ?></th>
			<th><?php echo $this->Paginator->sort('question_37'); ?></th>
			<th><?php echo $this->Paginator->sort('question_38'); ?></th>
			<th><?php echo $this->Paginator->sort('question_39'); ?></th>
			<th><?php echo $this->Paginator->sort('question_40'); ?></th>
			<th><?php echo $this->Paginator->sort('question_41'); ?></th>
			<th><?php echo $this->Paginator->sort('question_42'); ?></th>
			<th><?php echo $this->Paginator->sort('question_43'); ?></th>
			<th><?php echo $this->Paginator->sort('question_44'); ?></th>
			<th><?php echo $this->Paginator->sort('question_45'); ?></th>
			<th><?php echo $this->Paginator->sort('question_46'); ?></th>
			<th><?php echo $this->Paginator->sort('question_47'); ?></th>
			<th><?php echo $this->Paginator->sort('question_48'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($riskAssessments as $riskAssessment): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($riskAssessment['Client']['name'], array('controller' => 'clients', 'action' => 'view', $riskAssessment['Client']['id'])); ?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $riskAssessment['RiskAssessment']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $riskAssessment['RiskAssessment']['modified']); ?>&nbsp;</td>
		<!--<td><?php echo ($riskAssessment['RiskAssessment']['question_1']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_2']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_3']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_4']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_5']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_6']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_7']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_8']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_9']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_10']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_11']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_12']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_13']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_14']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_15']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_16']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_17']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_18']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_19']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_20']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_21']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_22']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_23']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_24']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_25']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_26']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_27']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_28']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_29']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_30']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_31']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_32']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_33']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_34']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_35']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_36']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_37']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_38']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_39']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_40']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_41']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_42']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_43']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_44']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_45']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_46']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_47']); ?>&nbsp;</td>
		<td><?php echo ($riskAssessment['RiskAssessment']['question_48']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $riskAssessment['RiskAssessment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $riskAssessment['RiskAssessment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $riskAssessment['RiskAssessment']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessment['RiskAssessment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Take Risk Assessment'), array('action' => 'take_risk_assessment')); ?></li>

	</ul>
</div>
