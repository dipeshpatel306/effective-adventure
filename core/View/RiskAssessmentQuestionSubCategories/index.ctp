<?php
$this->Html->addCrumb('Risk Assessment Question Categories');
//print_r($riskAssessmentQuestionSubCategories);
?>

<div class="riskAssessmentQuestionSubCategories index">
    <h2><?php echo __('Risk Assessment Question Categories'); ?></h2>
    <table>
    <tr>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('RiskAssessmentQuestionSafeguardCategory.name', 'Safeguard Category'); ?></th>
            <th><?php echo $this->Paginator->sort('video_name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php
    foreach ($riskAssessmentQuestionSubCategories as $riskAssessmentQuestionSubCategory): ?>
    <tr>
        <td><?php echo ($riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSubCategory']['name']); ?>&nbsp;</td>
        <td><?php echo ($riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSafeguardCategory']['name']); ?>&nbsp;</td>
        <td><?php echo ($riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSubCategory']['video_name']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSubCategory']['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $riskAssessmentQuestionSubCategory['RiskAssessmentQuestionSubCategory']['id'])); ?>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>  </p>

    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul></ul>
</div>