<div class="dashboard index">
	<h2><?php echo __('Dashboard'); ?></h2>
	
	<p>Dashboard under Construction!</p>
	
	<?php echo $this->Html->link('Home/Dashboard', array('controller' => 'dashboard', 'action' => 'index'))?><br /><br />
	
	
	<?php echo $this->Html->link('Policies & Procedures', array('controller' => '#'));?>
		<ul>
		<li> Does everyone get the same documents or their own individual instances?</li>
		<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Other Policies & Procedures', array('controller' => 'other_policies', 'action' => 'index')); ?></li>
		</ul>
	<br />	

	<?php echo $this->Html->link('Contracts & Documents', array('controller' => '#'));?>
	<ul>
		<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => 'risk_assessment_documents', 'action' => 'index')); ?></li>				
		<li><?php echo $this->Html->link('Business Associate Agreements', array('controller' => 'business_associate_agreements', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Disaster Recovery Plans', array('controller' => 'disaster_recovery_plans', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Other Contracts & Documents', array('controller' => 'other_contracts_and_documents', 'action' => 'index')); ?></li>
	</ul>
	<br />

	<?php echo $this->Html->link('Track & Document', array('controller' => '#'));?>
	<ul>
		<li><?php echo $this->Html->link('Security Incidents', array('controller' => 'security_incidents', 'action' => 'index')); ?></li>				
		<li><?php echo $this->Html->link('Server Room Access', array('controller' => 'server_room_access', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('ePHI Removed', array('controller' => 'ephi_removed', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('ePHI Recieved', array('controller' => 'ephi_recieved', 'action' => 'index')); ?></li>
	</ul>
	<br />
		
	<b>Social Center</b>
	<ul>
		<li><?php echo $this->Html->link('Blog', 'http://www.hipaasecurenow.com/index.php/blog/', array('target' => '_blank')); ?>
			- External Link
		</li>
		<li>Facebook and Twitter feed - TODO</li>
	</ul>	
	<br />
	
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
	<br />
	
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
		</ul><br />

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
	</ul><br />
	
	<b>Contact</b>
	<ul>
		<li>
		<?php echo $this->Html->link('Contact Us', array('controller' => 'contactUs', 'action' => 'contact'));?>	
		</li>
	</ul><br />
	
		<b>What can you do now with the HIPAA Secure Now! COmpliance Portal</b> - static page TODO
	<ul>
		<li>
		<?php echo $this->Html->link('What you can do now!', array('controller' => '#', 'action' => '/'));?>	
		</li>
	</ul>
	
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
