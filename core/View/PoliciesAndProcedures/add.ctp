<?php
$pnp_name = Configure::read('Theme.pnp_name');

$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb($pnp_name, '/policies_and_procedures');
$this->Html->addCrumb('Add Policy & Procedure');

	$group = $this->Session->read('Auth.User.group_id');

?>


<div class="policiesAndProcedures form">
<?php echo $this->Form->create('PoliciesAndProcedure'); ?>
	<fieldset>
		<legend><?php echo __('Add ' . $pnp_name); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('class' => 'ckeditor', 'rows' => '5', 'cols' => '40'));
		echo $this->Form->input('details', array('class' => 'ckeditor', 'rows' => '5', 'cols' => '40'));
		echo $this->Form->input('has_video', array('default' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('action' => 'index')); ?></li>
	</ul>
		<?php if($group == 1): ?>
	<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures Documents'), array('controller' => 'policies_and_procedures_documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies And Procedures Document'), array('controller' => 'policies_and_procedures_documents', 'action' => 'add')); ?> </li>
	</ul>
		<?php endif;?>

</div>
