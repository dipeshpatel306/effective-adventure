<?php
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
?>
<div class='sidebarContent'>
<h3>Quick Links: </h3>

<ul>

	<?php if($acct == 'Subscription' && $group == 2): ?>
		<li><?php echo $this->Html->link('Business Associate Agreements', array('controller' => 'business_associate_agreements', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('HIPAA Security Training', array('controller' => 'education_center', 'action' => 'training')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>


	<?php if(($acct == 'Subscription' || $acct == 'Initial') && $group == 3): ?>
		<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('HIPAA Security Training', array('controller' => 'education_center', 'action' => 'training')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>

	<?php if($acct == 'Meaningful Use' && $group == 2): ?>
		<li><?php echo $this->Html->link('Business Associate Agreements', array('controller' => 'business_associate_agreements', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>
	
	<?php if($acct == 'Training'): ?>
        <li><?php echo $this->Html->link('HIPAA Security Training', array('controller' => 'education_center', 'action' => 'training')); ?></li>
	<?php endif; ?>

	<?php if($acct == 'Meaningful Use' && $group == 3): ?>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>


	<?php if($acct == 'HIPAA' ): ?>
		<li><?php echo $this->Html->link('Business Associate Agreements', array('controller' => 'business_associate_agreements', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('HIPAA Security Training', array('controller' => 'education_center', 'action' => 'training')); ?></li>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index'));?></li>
	<?php endif; ?>


</ul>

</div>
