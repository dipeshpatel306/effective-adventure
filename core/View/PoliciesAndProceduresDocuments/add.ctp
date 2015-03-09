<?php
App::uses('Group', 'Model');
$group = $this->Session->read('Auth.User.group_id');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Policies & Procedures');
} else {
	$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
	$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
}
$this->Html->addCrumb('Add Policy & Procedure Document');


	if(isset($clientId)){
		$selected = $clientId;
	} else{
		$selected = '';
		$clientId = '';
	}
?>


<div class="policiesAndProceduresDocuments form">
<?php echo $this->Form->create('PoliciesAndProceduresDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Policies And Procedures Document'); ?></legend>
	<?php
		echo $this->Form->input('policies_and_procedure_id');
		echo $this->Form->input('client_id', array('selected' => $selected));
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>

		<?php if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN): ?>
		<ul>
			<li><?php echo $this->Html->link(__('Back to client'), array('controller' => 'clients', 'action' => 'view', $clientId)); ?> </li>
		</ul>
		<?php if ($group == Group::ADMIN): ?>	
		<ul>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
		</ul>
		<?php endif;?>
		<?php endif; ?>

		<?php if ($group != Group::PARTNER_ADMIN): ?>
		<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('controller' => 'policies_and_procedures', 'action' => 'index')); ?> </li>
		<?php if($group == Group::ADMIN):?>
		<li><?php echo $this->Html->link(__('New Policies And Procedure'), array('controller' => 'policies_and_procedures', 'action' => 'add')); ?> </li>
		</ul>
		<?php endif ?>
		<?php endif; ?>


</div>
