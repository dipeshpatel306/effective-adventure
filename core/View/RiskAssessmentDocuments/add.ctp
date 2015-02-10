<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Risk Assessment Documents', '/risk_assessment_documents');
$this->Html->addCrumb('Add Risk Assessment Document');

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
<div class="riskAssessmentDocuments form">
<?php echo $this->Form->create('RiskAssessmentDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Risk Assessment Document'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '40'));

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}

		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Attachment'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
	<div class='submit'>
        <?php 
             echo $this->Form->submit('Save', array('div' => false));
             if ($group == Group::ADMIN) {
                 echo $this->Form->submit('Save and next', array('div' => false, 'class' => 'savenext', 'name' => 'next'));
             }
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Risk Assessment Documents'), array('action' => 'index')); ?></li>

	</ul>
</div>
