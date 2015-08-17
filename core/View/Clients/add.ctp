<?php
$this->Html->addCrumb('Clients', '/clients');
$this->Html->addCrumb('Add Client');

App::uses('Group', 'Model');
$group = $this->Session->read('Auth.User.group_id');

$acctType = array('Initial' => 'Initial', 'Subscription' => 'Subscription',
	 'Meaningful Use' => 'Meaningful Use', 'Training' => 'Training', 'Admin' => 'Admin',
	 'AYCE Training' => 'AYCE Training');
$active = array(true => 'Yes', false => 'No');
$risk = array('' => '', 'Completed' => 'Completed');
?>
<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
    <fieldset>
        <legend><?php echo __('Add Client'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('email');
		$acct_type_opts = array('options' => $acctType, 'default' => 'Pending');
		$course_opts = array('label' => 'Training Course', 'options' => $moodle_courses);
		$partner_opts = array('empty' => 'No Partner', 'value' => '');
		if ($group == Group::PARTNER_ADMIN) {
			$acct_type_opts['disabled'] = 'disabled';
			$acct_type_opts['value'] = Configure::read('__default_acct_type');
			$course_opts['disabled'] = 'disabled';
			$course_opts['value'] = Configure::read('__default_course');
			$partner_opts['disabled'] = 'disabled';
			$partner_opts['value'] = $partner['Partner']['id'];
		}
        echo $this->Form->input('account_type', $acct_type_opts);
        echo $this->Form->input('moodle_course_id', $course_opts);
        echo $this->Form->input('active', array('label' => 'Account Active?', 'options' => $active, 'default' => 'Yes'));
        echo $this->Form->input('display_ra_org', array('label' => 'Display RA/Org?', 'options' => $active, 'default' => true));
		if ($group == Group::PARTNER_ADMIN) {
			echo $this->Form->input('display_intro_video', array('label' => 'Display Introduction Video?', 'options' => $active, 'default' => true));
		}
        echo $this->Form->input('partner_id', $partner_opts);
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
        <br />
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
