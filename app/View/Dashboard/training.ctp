<div class="dashboard index training">
    <?php
    App::uses('Group', 'Model');
    if (true) { //}($group == Group::MANAGER) {
        echo "<div class='floatRight'>";
        echo $this->Html->link('Training Report', array('controller' => 'dashboard', 'action' => 'training_report'));
        echo "</div>";
    }
    ?>
    <h2><?php echo __('HIPAA Security Training'); ?></h2>

<b>The HIPAA Security Training consists of three sections:</b><br /><br />
  <ul>
      <li>Taking the HIPAA Security Training Class</li>
      <li>Taking hte HIPAA Security Training Quiz</li>
      <li>Printing out your HIPAA Security Training Certificate</li>
  </ul>
  <br />
  <p>All three sections should take about 1 hour to complete. You cna stop at any time and continue where you left off later.</p>
  <br />
  <h3>You are about to be taken to to the <span class='important'>HIPAA Security Training</span></h3>
  <br />
  <p>The training will open in another window.</p><br />
  <p>When you are done please close the window to return to the HIPAA Compliance Portal.</p><br />
  <?php echo $this->Html->link('Click here to access the HIPAA Security Training', 'http://training.hipaasecurenow.com/login/index.php', array('target' => '_blank')); ?>
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
