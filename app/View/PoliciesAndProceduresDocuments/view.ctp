<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
$this->Html->addCrumb($policiesAndProceduresDocument['PoliciesAndProcedure']['name']);

	$group = $this->Session->read('Auth.User.group_id');
?>



<div class="policiesAndProceduresDocuments view">
<h2><?php  echo __('Policies And Procedures Document'); ?></h2>
	<dl>
		<dt><?php echo __('Policy'); ?></dt>
		<dd>
			<?php echo h($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policies And Procedure'); ?></dt>
		<dd>
			<?php echo $this->Html->link($policiesAndProceduresDocument['PoliciesAndProcedure']['name'], array('controller' => 'policies_and_procedures', 'action' => 'view', $policiesAndProceduresDocument['PoliciesAndProcedure']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $policiesAndProceduresDocument['Client']['name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document'); ?></dt>
		<dd>

		<?php
			if(!empty($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document'])){
				$dir = $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document_dir'];
				$file = $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document'];

				$opnpLink =  preg_replace('/\/.*\//', '', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document']);
				echo $this->Html->link($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document'], array(
					'controller' => 'policies_and_procedures_documents',
					'action' => 'sendFile', $dir, $file));
			}
		?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?> </li>
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?> </li>
		<?php endif ?>
		<li><?php echo $this->Html->link(__('Edit Document'), array('action' => 'edit', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id']), null, __('Are you sure you want to delete # %s?', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?> </li>

	</ul>

	<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('controller' => 'policies_and_procedures', 'action' => 'index')); ?> </li>
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Policies And Procedure'), array('controller' => 'policies_and_procedures', 'action' => 'add')); ?> </li>

		<?php endif; ?>
	</ul>
</div>
