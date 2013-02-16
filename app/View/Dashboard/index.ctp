<?php
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	
	if($group == 1){
		$dashBtn = '<div class="dashBtn approved">
						<div class="btnWrapNarrow">
						<div class="btnText">Click Here</div> 
						<div class="triangle"></div>
						</div>
					</div>';
	} elseif($group == 2){
		$dashBtn = '<div class="dashBtn denied">
						<div class="btnWrapWide">
						<div class="btnText">Subscribers Only!</div> 
						<div class="triangle"></div>
						</div>
					</div>';
	} elseif($group == 3){
		$dashBtn = 'User';
	} else {
		$dashBtn = 'No Role yet';
	}
?>

<div class="dashboard index">
	<h2><?php echo __('Compliance Portal Dashboard'); ?></h2>
	
	<!--<?php echo $this->Html->link('Risk Assessment Questionnaire', array('controller' => 'riskassessments', 'action' => 'take_risk_assessment'))?><br /><br />-->

	<?php 
	
		echo $this->Html->link( // Risk Assessment Questionnaire
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('raq_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Risk Assessment Questionnaire'
								)) .
					'<h3>Risk Assessment Questionnaire</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment Questionnaire</div>' . $dashBtn .
					'</div>',
					array('controller' => 'risk_assessments', 'action' => 'take_risk_assessment'),
					array('escape' => false)
			);
				
		echo $this->Html->link( // Organizational Profile
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('org_prof_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Organizational Profile'
								)) .
					'<h3>Organizational Profile</h3>' .
					'</div>' .
					'<div class="dashSum">Organizational Profile</div>' . $dashBtn .
					'</div>',
					array('controller' => 'organizational_profiles', 'action' => 'index'),
					array('escape' => false)
			);
					
		echo $this->Html->link( // policies & procedures
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('pnp_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Policies & Procedures'
								)) .
					'<h3>Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">HIPAA and Other Policies and Procedures</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'policies_and_procedures'),
					array('escape' => false)
			);
			
			
		echo $this->Html->link( // contracts and documents
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('cnd_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Contracts and Documents'
								)) .
					'<h3>Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment, Business Associates, Disaster Recovery</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);
			
		echo $this->Html->link( // Track and Document
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('tnd_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Track and Document'
								)) .
					'<h3>Track and Document</h3>' .
					'</div>' .
					'<div class="dashSum">Security Incidents and ePHI Received and Removed</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'track_and_document'),
					array('escape' => false)
			);
			
		echo $this->Html->link( // Social Center
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('social.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Social Center'
								)) .
					'<h3>Social Center</h3>' .
					'</div>' .
					'<div class="dashSum">Facebook and Twitter</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'social_center'),
					array('escape' => false)
			);

		echo $this->Html->link( // Education Center
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('edcenter.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Education Center'
								)) .
					'<h3>Education Center</h3>' .
					'</div>' .
					'<div class="dashSum">Videos and Training</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'education_center'),
					array('escape' => false)
			);

		echo $this->Html->link( // Information Center
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('infocenter.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Information Center'
								)) .
					'<h3>Information Center</h3>' .
					'</div>' .
					'<div class="dashSum">Articles and Blog</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'information_center'),
					array('escape' => false)
			);
			
		echo $this->Html->link( // SIRP
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('sirp.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA SIRP'
								)) .
					'<h3>SIRP</h3>' .
					'</div>' .
					'<div class="dashSum">Security Incident Response Plan</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'sirp'),
					array('escape' => false)
			);
			
	/*	echo $this->Html->link( // What you can do with HIPAA Secure Now
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('question_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'What you can do now with the HIPAA Secure Now! Compliance Portal'
								)) .
					'<h3></h3>' .
					'</div>' .
					'<div class="dashSum">What can you do now with the HIPAA Secure Now! Compliance Portal </div>' .
						//'<div class="clickBtn">Click Here!   
						//	<div class="triangle"></div>
						//</div>' .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'what_can_you_do_now'),
					array('escape' => false)
			);
			
		echo $this->Html->link( // Contact
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('infocenter.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA - Contact Us'
								)) .
					'<h3>Contact Us</h3>' .
					'</div>' .
					'<div class="dashSum"></div>' .
						//'<div class="clickBtn">Click Here!   
						//	<div class="triangle"></div>
						//</div>' .
					'</div>',
					array('controller' => 'contact_us', 'action' => 'index'),
					array('escape' => false)
			);			*/	
	?>




	
	<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('pnp_tile.jpg', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>		
		
	<?php echo $this->Html->link('Policies & Procedures', array('controller' => '#'));?>

	
	<div class='triangle'></div>
	<ul>
		<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies_and_procedures', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Other Policies & Procedures', array('controller' => 'other_policies_and_procedures', 'action' => 'index')); ?></li>
	</ul>	
	</div>-->
	

	<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('cnd_tile.jpg', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>		
	<?php echo $this->Html->link('Contracts & Documents', array('controller' => '#'));?>
	<ul>
		<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>				
		<li><?php echo $this->Html->link('Business Associate Agreements', array('controller' => 'business_associate_agreements', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Disaster Recovery Plans', array('controller' => 'disaster_recovery_plans', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Other Contracts & Documents', array('controller' => 'other_contracts_and_documents', 'action' => 'index')); ?></li>
	</ul>
	</div>-->

	<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('tnd_tile.jpg', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>	
	<?php echo $this->Html->link('Track & Document', array('controller' => '#'));?>
	<ul>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index')); ?></li>				
		<li><?php echo $this->Html->link('Server Room Access', array('controller' => 'server_room_access', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('ePHI Removed', array('controller' => 'ephi_removed', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('ePHI Recieved', array('controller' => 'ephi_recieved', 'action' => 'index')); ?></li>
	</ul>
	<br />
	</div>-->

	<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('social.png', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>	
	<b>Social Center</b>
	<ul>
		<li><?php echo $this->Html->link('Blog', 'http://www.hipaasecurenow.com/index.php/blog/', array('target' => '_blank')); ?>
			- External Link
		</li>
		<li>Facebook and Twitter feed - TODO</li>
	</ul>		
	</div>		-->
	
	<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('edcenter.png', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>	
	<b>Education Center</b>
	<ul>
		<li><?php echo $this->Html->link('HIPAA Security Tips and Reminders', 
					'http://www.hipaasecurenow.com/index.php/security-tips-and-reminders/', array('target' => '_blank')); ?>
		- External Link
		</li>
		<li>
			Education Videos TODO
		</li>
	</ul>		
	</div>-->

	<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('infocenter.png', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>	
	<b>Information Center (All external Links)</b>
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
	</div>-->

<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('sirp.png', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>	
	<b>SIRP</b>
	<ul>
		<li>
		<?php echo $this->Html->link('SIRT', array('controller' => 'sirt_teams', 'action' => 'index'));?>	
		</li>
		<li>
			<?php echo $this->Html->link('IRP', array('controller' => '#', 'action' => '/'));?>
			- Link is dead 	
		</li>
		<li>
			<?php echo $this->Html->link('IRP', array('controller' => '#', 'action' => '/'));?>
			- Same link as Track & Document / Security Incidents	
		</li>
		<li>
			<?php echo $this->Html->link('Background Incidents', array('controller' => '#', 'action' => '/'));?>
			- Link is dead	
		</li>
	</ul>	
</div>-->

<!--<div class="dashBox">	
	<b>Contact</b>
	<ul>
		<li>
		<?php echo $this->Html->link('Contact Us', array('controller' => 'contactUs', 'action' => 'contact'));?>	
		</li>
	</ul>
</div>-->

<!--<div class="dashBox">
	<?php 
		echo $this->Html->image('question_tile.jpg', array(
			'class' => 'dashTile',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
	?>
		<b>What can you do now with the HIPAA Secure Now! Compliance Portal</b> - static page TODO
	<ul>
		<li>
		<?php echo $this->Html->link('What you can do now!', array('controller' => '#', 'action' => '/'));?>	
		</li>
	</ul>	
</div>-->

	
	<!--<table>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($dashboard as $dashboard): ?>
	<tr>
		<td><?php echo h($dashboard['Dashboard']['id']); ?>&nbsp;</td>
		<td><?php echo h($dashboard['Dashboard']['title']); ?>&nbsp;</td>
		<td><?php echo h($dashboard['Dashboard']['body']); ?>&nbsp;</td>
		<td><?php echo h($dashboard['Dashboard']['created']); ?>&nbsp;</td>
		<td><?php echo h($dashboard['Dashboard']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dashboard['Dashboard']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dashboard['Dashboard']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dashboard['Dashboard']['id']), null, __('Are you sure you want to delete # %s?', $dashboard['Dashboard']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>-->
	

	
	
	
</div>
<div class="actions newsFeed">
	<h3><?php echo __('Latest News'); ?></h3>
	<!--<ul>
		<li><?php echo $this->Html->link(__('New Dashboard'), array('action' => 'add')); ?></li>
	</ul>-->
	<?php echo $this->element('feeds'); ?>
</div>
