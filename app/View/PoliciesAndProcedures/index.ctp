<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('HIPAA Policies & Procedures');

	$group = $this->Session->read('Auth.User.group_id');
?>

<div class="policiesAndProcedures index">
	<h2><?php echo __('HIPAA Policies And Procedures'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('id', 'Policy'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($policiesAndProcedures as $policiesAndProcedure): ?>
	<tr>
		<td><?php echo ($policiesAndProcedure['PoliciesAndProcedure']['id']); ?>&nbsp;</td>
		<td><b><?php echo ($policiesAndProcedure['PoliciesAndProcedure']['name']); ?></b>&nbsp;</td>
		<td><?php echo $policiesAndProcedure['PoliciesAndProcedure']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?>
			<?php if($group == 1 ): ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?>
			<?php endif; ?>
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
		<li><?php echo $this->Html->link(__('Back to Dashboard'), array('controller' => 'dashboard')); ?></li>
	</ul>
	
	<?php if($group == 1): ?>
	<ul>
	    <li><?php echo $this->Html->link(__('New Policy'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'policies_and_procedures_documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Documents'), array('controller' => 'policies_and_procedures_documents', 'action' => 'add')); ?> </li>
	</ul>

	<?php endif; ?>
</div>
