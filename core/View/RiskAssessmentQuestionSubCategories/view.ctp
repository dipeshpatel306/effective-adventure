<?php
$this->Html->addCrumb('View Risk Assessment Question Category');
?>
<div class="riskAssessmentQuestionSubCategories view">
<h2><?php  echo __('Risk Assessment Question Category'); ?></h2>
    <dl>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo ($riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSubCategory']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Safeguard Category'); ?></dt>
        <dd>
            <?php echo ($riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSafeguardCategory']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Video Name'); ?></dt>
        <dd>
            <?php echo ($riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSubCategory']['video_name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Risk Assessment Question Categories'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Edit Risk Assessment Question Category'), array('action' => 'edit', $riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSubCategory']['id'])); ?> </li>
    </ul>
</div>