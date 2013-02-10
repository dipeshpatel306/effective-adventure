<?php
$this->Html->addCrumb('Take Risk Assessment');
	$options = array('No' => 'No', 'Yes' => 'Yes', 'N/A');
	
	// format Risk Assessment Question
	function raq($id, $RaQ){ //TODO replace this function with something less cpu intensive
			
		$raq =	$RaQ[$id]["RiskAssessmentQuestion"]["question_number"];
			//pr($id, $RaQ);
		echo '<h3>Question ' . $RaQ[$id]["RiskAssessmentQuestion"]["question_number"] . '<br />' .
			$RaQ[$id]['RiskAssessmentQuestion']['question'] . '</h3>';
		echo '<p><b>Additional Information</b><br />' . $RaQ[$id]['RiskAssessmentQuestion']['additional_information'] . '</p>';
		echo '<p><b>How to Answer Question</b><br />' . $RaQ[$id]['RiskAssessmentQuestion']['how_to_answer_question'] . '</p>';
	}
?>

<div class="riskAssessments form">
<?php echo $this->Form->create('RiskAssessment'); ?>
	
	<fieldset class="step step1">
		<?php 
		raq(0, $RaQ);
		echo $this->Form->input('question_1', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step2">
		<?php 
		raq(1, $RaQ);
		echo $this->Form->input('question_2', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step3">
		<?php 
		raq(2, $RaQ);
		echo $this->Form->input('question_3', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step4">
		<?php 
		raq(3, $RaQ);
		echo $this->Form->input('question_4', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step5">
		<?php 
		raq(4, $RaQ);
		echo $this->Form->input('question_5', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step6">
		<?php 
		raq(5, $RaQ);
		echo $this->Form->input('question_6', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step7">
		<?php 
		raq(6, $RaQ);		
		echo $this->Form->input('question_7', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step8">
		<?php 
		raq(7, $RaQ);		
		echo $this->Form->input('question_8', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step9">
		<?php 
		raq(8, $RaQ);		
		echo $this->Form->input('question_9', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step10">
		<?php 
		raq(9, $RaQ);		
		echo $this->Form->input('question_10', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<!-- -->
	<fieldset class="step step11">
		<?php 
		raq(10, $RaQ);		
		echo $this->Form->input('question_11', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step12">
		<?php 
		raq(11, $RaQ);
		echo $this->Form->input('question_12', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step13">
		<?php 
		raq(12, $RaQ);
		echo $this->Form->input('question_13', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step14">
		<?php 
		raq(13, $RaQ);
		echo $this->Form->input('question_14', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step15">
		<?php 
		raq(14, $RaQ);
		echo $this->Form->input('question_15', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step16">
		<?php 
		raq(15, $RaQ);
		echo $this->Form->input('question_16', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step17">
		<?php 
		raq(16, $RaQ);		
		echo $this->Form->input('question_17', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step18">
		<?php 
		raq(17, $RaQ);		
		echo $this->Form->input('question_18', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step19">
		<?php 
		raq(18, $RaQ);		
		echo $this->Form->input('question_19', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step20">
		<?php 
		raq(19, $RaQ);		
		echo $this->Form->input('question_20', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
<!-- -->
	<fieldset class="step step21">
		<?php 
		raq(20, $RaQ);		
		echo $this->Form->input('question_21', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step22">
		<?php 
		raq(21, $RaQ);
		echo $this->Form->input('question_22', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step23">
		<?php 
		raq(22, $RaQ);
		echo $this->Form->input('question_23', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step24">
		<?php 
		raq(23, $RaQ);
		echo $this->Form->input('question_24', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step25">
		<?php 
		raq(24, $RaQ);
		echo $this->Form->input('question_25', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step26">
		<?php 
		raq(25, $RaQ);
		echo $this->Form->input('question_26', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step27">
		<?php 
		raq(26, $RaQ);		
		echo $this->Form->input('question_27', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step28">
		<?php 
		raq(27, $RaQ);		
		echo $this->Form->input('question_28', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step29">
		<?php 
		raq(28, $RaQ);		
		echo $this->Form->input('question_29', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
<!-- -->
	<fieldset class="step step30">
		<?php 
		raq(29, $RaQ);		
		echo $this->Form->input('question_30', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step31">
		<?php 
		raq(30, $RaQ);		
		echo $this->Form->input('question_31', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step32">
		<?php 
		raq(31, $RaQ);
		echo $this->Form->input('question_32', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step33">
		<?php 
		raq(32, $RaQ);
		echo $this->Form->input('question_33', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step34">
		<?php 
		raq(33, $RaQ);
		echo $this->Form->input('question_34', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step35">
		<?php 
		raq(34, $RaQ);
		echo $this->Form->input('question_35', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step36">
		<?php 
		raq(35, $RaQ);
		echo $this->Form->input('question_36', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step37">
		<?php 
		raq(36, $RaQ);		
		echo $this->Form->input('question_37', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step38">
		<?php 
		raq(37, $RaQ);		
		echo $this->Form->input('question_38', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step39">
		<?php 
		raq(38, $RaQ);		
		echo $this->Form->input('question_39', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
<!-- -->
	<fieldset class="step step40">
		<?php 
		raq(39, $RaQ);		
		echo $this->Form->input('question_40', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step41">
		<?php 
		raq(40, $RaQ);		
		echo $this->Form->input('question_41', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step42">
		<?php 
		raq(41, $RaQ);
		echo $this->Form->input('question_42', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step43">
		<?php 
		raq(42, $RaQ);
		echo $this->Form->input('question_43', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step44">
		<?php 
		raq(43, $RaQ);
		echo $this->Form->input('question_44', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step45">
		<?php 
		raq(44, $RaQ);
		echo $this->Form->input('question_45', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step46">
		<?php 
		raq(45, $RaQ);
		echo $this->Form->input('question_46', array('label' => '', 'options' => $options, 'default' => ''));
				
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>	
	<fieldset class="step step47">
		<?php 
		raq(46, $RaQ);		
		echo $this->Form->input('question_47', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	</fieldset>
	<fieldset class="step step48">
		<?php 
		raq(47, $RaQ);		
		echo $this->Form->input('question_48', array('label' => '', 'options' => $options, 'default' => ''));
		
		echo $this->Form->button('Back', array('class' => 'back'));
		//echo $this->Form->button('Next', array('class' => 'next')); 
		?>
	<?php echo $this->Form->end(__('Submit')); ?>
	</fieldset>



<!-- End -->

<?php // echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
