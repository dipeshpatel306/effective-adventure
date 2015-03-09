<?php
App::uses('Group', 'Model');
$group = $this->Session->read('Auth.User.group_id');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Policies & Procedures');
} else {
	$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
	$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
}
$this->Html->addCrumb($policiesAndProceduresDocument['PoliciesAndProcedure']['name']);

?>



<div class="policiesAndProceduresDocuments view">
<h2><?php  echo __('Policies And Procedures Document'); ?></h2>
	<dl>
		<dt><?php echo __('Policy'); ?></dt>
		<dd>
			<?php echo ($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['policies_and_procedure_id']); ?>
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
			if(!empty($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment'])){
				$dir = $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment_dir'];
				$file = $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment'];

				$opnpLink =  preg_replace('/\/.*\//', '', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment']);
				echo $this->Html->link($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment'], array(
					'controller' => 'policies_and_procedures_documents',
					'action' => 'sendFile', $dir, $file));
			}
		?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo ($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo ($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group != Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?> </li>
		<?php endif; ?>
		<?php if($group == Group::ADMIN): ?>
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?> </li>
		<?php endif ?>
		<li><?php echo $this->Html->link(__('Edit Document'), array('action' => 'edit', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Document', 'name' => 'Document', 'id' => $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?></li>

	</ul>
	
	
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('controller' => 'policies_and_procedures', 'action' => 'index')); ?> </li>
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Policies And Procedure'), array('controller' => 'policies_and_procedures', 'action' => 'add')); ?> </li>

		<?php endif; ?>
		<?php endif; ?>
	</ul>
</div>
