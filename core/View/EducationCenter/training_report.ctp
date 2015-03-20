<?php
$this->Html->addCrumb('Education Center', '/education_center');
$this->Html->addCrumb('Training', '/education_center/training');
$this->Html->addCrumb('Training Report');
?>

<div class="index">
    <h2><?php echo __('Training Report'); ?> - <?php echo $client_name ?></h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Score</th>
        <th>Date Completed</th>
      </tr>
      <?php foreach ($rows as $row): ?>
      <tr>
        <td><?php echo $row['mdl_user']['lastname'].', '.$row['mdl_user']['firstname']; ?>&nbsp;</td>
        <td><?php echo ((string) (floatval($row['mdl_quiz_grades']['grade']) * 10)) . '%' ; ?>&nbsp;</td>
        <td><?php echo date('jS F Y', $row['mdl_quiz_grades']['timemodified']); ?>&nbsp;</td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br />
    <p><?php echo $this->Html->link('Export to Excel', array('controller' => 'education_center', 'action' => 'training_report', 'ext' => 'csv')); ?></p>
</div>
<div class="actions">
    <div class='sidebarContent'>
    <h3>Quick Links: </h3>
    <ul>
    <li><?php echo $this->Html->link('Back to Dashboard', array('controller' => 'dashboard', 'action' => 'index')); ?></li>
    </ul>
    </div>
</div>
<?php echo $this->element('newsFeed'); ?>