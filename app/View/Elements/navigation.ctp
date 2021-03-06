<?php if($this->Session->read('Auth.User')): ?>
	
<div class="nav">
	<ul>
		<li><?php echo $this->Html->link('Home', array('controller' => 'dashboard', 'action' => 'index'))?></li>
		
		<li><?php echo $this->Html->link('Policies & Procedures', array('controller' => '#', 'action' => '/'));?>
			<ul>
				<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Other Policies & Procedures', array('controller' => 'other_policies', 'action' => 'index')); ?></li>
			</ul>
		</li>
		
		<li><?php echo $this->Html->link('Contracts & Documents', array('controller' => '#', 'action' => '/'));?>
			<ul>
				<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>				
				<li><?php echo $this->Html->link('Business Associate Agreements', array('controller' => 'business_associate_agreements', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Disaster Recovery Plans', array('controller' => 'disaster_recovery_plans', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Other Contracts & Documents', array('controller' => 'other_contracts_and_documents', 'action' => 'index')); ?></li>
			</ul>
		</li>		

		<li><?php echo $this->Html->link('Track & Document', array('controller' => '#', 'action' => '/'));?>
			<ul>
				<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Server Room Access', array('controller' => 'server_room_access', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('ePHI Removed', array('controller' => 'ephi_removed', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('ePHI Received', array('controller' => 'ephi_received', 'action' => 'index')); ?></li>
			</ul>
		</li>		
		
		<li><?php echo $this->Html->link('Social Center', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('Facebook', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Twitter', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Blog', 'http://www.hipaasecurenow.com/index.php/blog/', array('target' => '_blank')); ?></li>
			</ul>
		</li>

		<li><?php echo $this->Html->link('Education Center', array('controller' => '/', 'action' => ''));?> <!-- TODO Add Videos -->
			<ul>
				<li><?php echo $this->Html->link('HIPAA Security Training', 'https://www.hipaasecurenow.com/portal/', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('What is HIPAA? (Part 1)', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('What is HIPAA? (Part 2)', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('10 Things You Can Do To Protect Patient Data', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('HIPAA Security Tips and Reminders', 
					'http://www.hipaasecurenow.com/index.php/security-tips-and-reminders/', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('HIPAA Secure Now!', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>

		<li><?php echo $this->Html->link('Information Center', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('Policies & Procedures', 'http://www.hipaasecurenow.com/?cat=10', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('Risk Assessments', 'http://www.hipaasecurenow.com/?cat=8', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('Security Training', 'http://www.hipaasecurenow.com/?cat=9', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('HIPAA Audits', 'http://www.hipaasecurenow.com/?s=HIPAA+Audits', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('What to Do If You Get Audited', 				'http://www.hipaasecurenow.com/index.php/you-received-a-hipaa-audit-notification-now-what/', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('Practice Administrators Role w/HIPAA', 				'http://www.hipaasecurenow.com/index.php/practice-administrators-are-the-key-to-hipaa-security/', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('Breach Notification', 
				'http://www.hhs.gov/ocr/privacy/hipaa/administrative/breachnotificationrule/index.html', array('target' => '_blank')); ?></li>
				<li><?php echo $this->Html->link('Service Overview', 'http://www.hipaasecurenow.com/index.php/service/', array('target' => '_blank')); ?></li>
			</ul>
		</li>

		<li><?php echo $this->Html->link('SIRP', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('SIRT', array('controller' => 'sirt_teams', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('IRP', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Security Incidents', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Background Information', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>


		
		<li><?php echo $this->Html->link('Contact', array('controller' => 'contact_us', 'action' => 'contact'))?></li>
		
		<?php  // Allow Managers to see users from their own client. TODO set restriction in controller 
			if($this->Session->read('Auth.User.group_id') == 2): 
		?>
					<li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li>
				
		<?php endif; ?>	 
		

	</ul>
</div>
<?php endif; ?>
