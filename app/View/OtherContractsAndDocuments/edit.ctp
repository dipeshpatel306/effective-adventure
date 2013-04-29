<?php
$this->Html->addCrumb('Other Contracts & Documents', '/other_contracts_and_documents');
$this->Html->addCrumb('Edit Other Contract & Document');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="otherContractsAndDocuments form">
<?php echo $this->Form->create('OtherContractsAndDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Other Contracts And Documents'); ?></legend>
	<?php
		echo $this->Form->input('id');

		echo $this->Form->input('name');
		echo $this->Form->input('description', array('class' => 'ckeditor'));
		echo $this->Form->input('date', array('class' => 'datePick'));
		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Attachment - (pdf, doc, docx, dot files only)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Other Contracts And Documents'), array('action' => 'index')); ?></li>
		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OtherContractsAndDocument.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OtherContractsAndDocument.id'))); ?></li>

		<?php endif; ?>


	</ul>
</div>
