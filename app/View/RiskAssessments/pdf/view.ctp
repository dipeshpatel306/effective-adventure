<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            body {
                font-family:'lucida grande',verdana,helvetica,arial,sans-serif;
                font-size: 80%;
            }
            td {
                padding: 8px;
            }
            
        </style>    
    </head>
    <body>
        <table>
            <tr>
                <th style="width:8%; text-align:center">Question #</th>
                <th style="width:14%">Question</th>
                <th style="width:22%">Description</th>
                <th style="width:48%">HIPAA Related Info</th>
                <th style="width:8%; text-align:center">Control Implemented</th>
            </tr>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td style="width:8%; text-align:center"><?php echo $question['RiskAssessmentQuestions']['category_question_number']; ?></td>
                <td style="width:14%"><?php echo $question['RiskAssessmentQuestions']['question']; ?></div></td>
                <td style="width:22%"><?php echo $question['RiskAssessmentQuestions']['how_to_answer_question']; ?></td>
                <td style="width:48%"><?php echo $question['RiskAssessmentQuestions']['additional_information']; ?></td>
                <td style="width:8%; text-align:center"><?php echo $ra['RiskAssessment']['question_'.((string)($question['RiskAssessmentQuestions']['question_number']))]; ?></td>    
            </tr>
            <?php endforeach; ?>
        </table>
    </body>  
</html>
