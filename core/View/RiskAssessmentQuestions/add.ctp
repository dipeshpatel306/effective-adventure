<?php
$this->Html->addCrumb('Risk Assessment Questions', '/risk_assessment_questions');
$this->Html->addCrumb('Add Risk Assessment Question');
?>
<div class="riskAssessmentQuestions form">
<?php echo $this->Form->create('RiskAssessmentQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Add Risk Assessment Question'); ?></legend>
	<?php
		echo $this->Form->input('category_question_number', array('class' => 'num', 'min' => '1', 'label' => 'Question Number'));
		echo $this->Form->input('question');
		echo $this->Form->input('additional_information',  array('class' => 'ckeditor'));
		echo $this->Form->input('how_to_answer_question',  array('class' => 'ckeditor'));
		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Risk Assessment Questions'), array('action' => 'index')); ?></li>
	</ul>
</div>