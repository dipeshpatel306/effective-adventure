<?php
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');

?>
<div class='sidebarContent'>
<h3>Quick Links: </h3>

<ul>
	<li>
	<?php 
	if($group != 3){
		echo $this->Html->link('Business Associate Agreements', array('controller' => 'business_associate_agreements', 'action' => 'index')); 
	}
	?>
	</li>
	
	<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
	
	
	<li>
	<?php 
		if($acct != 'Meaningful Use'){
		echo $this->Html->link('Risk Assessment Documents', array('controller' => 'risk_assessment_documents', 'action' => 'index')); 			
		}
	?>
	</li>
	
	<li><?php echo $this->Html->link('HIPAA Security Training', array('controller' => 'dashboard', 'action' => 'education_center')); ?></li>

	
	<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index')); ?></li>
</ul>

</div>
