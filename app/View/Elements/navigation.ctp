<?php if($this->Session->read('Auth.User')): ?>
	
<div class="nav">
	<ul>
		<li><?php echo $this->Html->link('Home', array('controller' => '/', 'action' => ''))?></li>
		
		<li><?php echo $this->Html->link('Policies & Procedures', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Other Policies & Procedures', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>
		
		<li><?php echo $this->Html->link('Contracts & Documents', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('Business Associate Agreements', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Other Contracts & Documents', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Disaster Recovery Plans', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>		

		<li><?php echo $this->Html->link('Track & Document', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('Server Room Access', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Security Incidents', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('ePHI Removed', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('ePHI Recieved', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>		

		<li><?php echo $this->Html->link('Education Center', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('HIPAA Security Training', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('What is HIPAA? (Part 1)', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('What is HIPAA? (Part 2)', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('10 Things You Can Do To Protect Patient Data', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('HIPAA Security Tips and Reminders', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('HIPAA Secure Now!', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>

		<li><?php echo $this->Html->link('SIRP', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('SIRT', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Security Incidents', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Background Incidents', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Background Information', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('IRP', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>

		<li><?php echo $this->Html->link('Social Center', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('Facebook', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Twitter', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Blog', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>

		<li><?php echo $this->Html->link('Information Center', array('controller' => '/', 'action' => ''));?>
			<ul>
				<li><?php echo $this->Html->link('Policies & Procedures', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Risk Assessments', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Security Training', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('HIPAA Audits', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('What to Do If You Get Audited', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Practice Administrators Role w/HIPAA', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Security Training', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Breach Notification', array('controller' => '/', 'action' => '')); ?></li>
				<li><?php echo $this->Html->link('Service Overview', array('controller' => '/', 'action' => '')); ?></li>
			</ul>
		</li>
		
		<!--<li><?php echo $this->Html->link('What You Can Do With The HIPAA Secure Now! Compliance Portal', array('controller' => 'dashboard', 'action' => ''))?></li>-->
		<li><?php echo $this->Html->link('Contact', array('controller' => 'dashboard', 'action' => ''))?></li>
		
		<?php  // Allow Managers to see users from their own client. TODO set restriction in controller 
			if($this->Session->read('Auth.User.group_id') == 2): 
		?>
					<li><?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')); ?></li>
				
		<?php endif; ?>	 
		

	</ul>
</div>
<?php endif; ?>
