<?php 
$options = array('Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A');
$qnum = $question['question_number'];
$q_video_name = $question['video_name'];
$cqnum = $question['category_question_number'];
?>
<h3>Question <?php echo $cqnum; ?> of <?php echo $num_category_questions; ?><br /><?php echo $question['question']; ?></h3>
<?php 
if (isset($q_video_name) && !empty($q_video_name)) {
    echo "<center><div id='$q_video_name' qnum='$cqnum' class='raVideo'></div></center>";
}
?>
<p><b>Additional Information</b><br /><?php echo $question['additional_information']; ?></p>
<p><b>How to Answer Question</b><br /><?php echo $question['how_to_answer_question']; ?></p>
<?php
$img = empty($this->data['RiskAssessment']['question_'.$qnum]) ? 'no.png' : 'yes.png';
$icon = $this->Html->image($img, array('class' => 'icon')); 
echo $this->Form->input("question_$qnum", array('label' => 'Question '.$question['category_question_number'], 'options' => $options, 'empty' => 'Please Select', 'after' => $icon));
?>