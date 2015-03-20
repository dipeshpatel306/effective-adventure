<?php
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
	$training_name = Configure::read('Theme.training_name');
	$pnp_name = Configure::read('Theme.pnp_name');
	$baa_name = Configure::read('Theme.baa_name');
	$baa_link_name = Configure::read('Theme.baa_link_name');
	$ra_docs_name = Configure::read('Theme.ra_docs_name');
?>
<div class='sidebarContent'>
<h3>Quick Links: </h3>

<ul>

	<?php if($acct == 'Subscription' && $group == 2): ?>
		<li><?php echo $this->Html->link($baa_name, array('controller' => $baa_link_name, 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($pnp_name, array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($ra_docs_name, array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($training_name, array('controller' => 'education_center', 'action' => 'training')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>


	<?php if(($acct == 'Subscription' || $acct == 'Initial') && $group == 3): ?>
		<li><?php echo $this->Html->link($pnp_name, array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($training_name, array('controller' => 'education_center', 'action' => 'training')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>

	<?php if($acct == 'Meaningful Use' && $group == 2): ?>
		<li><?php echo $this->Html->link($baa_name, array('controller' => $baa_link_name, 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($ra_docs_name, array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>
	
	<?php if($acct == 'Training'): ?>
        <li><?php echo $this->Html->link($training_name, array('controller' => 'education_center', 'action' => 'training')); ?></li>
	<?php endif; ?>

	<?php if($acct == 'Meaningful Use' && $group == 3): ?>
		<li><?php echo $this->Html->link($ra_docs_name, array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>


	<?php if($group == 1): ?>
		<li><?php echo $this->Html->link($baa_name, array('controller' => $baa_link_name, 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($pnp_name, array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($ra_docs_name, array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link($training_name, array('controller' => 'education_center', 'action' => 'training')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>


</ul>

</div>
