<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Received', '/ephi_received');
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $ephiReceived['EphiReceived']['date_received']));

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiReceived view">
<h2><?php  echo __('ePHI Received'); ?></h2>
	<dl>
		<?php if ($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $ephiReceived['Client']['name']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt><?php echo __('Description of Item Received'); ?></dt>
		<dd>
			<?php echo $ephiReceived['EphiReceived']['item'] . ' '; ?>
			<?php echo $ephiReceived['EphiReceived']['other_description']; ?>
			&nbsp;
		</dd>
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
		<dt><?php echo __('Where was ePHI received from? '); ?></dt>
		<dd>
			<?php echo ($ephiReceived['EphiReceived']['where_received']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Who received / accepted the ePHI?'); ?></dt>
		<dd>
			<?php echo ($ephiReceived['EphiReceived']['received_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reason for receiving ePHI'); ?></dt>
		<dd>
			<?php echo ($ephiReceived['EphiReceived']['reason']) . ' '; ?>
			<?php echo ($ephiReceived['EphiReceived']['other_reason']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date ePHI returned '); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiReceived['EphiReceived']['date_returned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Returned'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $ephiReceived['EphiReceived']['time_returned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Who was the ePHI returned to? '); ?></dt>
		<dd>
			<?php echo $ephiReceived['EphiReceived']['returned_to']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Who was the person who returned the ePHI? '); ?></dt>
		<dd>
			<?php echo $ephiReceived['EphiReceived']['returned_by']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo $ephiReceived['EphiReceived']['notes']; ?>
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
		<li><?php echo $this->Html->link(__('List ePHI Received'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New ePHI Received'), array('action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('Edit ePHI Received'), array('action' => 'edit', $ephiReceived['EphiReceived']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete ePHI Received', 'name' => 'ePHI Received', 'id' => $ephiReceived['EphiReceived']['id'])); ?></li>


	</ul>
</div>
