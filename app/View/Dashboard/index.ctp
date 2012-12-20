<div class="dashboard index">
	<h2><?php echo __('Dashboard'); ?></h2>
	
	<p>Dashboard under Construction!</p>
	
	<h4>Currently Working Modules:</h4>
	
	<?php echo $this->Html->link('Home/Dashboard', array('controller' => 'dashboard', 'action' => 'index'))?><br /><br />
	
	
	<?php echo $this->Html->link('Policies & Procedures', array('controller' => 'policies', 'action' => 'index'));?>
		<ul>
		<li><?php echo $this->Html->link('HIPAA Policies & Procedures', array('controller' => 'policies', 'action' => 'policies_and_procedures')); ?></li>
		<li><?php echo $this->Html->link('Other Policies & Procedures', array('controller' => 'policies', 'action' => 'other_policies_and_procedures')); ?></li>
		</ul>
	<br />	
	<?php echo $this->Html->link('Contracts & Documents', array('controller' => 'documents', 'action' => 'index'));?>
	<ul>
		<li><?php echo $this->Html->link('Risk Assessment Documents', array('controller' => 'documents', 'action' => 'risk_assessment_documents')); ?></li>				
		<li><?php echo $this->Html->link('Disaster Recovery Plans', array('controller' => 'documents', 'action' => 'disaster_recovery_plans')); ?></li>
		<li><?php echo $this->Html->link('Other Contracts & Documents', array('controller' => 'documents', 'action' => 'other_contracts_and_documents')); ?></li>
	</ul>
	<br />
	
	<b>Social Center</b>
	<ul>
		<li><?php echo $this->Html->link('Blog', 'http://www.hipaasecurenow.com/index.php/blog/', array('target' => '_blank')); ?></li>
	</ul>	
	<br />
	
	<b>Education Center</b>
	<ul>
		<li><?php echo $this->Html->link('HIPAA Security Tips and Reminders', 
					'http://www.hipaasecurenow.com/index.php/security-tips-and-reminders/', array('target' => '_blank')); ?></li>
	</ul>
	<br />
	
	<b>Information Center</b>
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
