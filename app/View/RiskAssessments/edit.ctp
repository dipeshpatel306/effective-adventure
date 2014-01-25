<?php
$this->Html->addCrumb('Take Risk Assessment');
$options = array('' => 'Please Select', 'No' => 'No', 'Yes' => 'Yes', 'N/A' => 'N/A');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
?>

<div class="riskAssessments form">
<?php echo $this->Form->create('RiskAssessment'); ?>
		<!-- <legend><?php echo __('Take Risk Assessment'); ?></legend>-->


<!--<div id="slides">
<div class="slides_container">-->
<div class="riskAssHead">
<?php 
    $num_qs = count($questions);
    foreach ($questions as $question): 
?>
	<div>
	<?php 
	   $qnum = $question['RiskAssessmentQuestion']['question_number'];
       $label = '<h3>Question ' . $qnum . ' of ' . (string) $num_qs . '<br />' . $question['RiskAssessmentQuestion']['question'] . '</h3>
                 <p><b>Additional Information</b><br />' . $question['RiskAssessmentQuestion']['additional_information'] . '</p>
                 <p><b>How to Answer Question</b><br />' . $question['RiskAssessmentQuestion']['how_to_answer_question'] . '</p>';
       $img = empty($this->data['RiskAssessment']['question_'.$qnum]) ? 'no.png' : 'yes.png';
       $icon = $this->Html->image($img, array('class' => 'icon'));  
	   echo $label;
	   echo $this->Form->input('question_'.$qnum, array('label' => false, 'options' => $options, 'after' => $icon));	?>
	</div>
	<?php endforeach; ?>
	
<!--<span class='prevNext'><a class="prev" href="#">Previous</a></span><span class='prevNext'><a class="next" href="#">Next</a></span>-->
		<!--<div class='buttonWrap'>
		<?php echo $this->Form->button('Previous', array('class' => 'prev'));?><?php echo $this->Form->button('Next', array('class' => 'next'));?>
		</div>-->
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