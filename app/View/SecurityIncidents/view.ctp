<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('Security Incidents', '/security_incidents');
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['date_of_incident']));

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="securityIncidents view">
<h2><?php  echo __('Security Incident'); ?></h2>
	<dl>
		<dt><?php echo __('Date Of Incident'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $securityIncident['SecurityIncident']['date_of_incident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Of Incident'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $securityIncident['SecurityIncident']['time_of_incident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discovery Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $securityIncident['SecurityIncident']['discovery_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discovery Time'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $securityIncident['SecurityIncident']['discovery_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reported By'); ?></dt>
		<dd>
			<?php echo h($securityIncident['SecurityIncident']['reported_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description Of Incident'); ?></dt>
		<dd>
			<?php echo h($securityIncident['SecurityIncident']['description_of_incident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cause Of Incident'); ?></dt>
		<dd>
			<?php echo h($securityIncident['SecurityIncident']['cause_of_incident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assets Involved'); ?></dt>
		<dd>
			<?php echo h($securityIncident['SecurityIncident']['assets_involved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($securityIncident['Client']['name'], array('controller' => 'clients', 'action' => 'view', $securityIncident['Client']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Security Incidents'), array('action' => 'index')); ?> </li>		
		

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('Edit Security Incident'), array('action' => 'edit', $securityIncident['SecurityIncident']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Security Incident'), array('action' => 'delete', $securityIncident['SecurityIncident']['id']), null, __('Are you sure you want to delete # %s?', $securityIncident['SecurityIncident']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Security Incident'), array('action' => 'add')); ?> </li>
		<?php endif; ?>
		
	</ul>
</div>
