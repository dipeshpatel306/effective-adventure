<?php
$this->csv->addRow(array('Question #', 'Control Implemented'));
    
foreach ($questions as $question) {
    $qnum = (string) $question['RiskAssessmentQuestions']['question_number'];
    $this->csv->addField($question['RiskAssessmentQuestions']['category_question_number']);
    $this->csv->addField($ra['RiskAssessment']['question_'.$qnum]);
    $this->csv->endRow();
}

echo $this->csv->render('risk_assessment.csv');
?>