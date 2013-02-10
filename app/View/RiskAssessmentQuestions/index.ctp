<?php
$this->Html->addCrumb('Risk Assessment Questions');
?>

<div class="riskAssessmentQuestions index">
	<h2><?php echo __('Risk Assessment Questions'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('question_number'); ?></th>
			<th><?php echo $this->Paginator->sort('question'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('additional_information'); ?></th>
			<th><?php echo $this->Paginator->sort('how_to_answer_question'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($riskAssessmentQuestions as $riskAssessmentQuestion): ?>
	<tr>
		<td><?php echo h($riskAssessmentQuestion['RiskAssessmentQuestion']['question_number']); ?>&nbsp;</td>
		<td><?php echo h($riskAssessmentQuestion['RiskAssessmentQuestion']['question']); ?>&nbsp;</td>
		<!--<td><?php echo h($riskAssessmentQuestion['RiskAssessmentQuestion']['additional_information']); ?>&nbsp;</td>
		<td><?php echo h($riskAssessmentQuestion['RiskAssessmentQuestion']['how_to_answer_question']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $riskAssessmentQuestion['RiskAssessmentQuestion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $riskAssessmentQuestion['RiskAssessmentQuestion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $riskAssessmentQuestion['RiskAssessmentQuestion']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessmentQuestion['RiskAssessmentQuestion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Risk Assessment Question'), array('action' => 'add')); ?></li>
	</ul>
</div>
