<?php
$this->Html->addCrumb('Clients', '/clients');
$this->Html->addCrumb($client['Client']['name']);

if(empty($client['Client']['risk_assessment_status'])){
	$completed = '';
} else {
	$completed = 'class="completed"';
}

if($client['Client']['active'] == 'Yes'){
	$active = "class='active'";
} else {
	$active = "class='inactive'";
}
?>
<div class="clients view">
<h2><?php  echo __('Client'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Type'); ?></dt>
		<dd>
			<?php echo h($client['Client']['account_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin Account'); ?></dt>
		<dd>
			<?php echo h($client['Client']['admin_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Account'); ?></dt>
		<dd>
			<?php echo h($client['Client']['user_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partner'); ?></dt>
		<dd>
			<?php echo h($client['Partner']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Risk Assessment Completed'); ?></dt>
		<dd <?php echo $completed; ?> >
			<?php 
			if(empty($client['Client']['risk_assessment_status'])){
				echo '';
			} else {
				echo $this->Time->format('m/d/y', $client['Client']['risk_assessment_status']);
			}
			
			 ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php 
			if($client['Client']['last_login']){
				echo ''; 
			} else {
				echo $this->Time->format('m/d/y g:i a', $client['Client']['last_login']); 
			}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Active'); ?></dt>
		<dd <?php echo $active; ?>>
			<?php echo $client['Client']['active']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $client['Client']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $client['Client']['modified']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($client['Client']['details']); ?>
			&nbsp;
		</dd>-->

	</dl>
		<h2><?php echo __('Details'); ?></h2>
		<?php echo h($client['Client']['details']); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>		
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?> </li>		
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?> </li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="clientPanel">

<!-- Users -->
<div class="related">
	<h3><?php echo __('Users'); ?></h3>
	<?php if(!empty($users)): ?>	
	<table>
	<tr>
		<th><?php echo $this->Paginator->sort('User.last_name','Name'); ?></th> 		
		<th><?php echo $this->Paginator->sort('User.email', 'Email'); ?></th>
		<th><?php echo $this->Paginator->sort('Group.name', 'Group Role'); ?></th>
		<th><?php echo $this->Paginator->sort('User.last_login', 'Last login'); ?></th>		
		<th><?php echo $this->Paginator->sort('User.created', 'Created'); ?></th>
		<th><?php echo $this->Paginator->sort('User.modified', 'Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user['User']['last_name'] . ', ' . $user['User']['first_name']; ?></td>
			<td><?php echo $this->Text->autoLinkEmails($user['User']['email']); ?></td>			
			<td><?php echo $user['Group']['name']; ?></td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $user['User']['last_login']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $user['User']['created']); ?></td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $user['User']['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['User']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
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
	</div>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<!-- Policies & Procedures -->
<div class="related">
	<h3><?php echo __('Policies & Procedures Documents'); ?></h3>

	<?php if (!empty($client['PoliciesAndProceduresDocument'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Policy'); ?></th>
		<th><?php echo __('Document'); ?></th>	
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['PoliciesAndProceduresDocument'] as $pnp): ?>
		<tr>
			<td><?php echo $pnp['id']; ?></td>
			<td>
		<?php 
			$pnpLink =  preg_replace('/\/.*\//', '', $pnp['document']);
			echo $this->Html->link($pnpLink, $pnp['document']);
		?>				
			</td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $pnp['created']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $pnp['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'policies_and_procedures_documents', 'action' => 'view', $pnp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'policies_and_procedures_documents', 'action' => 'edit', $pnp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'policies_and_procedures_documents', 'action' => 'delete', $pnp['id']), null, __('Are you sure you want to delete # %s?', $pnp['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>

	</table>
<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Policies & Procedure  Document'), array('controller' => 'policies_and_procedures_documents', 'action' => 'add')); ?> </li>
		</ul>
	</div>	

</div>

<!-- Other Policies & Procedures -->
<div class="related">
	<h3><?php echo __('Other Policies & Procedures'); ?></h3>

	<?php if (!empty($client['OtherPoliciesAndProcedure'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Attachment'); ?></th>	
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['OtherPoliciesAndProcedure'] as $opnp): ?>
		<tr>
			<td><?php echo $opnp['name']; ?></td>

			<td>
			<?php 
				$opnpLink =  preg_replace('/\/.*\//', '', $opnp['attachment']);
				echo $this->Html->link($opnpLink, $opnp['attachment']);
			?>			
			</td>
			
			<td><?php echo $this->Time->format('m/d/y g:i a', $opnp['created']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $opnp['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'other_policies_and_procedures', 'action' => 'view', $opnp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'other_policies_and_procedures', 'action' => 'edit', $opnp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'other_policies_and_procedures', 'action' => 'delete', $opnp['id']), null, __('Are you sure you want to delete # %s?', $opnp['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Other Policies & Procedure'), array('controller' => 'other_policies_and_procedures', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>

<!-- Risk Assessment Documents -->
<div class="related">
	<h3><?php echo __('Risk Assessment Documents'); ?></h3>

	<?php if (!empty($client['RiskAssessmentDocument'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Attachment'); ?></th>	
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['RiskAssessmentDocument'] as $rad): ?>
		<tr>
			<td><?php echo $rad['name']; ?></td>
			<td>
			<?php 
				$radLink =  preg_replace('/\/.*\//', '', $rad['attachment']);
				echo $this->Html->link($radLink, $rad['attachment']);
			?>			
			</td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $rad['created']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $rad['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'risk_assessment_documents', 'action' => 'view', $rad['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'risk_assessment_documents', 'action' => 'edit', $rad['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'risk_assessment_documents', 'action' => 'delete', $rad['id']), null, __('Are you sure you want to delete # %s?', $rad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Risk Assessment Document'), array('controller' => 'risk_assessment_documents', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>

<!-- Business Associate Agreements -->
<div class="related">
	<h3><?php echo __('Business Associate Agreements'); ?></h3>

	<?php if (!empty($client['BusinessAssociateAgreement'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Contract Date'); ?></th> 
		<th><?php echo __('Attachment'); ?></th>	
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['BusinessAssociateAgreement'] as $boa): ?>
		<tr>
			<td><?php echo $boa['name']; ?></td>

			<td><?php echo $boa['contract_date']; ?></td>
			<td>
			<?php 
				$boaLink =  preg_replace('/\/.*\//', '', $boa['attachment']);
				echo $this->Html->link($boaLink, $boa['attachment']);
			?>	
			</td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $boa['created']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $boa['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'business_associate_agreements', 'action' => 'view', $boa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'business_associate_agreements', 'action' => 'edit', $boa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'business_associate_agreements', 'action' => 'delete', $boa['id']), null, __('Are you sure you want to delete # %s?', $boa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Business Associate Agreement'), array('controller' => 'business_associate_agreements', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>

<!-- Disaster Recovery Plans -->
<div class="related">
	<h3><?php echo __('Disaster Recovery Plans'); ?></h3>

	<?php if (!empty($client['DisasterRecoveryPlan'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Attachment'); ?></th> 
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['DisasterRecoveryPlan'] as $drp): ?>
		<tr>
			<td><?php echo $drp['name']; ?></td>
			<td>
			<?php 
				$drpLink =  preg_replace('/\/.*\//', '', $drp['attachment']);
				echo $this->Html->link($drpLink, $drp['attachment']);
			?>	
			</td>				
			<td><?php echo $this->Time->format('m/d/y g:i a', $drp['created']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $drp['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'disaster_recovery_plans', 'action' => 'view', $drp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'disaster_recovery_plans', 'action' => 'edit', $drp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'disaster_recovery_plans', 'action' => 'delete', $drp['id']), null, __('Are you sure you want to delete # %s?', $drp['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Disaster Recovery Plan'), array('controller' => 'disaster_recovery_plans', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>

<!-- Other Contracts & Documents -->
<div class="related">
	<h3><?php echo __('Other Contracts & Documents'); ?></h3>

	<?php if (!empty($client['OtherContractsAndDocument'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Attachment'); ?></th> 
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['OtherContractsAndDocument'] as $ocad): ?>
		<tr>
			<td><?php echo $ocad['name']; ?></td>
			<td>
			<?php 
				$ocadLink =  preg_replace('/\/.*\//', '', $ocad['attachment']);
				echo $this->Html->link($ocadLink, $ocad['attachment']);
			?>	
			</td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $ocad['created']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y g:i a', $ocad['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'OtherContractsAndDocuments', 'action' => 'view', $ocad['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'OtherContractsAndDocuments', 'action' => 'edit', $ocad['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'OtherContractsAndDocuments', 'action' => 'delete', $ocad['id']), null, __('Are you sure you want to delete # %s?', $ocad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Other Contracts & Document'), array('controller' => 'OtherContractsAndDocuments', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>

<!-- Security Incident -->
<div class="related">
	<h3><?php echo __('Security Incident'); ?></h3>

	<?php if (!empty($client['SecurityIncident'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Incident Date/Time'); ?></th>
		<th><?php echo __('Discovery Date'); ?></th> 
		<th><?php echo __('Reported By'); ?></th> 

		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['SecurityIncident'] as $si): ?>
		<tr>
			<td><?php echo $this->Time->format('m/d/y', $si['date_of_incident']) . ' ' . $this->Time->format('g:i a', $si['time_of_incident']); ?></td>			
			<td><?php echo $this->Time->format('m/d/y', $si['discovery_date']); ?></td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $si['reported_by']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'SecurityIncident', 'action' => 'view', $si['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'SecurityIncident', 'action' => 'edit', $si['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'SecurityIncident', 'action' => 'delete', $si['id']), null, __('Are you sure you want to delete # %s?', $si['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Security Incident'), array('controller' => 'SecurityIncidents', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>

<!-- Server Room Access -->
<div class="related">
	<h3><?php echo __('Server Room Access'); ?></h3>

	<?php if (!empty($client['ServerRoomAccess'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Date/Time'); ?></th>
		<th><?php echo __('Person'); ?></th> 
		<th><?php echo __('Company'); ?></th>
		<th><?php echo __('Reason'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['ServerRoomAccess'] as $sra): ?>
		<tr>
			<td><?php echo $this->Time->format('m/d/y', $sra['date']) . ' ' . $this->Time->format('g:i a', $sra['time']); ?></td>
			<td><?php echo $sra['person']; ?></td>
			<td><?php echo $sra['company']; ?></td>
			<td><?php echo $sra['reason']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ServerRoomAccess', 'action' => 'view', $sra['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ServerRoomAccess', 'action' => 'edit', $sra['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ServerRoomAccess', 'action' => 'delete', $sra['id']), null, __('Are you sure you want to delete # %s?', $sra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Server Room Access'), array('controller' => 'ServerRoomAccess', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>

<!-- ePHI Removed -->
<div class="related">
	<h3><?php echo __('Ephi Removed'); ?></h3>

	<?php if (!empty($client['EphiRemoved'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Date/Time'); ?></th>
		<th><?php echo __('Description'); ?></th> 
		<th><?php echo __('Removed By'); ?></th>
		<th><?php echo __('Returned By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['EphiRemoved'] as $erm): ?>
		<tr>
			<td><?php echo $this->Time->format('m/d/y', $erm['date']) . ' ' . $this->Time->format('g:i a', $erm['time']); ?></td>
			<td><?php echo $erm['description']; ?></td>
			<td><?php echo $erm['removed_by']; ?></td>
			<td><?php echo $erm['returned_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'EphiRemoved', 'action' => 'view', $erm['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'EphiRemoved', 'action' => 'edit', $erm['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'EphiRemoved', 'action' => 'delete', $erm['id']), null, __('Are you sure you want to delete # %s?', $erm['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ephi Removed'), array('controller' => 'EphiRemoved', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>


<!-- ePHI received -->
<div class="related">
	<h3><?php echo __('Ephi Received'); ?></h3>

	<?php if (!empty($client['EphiReceived'])): ?>
		
	<table>
	<tr>
		<th><?php echo __('Received Date/Time'); ?></th>
		<th><?php echo __('Patient Name'); ?></th> 
		<th><?php echo __('received By'); ?></th> 
		<th><?php echo __('Returned Date/Time'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	<?php
		$i = 0;
		foreach ($client['EphiReceived'] as $erc): ?>
		<tr>
			<td><?php echo $this->Time->format('m/d/y', $erc['date_received']) . ' ' . $this->Time->format('g:i a', $erc['time_received']); ?></td>
			<td><?php echo $erc['patient_name']; ?></td>
			<td><?php echo $erc['received_by']; ?></td>
			<td><?php echo $this->Time->format('m/d/y', $erc['date_returned']) . ' ' . $this->Time->format('g:i a', $erc['time_returned']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'EphiReceived', 'action' => 'view', $erc['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'EphiReceived', 'action' => 'edit', $erc['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'EphiReceived', 'action' => 'delete', $erc['id']), null, __('Are you sure you want to delete # %s?', $erc['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ephi Received'), array('controller' => 'EphiReceived', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>
</div>