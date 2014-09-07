<?php
App::uses('Group', 'Model');

// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($acct != 'Initial') {
	$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
}
$this->Html->addCrumb('Other Policies & Procedures');
?>
<div class="otherPoliciesAndProcedures index">
	<h2><?php echo __('Other Policies And Procedures'); ?></h2>
	<table>
	<tr>
			<?php if($group == 1): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($otherPoliciesAndProcedures as $otherPoliciesAndProcedure): ?>
	<tr>
		<?php if($group == 1): ?>
		<td>
			<?php echo $otherPoliciesAndProcedure['Client']['name']; ?>
		</td>
		<?php endif; ?>
		<td><?php echo ($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['name']); ?>&nbsp;</td>
		<td>
		<?php


			if(!empty($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['attachment'])){
				$dir = $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['attachment_dir'];
				$file = $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['attachment'];

				$opnpLink =  preg_replace('/\/.*\//', '', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['attachment']);
				echo $this->Html->link($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['attachment'], array(
					'controller' => 'other_policies_and_procedures',
					'action' => 'sendFile', $dir, $file));
			}

		?>
		</td>
		<td><?php echo $this->Time->format('m/d/y g:i a',$otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a',$otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id'])); ?>
			<?php if($group == Group::ADMIN || $group == GROUP::MANAGER) {
			    echo $this->Html->link(__('Edit'), array('action' => 'edit', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id']));
                echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Other Policy & Procedure', 'id' => $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id']));
			} ?>
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

		<?php if($group == Group::ADMIN || $group == GROUP::MANAGER): ?>
		<li><?php echo $this->Html->link(__('New Other Policies And Procedure'), array('action' => 'add')); ?></li>
		<?php endif; ?>

	</ul>
</div>
