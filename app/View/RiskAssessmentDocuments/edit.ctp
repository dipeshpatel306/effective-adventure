<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Risk Assessment Documents', '/risk_assessment_documents');
$this->Html->addCrumb('Edit Risk Assessment Document');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="riskAssessmentDocuments form">
<?php echo $this->Form->create('RiskAssessmentDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Risk Assessment Document'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
		echo $this->Form->input('details', array('type' => 'text', 'rows' => '5', 'cols' => '40'));

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}
?>
		<label for='currentDoc' class='labelNew'>Current Document</label>
		<div class='currentDoc'><?php echo $doc ?></div>
<?php 
		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Replace Document'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Risk Assessment Documents'), array('action' => 'index')); ?></li>

		<?php if($group == 1 || $group == 2): ?>	
		<li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Risk Assessment Document', 'id' => $this->Form->value('RiskAssessmentDocument.id'))); ?></li>
		<?php endif; ?>


	</ul>
</div>
