<?php
$this->Html->addCrumb('Risk Assessments', '/risk_assessments');
$this->Html->addCrumb('Export');
?>
<div class="form">
<?php 
echo $this->Form->create(); 
echo $this->Form->input('Client.ra_dbid', array('label' => 'Risk Assessment Tool V&C Dbid', 'maxlength' => 12, 'size' => 12));
echo $this->Form->end('Export');
?>
<p>Export will take a couple minutes to complete.</p>
</div>
<div class="actions">
    <h4 class='highlight'><?php echo __('Actions'); ?></h4>
    <ul>
        <li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Edit Risk Assessment'), array('action' => 'edit', $riskAssessment['RiskAssessment']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Risk Assessment'), array('action' => 'delete', $riskAssessment['RiskAssessment']['id']), null, __('Are you sure you want to delete # %s?', $riskAssessment['RiskAssessment']['id'])); ?> </li>
    </ul>
</div>