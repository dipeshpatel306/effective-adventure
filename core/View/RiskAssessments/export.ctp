<?php
$this->csv->addRow(array('Question #', 'Control Implemented'));
    
foreach (range(1,48) as $qnum) {
    $qnum = (string) $qnum;
    $this->csv->addField($qnum);
    $this->csv->addField($ra['RiskAssessment']['question_'.$qnum]);
    $this->csv->endRow();
}
echo $this->csv->render('risk_assessment.csv');
?>