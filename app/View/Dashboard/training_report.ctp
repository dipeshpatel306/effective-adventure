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
        <td><?php echo $row['mdl_quiz_grades']['grade']; ?>&nbsp;</td>
        <td><?php echo date('jS F Y h:i:s A (T)', $row['mdl_quiz_grades']['timemodified']); ?>&nbsp;</td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br />
    <p><?php echo $this->Html->link('Export to Excel', array('controller' => 'dashboard', 'action' => 'training_report_csv')); ?></p>
</div>
<div class="actions">
    <div class='sidebarContent'>
    <h3>Quick Links: </h3>
    <ul>
    <li><?php echo $this->Html->link('Back to Dashboard', array('controller' => 'dashboard', 'action' => 'index')); ?></li>
    </ul>
    </div>
</div>
<div class='newsFeed'>
    <h3><?php echo __('Latest News'); ?></h3>
    <?php echo $this->element('feeds'); ?>
</div>