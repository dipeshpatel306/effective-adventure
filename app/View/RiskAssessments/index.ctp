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
		<td class="actions">
			<?php echo $this->Html->link(__('View/Edit'), array('action' => 'edit', $riskAssessment['RiskAssessment']['id'])); ?>
			<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Risk Assessment', 'id' => $riskAssessment['RiskAssessment']['id'])); ?>
		    <?php echo $this->Html->link(__('Export'), array('action' => 'view', $riskAssessment['RiskAssessment']['id'], 'ext' => 'csv')); ?>
		    <?php echo $this->Html->link(__('Print'), array('action' => 'view_print', $riskAssessment['RiskAssessment']['id'])); ?>
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
