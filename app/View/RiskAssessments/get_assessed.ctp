<?php
	$options = array('No' => 'No', 'Yes' => 'Yes', 'N/A');
	
	// format Risk Assessment Question
	
	
	function raq($id, $RaQ){ //TODO replace this function with something less cpu intensive
			
			//pr($id, $RaQ);
		echo '<h3>Question ' . $RaQ[$id]["RiskAssessmentQuestion"]["question_number"] . '<br />' .
			$RaQ[$id]['RiskAssessmentQuestion']['question'] . '</h3>';
		echo '<p><b>Additional Information</b><br />' . $RaQ[$id]['RiskAssessmentQuestion']['additional_information'] . '</p>';
		echo '<p><b>How to Answer Question</b><br />' . $RaQ[$id]['RiskAssessmentQuestion']['how_to_answer_question'] . '</p>';
	}

	
?>

<div class="riskAssessments form">
<?php echo $this->Form->create('RiskAssessment'); ?>


	<fieldset>
		<legend><?php echo __('HSN Risk Assessment Questionnaire'); ?></legend>
	<?php
		// /echo $this->Form->input('client_id');
		
		raq(0, $RaQ);
		echo $this->Form->input('question_1', array('label' => '', 'options' => $options, 'default' => ''));
		raq(1, $RaQ);
		echo $this->Form->input('question_2', array('label' => '', 'options' => $options, 'default' => ''));
		raq(2, $RaQ);
		echo $this->Form->input('question_3', array('label' => '', 'options' => $options, 'default' => ''));
		raq(3, $RaQ);
		echo $this->Form->input('question_4', array('label' => '', 'options' => $options, 'default' => ''));
		raq(4, $RaQ);
		echo $this->Form->input('question_5', array('label' => '', 'options' => $options, 'default' => ''));
		raq(5, $RaQ);
		echo $this->Form->input('question_6', array('label' => '', 'options' => $options, 'default' => ''));
		raq(6, $RaQ);		
		echo $this->Form->input('question_7', array('label' => '', 'options' => $options, 'default' => ''));
		raq(7, $RaQ);		
		echo $this->Form->input('question_8', array('label' => '', 'options' => $options, 'default' => ''));
		raq(8, $RaQ);
		echo $this->Form->input('question_9', array('label' => '', 'options' => $options, 'default' => ''));
		raq(9, $RaQ);
		echo $this->Form->input('question_10', array('label' => '', 'options' => $options, 'default' => ''));
		raq(10, $RaQ);
		echo $this->Form->input('question_11', array('label' => '', 'options' => $options, 'default' => ''));
		raq(11, $RaQ);
		echo $this->Form->input('question_12', array('label' => '', 'options' => $options, 'default' => ''));
		raq(12, $RaQ);
		echo $this->Form->input('question_13', array('label' => '', 'options' => $options, 'default' => ''));
		raq(13, $RaQ);
		echo $this->Form->input('question_14', array('label' => '', 'options' => $options, 'default' => ''));
		raq(14, $RaQ);
		echo $this->Form->input('question_15', array('label' => '', 'options' => $options, 'default' => ''));
		raq(15, $RaQ);
		echo $this->Form->input('question_16', array('label' => '', 'options' => $options, 'default' => ''));
		raq(16, $RaQ);
		echo $this->Form->input('question_17', array('label' => '', 'options' => $options, 'default' => ''));
		raq(17, $RaQ);
		echo $this->Form->input('question_18', array('label' => '', 'options' => $options, 'default' => ''));
		raq(18, $RaQ);
		echo $this->Form->input('question_19', array('label' => '', 'options' => $options, 'default' => ''));
		raq(19, $RaQ);
		echo $this->Form->input('question_20', array('label' => '', 'options' => $options, 'default' => ''));
		raq(20, $RaQ);
		echo $this->Form->input('question_21', array('label' => '', 'options' => $options, 'default' => ''));
		raq(21, $RaQ);
		echo $this->Form->input('question_22', array('label' => '', 'options' => $options, 'default' => ''));
		raq(22, $RaQ);
		echo $this->Form->input('question_23', array('label' => '', 'options' => $options, 'default' => ''));
		raq(23, $RaQ);
		echo $this->Form->input('question_24', array('label' => '', 'options' => $options, 'default' => ''));
		raq(24, $RaQ);
		echo $this->Form->input('question_25', array('label' => '', 'options' => $options, 'default' => ''));
		raq(25, $RaQ);
		echo $this->Form->input('question_26', array('label' => '', 'options' => $options, 'default' => ''));
		raq(26, $RaQ);
		echo $this->Form->input('question_27', array('label' => '', 'options' => $options, 'default' => ''));
		raq(27, $RaQ);
		echo $this->Form->input('question_28', array('label' => '', 'options' => $options, 'default' => ''));
		raq(28, $RaQ);
		echo $this->Form->input('question_29', array('label' => '', 'options' => $options, 'default' => ''));
		raq(29, $RaQ);
		echo $this->Form->input('question_30', array('label' => '', 'options' => $options, 'default' => ''));
		raq(30, $RaQ);
		echo $this->Form->input('question_31', array('label' => '', 'options' => $options, 'default' => ''));
		raq(31, $RaQ);
		echo $this->Form->input('question_32', array('label' => '', 'options' => $options, 'default' => ''));
		raq(32, $RaQ);
		echo $this->Form->input('question_33', array('label' => '', 'options' => $options, 'default' => ''));
		raq(33, $RaQ);
		echo $this->Form->input('question_34', array('label' => '', 'options' => $options, 'default' => ''));
		raq(34, $RaQ);
		echo $this->Form->input('question_35', array('label' => '', 'options' => $options, 'default' => ''));
		raq(35, $RaQ);
		echo $this->Form->input('question_36', array('label' => '', 'options' => $options, 'default' => ''));
		raq(36, $RaQ);
		echo $this->Form->input('question_37', array('label' => '', 'options' => $options, 'default' => ''));
		raq(37, $RaQ);
		echo $this->Form->input('question_38', array('label' => '', 'options' => $options, 'default' => ''));
		raq(38, $RaQ);
		echo $this->Form->input('question_39', array('label' => '', 'options' => $options, 'default' => ''));
		raq(39, $RaQ);
		echo $this->Form->input('question_40', array('label' => '', 'options' => $options, 'default' => ''));
		raq(40, $RaQ);
		echo $this->Form->input('question_41', array('label' => '', 'options' => $options, 'default' => ''));
		raq(41, $RaQ);
		echo $this->Form->input('question_42', array('label' => '', 'options' => $options, 'default' => ''));
		raq(42, $RaQ);
		echo $this->Form->input('question_43', array('label' => '', 'options' => $options, 'default' => ''));
		raq(43, $RaQ);
		echo $this->Form->input('question_44', array('label' => '', 'options' => $options, 'default' => ''));
		raq(44, $RaQ);
		echo $this->Form->input('question_45', array('label' => '', 'options' => $options, 'default' => ''));
		raq(45, $RaQ);
		echo $this->Form->input('question_46', array('label' => '', 'options' => $options, 'default' => ''));
		raq(46, $RaQ);
		echo $this->Form->input('question_47', array('label' => '', 'options' => $options, 'default' => ''));
		raq(47, $RaQ);
		echo $this->Form->input('question_48', array('label' => '', 'options' => $options, 'default' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
