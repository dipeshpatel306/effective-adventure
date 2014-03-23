<?php
$this->Html->addCrumb('Risk Assessment Question Categories', '/risk_assessment_question_sub_categories');
$this->Html->addCrumb('Edit Risk Assessment Question Category');
?>
<div class="riskAssessmentQuestionSubCategories form">
<?php echo $this->Form->create('RiskAssessmentQuestionSubCategory'); ?>
    <fieldset>
        <legend><?php echo __('Edit Risk Assessment Question Category'); ?></legend>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('video_name');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Risk Assessment Question Categories'), array('action' => 'index')); ?></li>
    </ul>
</div>