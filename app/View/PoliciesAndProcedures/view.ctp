<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
$this->Html->addCrumb($policiesAndProcedure['PoliciesAndProcedure']['name']);

	$group = $this->Session->read('Auth.User.group_id'); 
?>

<div class="policiesAndProcedures view">
<h2><?php  echo __('Policies And Procedures'); ?></h2>
	<dl>
		<dt><?php echo __('Policy'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$policiesAndProcedure['PoliciesAndProcedure']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$policiesAndProcedure['PoliciesAndProcedure']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	
	<h2><?php echo __('Description'); ?></h2>
	<?php echo $policiesAndProcedure['PoliciesAndProcedure']['description']; ?>
	
	<?php if(!empty($policiesAndProcedure['PoliciesAndProcedure']['details'])): ?>	
	<h2><?php echo __('Details'); ?></h2>
	<?php echo $policiesAndProcedure['PoliciesAndProcedure']['details']; ?>
	<?php endif; ?>
	

	

	
<div class="related">
	<h2><?php echo __('Policies And Procedures Documents'); ?></h2>
	<?php  if (!empty($policiesAndProcedure['PoliciesAndProceduresDocument'])): ?>
	<table>
	<tr>
	
		<th><?php echo __('Document'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($policiesAndProcedureDocument as $policiesAndProceduresDocument): ?>
		<tr>
			<td>
			<?php 
				$docLink =  preg_replace('/\/.*\//', '', $policiesAndProceduresDocument['document']);
				echo $this->Html->link($docLink, $policiesAndProceduresDocument['document']);
			?>	
			</td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $policiesAndProceduresDocument['created']); ?></td>
			<td><?php echo $this->Time->format('m/d/y g:i a',$policiesAndProceduresDocument['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', $policiesAndProceduresDocument['document']); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'policies_and_procedures_documents', 'action' => 'edit',$policiesAndProceduresDocument['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'policies_and_procedures_documents', 'action' => 'delete', $policiesAndProceduresDocument['id']), null, __('Are you sure you want to delete # %s?',  $policiesAndProceduresDocument['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php  endif; ?>
	<?php if(!empty($policiesAndProcedure['PoliciesAndProcedure']['media'])): ?>
		<h2><?php echo __('Media'); ?></h2>
		<?php echo $policiesAndProcedure['PoliciesAndProcedure']['media']; ?>
	<?php endif; ?>
	<br /><br />
</div>	
	
	
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php if($group == 1): ?>	
	<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Policies And Procedures'), array('action' => 'edit', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Policies And Procedure'), array('action' => 'delete', $policiesAndProcedure['PoliciesAndProcedure']['id']), null, __('Are you sure you want to delete # %s?', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?> </li>
<br />
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'policies_and_procedures_documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'policies_and_procedures_documents', 'action' => 'add')); ?> </li>
	</ul>
	<?php endif; ?>
</div>

