<?php
App::uses('Group', 'Model');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($acct == 'Subscription') {
    $this->Html->addCrumb('Risk Assessment', array('controller' => 'dashboard', 'action' => 'initial'));    
}
$this->Html->addCrumb('Take Risk Assessment');

$group = $this->Session->read('Auth.User.group_id');

?>

<div class='fouc riskAssessments form'>
<?php echo $this->Form->create('RiskAssessment'); ?>
    <fieldset>
        <legend><?php echo __('Risk Assessment Questions'); ?></legend>
    <div class='raTabs tabsOuter'>
    <ul>
        <?php   
            foreach ($questions as $item) {
                echo "<li class='outerTab'><a href='#outerTab" . $item['RiskAssessmentQuestionSafeguardCategory']['id'] ."'>" . 
                    $item['RiskAssessmentQuestionSafeguardCategory']['name'] . 
                    "<img class='icon tabIcon' alt></a></li>";
            }
        ?>
    </ul>
    <?php foreach ($questions as $item): ?>
        <?php $outer_id = $item['RiskAssessmentQuestionSafeguardCategory']['id']; ?>
        <div id='outerTab<?php echo $outer_id; ?>' class='raTabs tabsInner'>
            <ul>
                <?php 
                    foreach ($item['RiskAssessmentQuestionSubCategory'] as $idx=>$subitem) {
                        echo "<li class='innerTab'><a class='innerTabLink' href='#innerTab" . ($idx + 1) ."-". $outer_id ."'>" . $subitem['name'] . "<img class='icon tabIcon' alt></a></li>";
                    }   
                ?>
            </ul>
        <?php foreach ($item['RiskAssessmentQuestionSubCategory'] as $idx=>$subitem): ?>
            <div id='innerTab<?php echo ((string)($idx + 1)).'-'.$outer_id; ?>' class='riskAssHead'>
                <?php 
                    $video_name = $subitem['video_name'];
                    if (isset($video_name) && !empty($video_name)) {
                        echo "<center><div id='$video_name' class='raVideo'></div></center>";
                    }
                    $subcategory_questions = $subitem['RiskAssessmentQuestion'];
                    foreach ($subcategory_questions as $q) {
                        echo $this->element('ra_question', array('question' => $q, 'num_category_questions' => $num_questions));
                        echo "<hr>";
                        //echo $this->Form->input('question_'.$q['question_number'], array('label' => 'Question '.$q['category_question_number'], 'options' => $options, 'empty' => 'Please Select'));
                    }
                ?>
            </div>    
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
    </div>
    </fieldset>
    <div class='submit'>
        <?php echo $this->Form->submit('Submit', array('div' => false)); ?>
       <?php echo $this->Html->link('Save and next', '#', array( 'class' => 'submitbtn raNextTab')); ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

<?php if($group == Group::ADMIN): ?>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?></li>
        <?php if (isset($riskAssessment)): ?>
        <li><?php echo $this->element('delete_link', array('title' => 'Delete Risk Assessment', 'name' => 'Risk Assessment', 'id' => $riskAssessment['RiskAssessment']['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Export Risk Assessment CSV'), array('action' => 'view', $riskAssessment['RiskAssessment']['id'], 'ext' => 'csv')); ?></li>
        <li><?php echo $this->Html->link(__('Print Risk Assessment'), array('action' => 'view_print', $riskAssessment['RiskAssessment']['id'])); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>

<div class='fouc newsFeed'>
    <h3><?php echo __('Latest News'); ?></h3>
    <?php echo $this->element('feeds'); ?>
</div>
