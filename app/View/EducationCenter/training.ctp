<?php
$this->Html->addCrumb('Education Center', '/education_center');
$this->Html->addCrumb('Training');
?>

<div class="dashboard index training">
<div class='trainingContent'>
    <h2><?php echo __('HIPAA Training'); ?></h2>
<p>
<b>The HIPAA Training consists of three sections:</b><br /><br />
  <?php echo $this->Html->image('training.png'); ?>
  <br />
  <p>The training should take about 1-2 hours to complete. You can stop at any time and continue where you left off later.</p>
  <br />
  <h2><strong>Notice!</strong></h2>
  <div class='training-notice'>
    <h3 class='important'><strong>HIPAA Secure Now!</strong></h3>
    <p>Is excited to announce a new version of our training program for 2015.</p>
    <br />
    <p><strong>Covered Entities</strong></p>
    <p>We are now providing a HIPAA Privacy training class along with an improved Security training class.</p>
    <br />
    <p><strong>Business Associates</strong></p>
    <p>Will also have a new and improved Security training program.</p>
    <br />
    <p>Your account is now ready to access the new training module for your organization. All previous scores and completion records are available and can be provided by reaching out to <a href='mailto:info@hipaasecurenow.com'>info@hipaasecurenow.com</a> and requesting a copy of your previous training report.</p>
  </div>
  <b><h3>You are about to be taken to the <span class='important'>HIPAA Training</span></h3></b>
  <br />
  <p>The training will open in another window.</p><br />
  <p>When you are done please close the window to return to the HIPAA Compliance Portal.</p><br />
  <b><h3><?php echo $this->Html->link('Click here to access the HIPAA Training', Configure::read('App.trainingUrl'), array('target' => '_blank')); ?></h3></b>
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

<div class='newsFeed'>
    <h3><?php echo __('Latest News'); ?></h3>
    <?php echo $this->element('feeds'); ?>
</div>
