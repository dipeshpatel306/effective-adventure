<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Other Policies & Procedures', '/other_policies_and_procedures');
$this->Html->addCrumb('Edit Other Policy & Procedure');
?>
<div class="otherPoliciesAndProcedures form">
<?php echo $this->Form->create('OtherPoliciesAndProcedure', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Other Policies And Procedure'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('details', array('class' => 'ckeditor'));
		echo $this->Form->input('client_id');
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('media');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OtherPoliciesAndProcedure.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OtherPoliciesAndProcedure.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Other Policies And Procedures'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
