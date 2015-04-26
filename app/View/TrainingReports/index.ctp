<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Training Reports');

$group = $this->Session->read('Auth.User.group_id');
?>

<div class="trainingReports index">
  <h2><?php echo __('Training Reports'); ?></h2>
  <table>
  <tr>
  <?php if($group == Group::ADMIN): ?>
    <th><?php echo $this->Paginator->sort('client_id'); ?></th>
	<?php endif; ?>
	<th><?php echo $this->Paginator->sort('course_code'); ?></th>
    <th><?php echo $this->Paginator->sort('course_name'); ?></th>
	<th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  <?php foreach ($reports as $report): ?>
  <tr>
  	<?php if ($group == Group::ADMIN): ?>
    <td><?php echo $this->Html->link($report['Client']['name'], array('controller' => 'clients', 'action' => 'view', $report['Client']['id'])); ?></td>
    <?php endif; ?>
    <td><?php echo $report['TrainingReport']['course_code']; ?></td>
    <td><?php echo $report['TrainingReport']['course_name']; ?></td>
    <td class="actions">
      <?php echo $this->Html->link(__('View'), array('action' => 'view', $report['TrainingReport']['id'])); ?>
      <?php echo $this->Html->link(__('Export'), array('action' => 'view', 'ext' => 'csv', $report['TrainingReport']['id'])); ?>
      <?php if ($group == Group::ADMIN) {
      	echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'ePHI Removed', 'id' => $report['TrainingReport']['id']));
      } ?>
    </td>
  </tr>
  <?php endforeach; ?>
  </table>
  <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
    <div class='sidebarContent'>
    <h3>Quick Links: </h3>
    <ul>
      <?php if ($group == Group::ADMIN): ?>
      <li><?php echo $this->Html->link('Back to Clients', array('controller' => 'clients', 'action' => 'index')); ?></li>
      <?php endif; ?>
      <li><?php echo $this->Html->link('Back to Training', array('controller' => 'education_center', 'action' => 'training')); ?></li>
    </ul>
    </div>
</div>
<div class='newsFeed'>
    <h3><?php echo __('Latest News'); ?></h3>
    <?php echo $this->element('feeds'); ?>
</div>