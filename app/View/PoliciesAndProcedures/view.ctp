<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
$this->Html->addCrumb($policiesAndProcedure['PoliciesAndProcedure']['name']);


// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="policiesAndProcedures view">
<h2><?php  echo __('Policies And Procedure'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($policiesAndProcedure['Client']['name'], array('controller' => 'clients', 'action' => 'view', $policiesAndProcedure['Client']['id'])); ?>
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
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['media']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('action' => 'index')); ?> </li>		
		
		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('Edit Policies And Procedure'), array('action' => 'edit', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Policies And Procedure'), array('action' => 'delete', $policiesAndProcedure['PoliciesAndProcedure']['id']), null, __('Are you sure you want to delete # %s?', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?> </li>			
		<li><?php echo $this->Html->link(__('New Policies And Procedure'), array('action' => 'add')); ?> </li>
		<?php endif; ?>			

	</ul>
</div>
