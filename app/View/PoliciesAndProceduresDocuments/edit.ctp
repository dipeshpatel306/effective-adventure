<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
$this->Html->addCrumb('Edit Policy & Procedure Document');

	$group = $this->Session->read('Auth.User.group_id');
	$client = $this->Session->read('Auth.User.client_id');
?>

<div class="policiesAndProceduresDocuments form">
<?php echo $this->Form->create('PoliciesAndProceduresDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Policies And Procedures Document'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('policies_and_procedure_id', array('disabled' => true));

		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id');
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

?>
	<label for='currentDoc' class='labelNew'>Current Document</label>
	<div class='currentDoc'><?php echo $doc ?></div>
	<?php
	 	
		echo $this->Form->input('document', array('label' => 'Replace Document', 'type' => 'file'));
		echo $this->Form->input('document_dir', array('type' => 'hidden'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $this->Form->value('PoliciesAndProceduresDocument.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PoliciesAndProceduresDocument.id'))); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('controller' => 'policies_and_procedures', 'action' => 'index')); ?> </li>

		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Policies And Procedure'), array('controller' => 'policies_and_procedures', 'action' => 'add')); ?> </li>

		<?php endif; ?>
	</ul>
</div>
