<?php
$this->Html->addCrumb('Risk Assessments', '/risk_assessments');
$this->Html->addCrumb('Add Risk Assessment');

	$options = array('No' => 'No', 'Yes' => 'Yes', 'N/A');
	
	// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="riskAssessments form">
<?php echo $this->Form->create('RiskAssessment'); ?>
	<fieldset>
		<legend><?php echo __('HSN Risk Assessment Questionnaire'); ?></legend>
	<?php
		
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}
		
		
		//pr($RaQ);
		echo $this->Form->input('question_1', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_2', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_3', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_4', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_5', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_6', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_7', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_8', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_9', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_10', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_11', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_12', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_13', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_14', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_15', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_16', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_17', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_18', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_19', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_20', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_21', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_22', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_23', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_24', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_25', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_26', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_27', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_28', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_29', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_30', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_31', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_32', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_33', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_34', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_35', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_36', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_37', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_38', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_39', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_40', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_41', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_42', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_43', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_44', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_45', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_46', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_47', array('options' => $options, 'default' => ''));
		echo $this->Form->input('question_48', array('options' => $options, 'default' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<?php if($group == 1): ?>
				<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?></li>
		<?php endif; ?>


	</ul>
</div>
