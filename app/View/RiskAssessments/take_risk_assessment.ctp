<?php
$this->Html->addCrumb('Take Risk Assessment');
	$options = array('No' => 'No', 'Yes' => 'Yes', 'N/A');

	// format Risk Assessment Question
	function raq($id, $RaQ){ //TODO replace this function with something less cpu intensive
			// Important! DB index starts at 0 so inout number is one less than display step display number
		$raq =	$RaQ[$id]["RiskAssessmentQuestion"]["question_number"];
			//pr($id, $RaQ);
		echo '<h3>Question ' . $RaQ[$id]["RiskAssessmentQuestion"]["question_number"] . ' of 48<br />' .
			$RaQ[$id]['RiskAssessmentQuestion']['question'] . '</h3>';
		echo '<p><b>Additional Information</b><br />' . $RaQ[$id]['RiskAssessmentQuestion']['additional_information'] . '</p>';
		echo '<p><b>How to Answer Question</b><br />' . $RaQ[$id]['RiskAssessmentQuestion']['how_to_answer_question'] . '</p>';
	}

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="riskAssessments form">
<?php echo $this->Form->create('RiskAssessment'); ?>
		<!-- <legend><?php echo __('Take Risk Assessment'); ?></legend>-->


<div id="slides">
<div class="slides_container">

	<div>
	<?php echo $this->Form->input('question_1', array('label' => raq(0, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_2', array('label' => raq(1, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_3', array('label' => raq(2, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_4', array('label' => raq(3, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_5', array('label' => raq(4, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_6', array('label' => raq(5, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_7', array('label' => raq(6, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_8', array('label' => raq(7, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_9', array('label' => raq(8, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_10', array('label' => raq(9, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<!-- -->
	<div>
	<?php echo $this->Form->input('question_11', array('label' => raq(10, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_12', array('label' => raq(11, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_13', array('label' => raq(12, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_14', array('label' => raq(13, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_15', array('label' => raq(14, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_16', array('label' => raq(15, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_17', array('label' => raq(16, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_18', array('label' => raq(17, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_19', array('label' => raq(18, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_20', array('label' => raq(19, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
<!-- -->
	<div>
	<?php echo $this->Form->input('question_21', array('label' => raq(20, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_22', array('label' => raq(21, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_23', array('label' => raq(22, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_24', array('label' => raq(23, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_25', array('label' => raq(24, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_26', array('label' => raq(25, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_27', array('label' => raq(26, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_28', array('label' => raq(27, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_29', array('label' => raq(28, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
<!-- -->
	<div>
	<?php echo $this->Form->input('question_30', array('label' => raq(29, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_31', array('label' => raq(30, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_32',  array('label' => raq(31, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_33',  array('label' => raq(32, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_34',  array('label' => raq(33, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_35',  array('label' => raq(34, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_36',  array('label' => raq(35, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_37',  array('label' => raq(36, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_38',  array('label' => raq(37, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_39',  array('label' => raq(38, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
<!-- -->
	<div>
	<?php echo $this->Form->input('question_40',  array('label' => raq(39, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_41',  array('label' => raq(40, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_42',  array('label' => raq(41, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_43',  array('label' => raq(42, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_44',  array('label' => raq(43, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_45',  array('label' => raq(44, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_46',  array('label' => raq(45, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_47',  array('label' => raq(46, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>
	</div>
	<div>
	<?php echo $this->Form->input('question_48',  array('label' => raq(47, $RaQ), 'options' => $options,  'empty' => 'Please Select'));?>

	</div>
</div><!--<span class='prevNext'><a class="prev" href="#">Previous</a></span><span class='prevNext'><a class="next" href="#">Next</a></span>-->
		<div class='buttonWrap'>
		<?php echo $this->Form->button('Previous', array('class' => 'prev'));?><?php echo $this->Form->button('Next', array('class' => 'next'));?>
		</div>
</div>
	<?php echo $this->Form->end('Submit');?>
	<?php //echo $this->Form->end(); ?>

<!-- End -->


</div>
<?php if($group == 1): ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php endif; ?>
<div class='newsFeed'>
	<h3><?php echo __('Latest News'); ?></h3>
	<?php echo $this->element('feeds'); ?>
</div>