<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Security Incidents');
} else {
	$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
	$this->Html->addCrumb('Security Incidents', '/security_incidents');
}
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['date_of_incident']));
?>
<div class="securityIncidents view">
<h2><?php  echo __('Security Incident'); ?></h2>
	<div>
			
		<?php if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN): ?>
		<h3 class="highlight"><?php echo __('Client'); ?></h3>
		<p>
			<?php echo $securityIncident['Client']['name']; ?>
			&nbsp;
		</p>
		<?php endif; ?>


		<h3 class="highlight"><?php echo __('Date Of Incident'); ?></h3>
		<p>
			<?php echo $this->Time->format('m/d/y', $securityIncident['SecurityIncident']['date_of_incident']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Time Of Incident'); ?></h3>
		<p>
			<?php echo $this->Time->format('g:i a', $securityIncident['SecurityIncident']['time_of_incident']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Discovery Date'); ?></h3>
		<p>
			<?php echo $this->Time->format('m/d/y', $securityIncident['SecurityIncident']['discovery_date']); ?>
			&nbsp;
		</p>

		<h3 class="highlight"><?php echo __('Description Of Incident'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['description_of_incident']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Number of Records'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['number_of_records']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Source'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['source']); ?>
			&nbsp;
		</p>
		
		<h3 class="highlight"><?php echo __('Cause Of Incident'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['cause_of_incident']); ?>
			&nbsp;
		</p>
		<?php if(!empty($securityIncident['SecurityIncident']['cause_other'])):  ?>
			<h3 class="highlight"><?php echo __('Cause Other'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['cause_other']); ?>
			&nbsp;
		</p>
		<?php endif ?>
		
		<h3 class="highlight"><?php echo __('Assets Involved'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['assets_involved']); ?>
			&nbsp;
		</p>
		
		<?php if(!empty($securityIncident['SecurityIncident']['other_assets_involved'])):  ?>
			<h3 class="highlight"><?php echo __('Other Assets Involved'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['other_assets_involved']); ?>
			&nbsp;
		</p>
		<?php endif ?>		
		
		<h3 class="highlight"><?php echo __('Systems Involved'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['systems_involved']); ?>
			&nbsp;
		</p>
		<?php if(!empty($securityIncident['SecurityIncident']['other_systems_involved'])):  ?>
			<h3 class="highlight"><?php echo __('Other Systems Involved'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['other_systems_involved']); ?>
			&nbsp;
		</p>
		<?php endif ?>			
		
		
		
		<h3 class="highlight"><?php echo __('Description of Breached Information'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['description_of_breached']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Impact Level'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['impact_level']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Steps taken for resolution'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['steps_taken']); ?>
			&nbsp;
		</p>

		<h3 class="highlight"><?php echo __('Date of Resolution'); ?></h3>
		<p>
			<?php echo $this->Time->format('m/d/y', $securityIncident['SecurityIncident']['date_of_resolution']) ; ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Corrective Measures'); ?></h3>
		<p>
			<?php echo ($securityIncident['SecurityIncident']['corrective_measures']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Created'); ?></h3>
		<p>
			<?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['created']); ?>
			&nbsp;
		</p>
		<h3 class="highlight"><?php echo __('Modified'); ?></h3>
		<p>
			<?php echo $this->Time->format('m/d/y g:i a', $securityIncident['SecurityIncident']['modified']); ?>
			&nbsp;
		</p>

	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($acct == 'AYCE Training'): ?>
		<li><?php echo $this->Html->link(__('List Security Incidents'), array('action' => 'index')); ?> </li>
		<?php elseif ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $securityIncident['SecurityIncident']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Security Incidents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Security Incident'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Security Incident'), array('action' => 'edit', $securityIncident['SecurityIncident']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Security Incident', 'name' => 'Security Incident', 'id' => $securityIncident['SecurityIncident']['id'])); ?></li>
		<?php endif; ?>
	</ul>
</div>
