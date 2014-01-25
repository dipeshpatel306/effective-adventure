<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Other Policies & Procedures', '/other_policies_and_procedures');
$this->Html->addCrumb('Add Other Policy & Procedure');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
	if(isset($clientId)){
		$selected = $clientId;
	} else{
		$selected = '';
		$clientId = '';
	}
?>
<div class="otherPoliciesAndProcedures form">
<?php echo $this->Form->create('OtherPoliciesAndProcedure', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Other Policies And Procedure'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '50'));
		echo $this->Form->input('details', array('type' => 'text', 'rows' => '5', 'cols' => '50'));

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Attachment - (pdf, doc, docx, dot files only)'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
		// /echo $this->Form->input('media');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Other Policies And Procedures'), array('action' => 'index')); ?></li>

	</ul>
</div>
