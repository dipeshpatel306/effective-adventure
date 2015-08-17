<?php
App::uses('Group', 'Model');
$group = $this->Session->read('Auth.User.group_id');

$this->Html->addCrumb('Clients', '/clients');
$this->Html->addCrumb('Edit Client');

$acctType = array('Initial' => 'Initial', 'Subscription' => 'Subscription',
 	'Meaningful Use' => 'Meaningful Use', 'Training' => 'Training', 'Admin' => 'Admin',
	'AYCE Training' => 'AYCE Training');
$active = array(true => 'Yes', false => 'No');
$risk = array('' => '', 'Completed' => 'Completed');
?>
<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		$acct_type_opts = array('options' => $acctType, 'default' => 'Pending');
		$course_opts = array('label' => 'Training Course', 'options' => $moodle_courses);
		if ($group == Group::PARTNER_ADMIN) {
			$acct_type_opts['disabled'] = 'disabled';
			$course_opts['disabled'] = 'disabled';
		}
		echo $this->Form->input('email');
		echo $this->Form->input('account_type', $acct_type_opts);
        echo $this->Form->input('moodle_course_id', $course_opts);
		echo $this->Form->input('active', array('label' => 'Account Active?', 'options' => $active, 'empty' => ''));
		echo $this->Form->input('display_ra_org', array('label' => 'Display RA/Org?', 'options' => $active, 'default' => true));
		if ($group == Group::PARTNER_ADMIN) {
			echo $this->Form->input('display_intro_video', array('label' => 'Display Introduction Video?', 'options' => $active, 'default' => true));
		}
		if ($group == Group::ADMIN) {
			echo $this->Form->input('partner_id', array('empty' => 'No Partner'));
		}
		if ($group != Group::PARTNER_ADMIN) {
			echo $this->Form->input('risk_assessment_status', array('label' => 'Risk Assessment Completed', 'class' => 'datePick'));
		}
		echo $this->Form->input('details', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<li><?php
			if ($group == Group::ADMIN) {
				echo $this->element('delete_link', array('title' => 'Delete Client', 'name' => 'Client', 'id' => $this->Form->value('Client.id')));
			}
		  ?></li>
	</ul>
	<ul>
		<?php if ($group == Group::ADMIN): ?>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<?php endif; ?>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
