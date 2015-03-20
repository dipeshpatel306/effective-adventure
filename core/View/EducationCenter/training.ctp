<?php
$this->Html->addCrumb('Education Center', '/education_center');
$this->Html->addCrumb('Training');
?>

<div class="dashboard index training">
<div class='trainingContent'>
    <h2><?php echo Configure::read('Theme.training_name'); ?></h2>
<p>
<b>The HIPAA Security Training consists of three sections:</b><br /><br />
  <?php echo $this->Html->image(Configure::read('Theme.training_image')); ?>
  <br />
  <p>All three sections should take about 1 hour to complete. You can stop at any time and continue where you left off later.</p>
  <br />
  <b><h3>You are about to be taken to the <span class='important'><?php echo Configure::read('Theme.training_name'); ?> Class</span></h3></b>
  <br />
  <p>The training will open in another window.</p><br />
  <p>When you are done please close the window to return to the <?php echo Configure::read('Theme.title'); ?>.</p><br />
  <b><h3><?php echo $this->Html->link('Click here to access the ' . Configure::read('Theme.training_name') . ' Class', Configure::read('App.trainingUrl'), array('target' => '_blank')); ?></h3></b>
</p>
</div>
</div>
<div class="actions">
    <div class='sidebarContent'>
    <h3>Quick Links: </h3>
    <ul>
    <li><?php echo $this->Html->link('Back to Dashboard', array('controller' => 'dashboard', 'action' => 'index')); ?></li>
    <?php
    App::uses('Group', 'Model');
    if ($group == Group::MANAGER or $group == Group::ADMIN) {
        echo '<li>' . $this->Html->link('Training Report', array('controller' => 'education_center', 'action' => 'training_report')). '</li>';
    }
    ?>
    </ul>
    </div>
</div>

<?php echo $this->element('newsFeed'); ?>