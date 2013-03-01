<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Received', '/ephi_received');
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['date_received']));

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiReceived view">
<h2><?php  echo __('Ephi Received'); ?></h2>
	<dl>
		<?php if ($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ephiReceived['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ephiReceived['Client']['id'])); ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt><?php echo __('Date Received'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiReceived['EphiReceived']['date_received']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Received'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $ephiReceived['EphiReceived']['time_received']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ephiReceived['EphiReceived']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($ephiReceived['EphiReceived']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Received By'); ?></dt>
		<dd>
			<?php echo h($ephiReceived['EphiReceived']['received_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Returned'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiReceived['EphiReceived']['date_returned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Returned'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $ephiReceived['EphiReceived']['time_returned']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Ephi Received'), array('action' => 'index')); ?> </li>
		
		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('Edit Ephi Received'), array('action' => 'edit', $ephiReceived['EphiReceived']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ephi Received'), array('action' => 'delete', $ephiReceived['EphiReceived']['id']), null, __('Are you sure you want to delete # %s?', $ephiReceived['EphiReceived']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Ephi Received'), array('action' => 'add')); ?> </li>
		<?php endif; ?>
	</ul>
</div>
