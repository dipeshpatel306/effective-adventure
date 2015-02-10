<?php
$this->Html->addCrumb('Risk Assessment Questions');
?>

<div class="riskAssessmentQuestions index">
	<h2><?php echo __('Risk Assessment Questions'); ?></h2>
	<?php foreach ($questions as $item) : ?>
	    <?php echo "<hr><h3>" . $item['RiskAssessmentQuestionSafeguardCategory']['name'] . "</h3>"; ?>
	    <?php foreach ($item['RiskAssessmentQuestionSubCategory'] as $idx=>$subitem) : ?>
	        <?php echo "<h4>" . $subitem['name'] . "</h4>"; ?>
	        <table>
	        <tr>
                <th class="raqQuestionNum"><?php echo __('Question Number'); ?></th>
                <th class="raqQuestion"><?php echo __('Question'); ?></th>
                <th class="actions raqActions"><?php echo __('Actions'); ?></th>
            </tr>
	        <?php foreach ($subitem['RiskAssessmentQuestion'] as $q) : ?>
                <tr>
                    <td><?php echo ($q['category_question_number']); ?>&nbsp;</td>
                    <td><?php echo ($q['question']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $q['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $q['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $q['id']), null, __('Are you sure you want to delete # %s?', $q['id'])); ?>
                    </td>
                </tr>
	        <?php endforeach; ?>
	        </table><br />
	    <?php endforeach; ?>
	<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Risk Assessment Question'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Risk Assessment Question Categories'), array('controller' => 'risk_assessment_question_sub_categories', 'action' => 'index')); ?></li>
	</ul>
</div>
