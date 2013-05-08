<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
$this->Html->addCrumb('Add Policy & Procedure Document');

	$group = $this->Session->read('Auth.User.group_id');
?>


<div class="policiesAndProceduresDocuments form">
<?php echo $this->Form->create('PoliciesAndProceduresDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Policies And Procedures Document'); ?></legend>
	<?php
		echo $this->Form->input('policies_and_procedure_id');
		echo $this->Form->input('client_id');
		echo $this->Form->input('document', array('type' => 'file'));
		echo $this->Form->input('document_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>

		<?php if($group == 1): ?>
		<ul>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
		</ul>
		<?php endif;?>

		<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('controller' => 'policies_and_procedures', 'action' => 'index')); ?> </li>
		<?php if($group == 1):?>
		<li><?php echo $this->Html->link(__('New Policies And Procedure'), array('controller' => 'policies_and_procedures', 'action' => 'add')); ?> </li>
		</ul>
		<?php endif ?>


</div>
