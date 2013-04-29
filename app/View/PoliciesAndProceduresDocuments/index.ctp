<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Policies & Procedures Documents');

	$group = $this->Session->read('Auth.User.group_id');
?>


<div class="policiesAndProceduresDocuments index">
	<h2><?php echo __('Policies And Procedures Documents'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('policies_and_procedure_id'); ?></th>

			<th><?php echo $this->Paginator->sort('document'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($policiesAndProceduresDocuments as $policiesAndProceduresDocument): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($policiesAndProceduresDocument['Client']['name'], array('controller' => 'clients', 'action' => 'view', $policiesAndProceduresDocument['Client']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($policiesAndProceduresDocument['PoliciesAndProcedure']['name'], array('controller' => 'policies_and_procedures', 'action' => 'view', $policiesAndProceduresDocument['PoliciesAndProcedure']['id'])); ?>
		</td>

		<td>
		<?php
			$docLink =  preg_replace('/\/.*\//', '', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document']);
			echo $this->Html->link($docLink, $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document']);
		?>
		<td><?php echo $this->Time->format('m/d/y g:i a',$policiesAndProceduresDocument['PoliciesAndProceduresDocument']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a',$policiesAndProceduresDocument['PoliciesAndProceduresDocument']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id']), null, __('Are you sure you want to delete # %s?', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?>
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

		<?php if($group ==1): ?>
		<ul>
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?></li>
		</ul>
		<?php endif; ?>
		<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('controller' => 'policies_and_procedures', 'action' => 'index')); ?> </li>
		<?php if($group == 1): ?>
		<ul>
		<li><?php echo $this->Html->link(__('New Policies And Procedure'), array('controller' => 'policies_and_procedures', 'action' => 'add')); ?> </li>
		</ul>
		<?php endif; ?>
	</ul>
</div>
