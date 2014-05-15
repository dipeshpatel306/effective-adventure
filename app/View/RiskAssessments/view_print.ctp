<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('View Risk Assessment - ' . $ra['Client']['name']);
echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<script tpye="text/javascript">
    window.onload = function () { window.print(); }
</script>
<div class="riskAssessments view">
<h2><?php  echo __('Risk Assessment - '. $ra['Client']['name']); ?></h2>
    <table>
        <tr>
            <th>Question #</th>
            <th>Question</th>
            <th>Description</th>
            <th>HIPAA Related Info</th>
            <th>Control Implemented</th>
        </tr>
        <?php foreach ($questions as $question): ?>
        <tr>
            <td><div class="avoidBreak"><?php echo $question['RiskAssessmentQuestions']['category_question_number']; ?></div></td>
            <td><div class="avoidBreak"><?php echo $question['RiskAssessmentQuestions']['question']; ?></div></td>
            <td><div class="avoidBreak"><?php echo $question['RiskAssessmentQuestions']['how_to_answer_question']; ?></div></td>
            <td><div class="avoidBreak"><?php echo $question['RiskAssessmentQuestions']['additional_information']; ?></div></td>
            <td><div class="avoidBreak"><?php echo $ra['RiskAssessment']['question_'.((string)($question['RiskAssessmentQuestions']['question_number']))]; ?></div></td>    
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="actions">
	<h4 class='highlight'><?php echo __('Actions'); ?></h4>
	<ul>

		<?php if($group == Group::ADMIN): ?>
		<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Risk Assessment'), array('action' => 'take_risk_assessment', $ra['RiskAssessment']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Risk Assessment', 'name' => 'Risk Assessment', 'id' => $ra['RiskAssessment']['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Export Risk Assessment CSV'), array('action' => 'view', $ra['RiskAssessment']['id'], 'ext' => 'csv')); ?></li>
		<?php endif; ?>

	</ul>
</div>
