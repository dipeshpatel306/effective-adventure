<?php
$this->csv->addRow(array('Last Name', 'First Name', 'Score', 'Date Completed'));
foreach ($rows as $row) {
    $this->csv->addField($row['mdl_user']['lastname']);
    $this->csv->addField($row['mdl_user']['firstname']);
    $this->csv->addField($row['mdl_quiz_grades']['grade']);
    $this->csv->addField(date('jS F Y h:i:s A (T)', $row['mdl_quiz_grades']['timemodified']));
    $this->csv->endRow();
}
echo $this->csv->render('training_report.csv');
?>