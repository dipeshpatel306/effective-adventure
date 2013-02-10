<?php
$this->Html->addCrumb('Other Policies & Procedures', '/other_policies_and_procedures');
$this->Html->addCrumb($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['name']);
?>

<div class="otherPoliciesAndProcedures view">
<h2><?php  echo __('Other Policies And Procedure'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherPoliciesAndProcedure['Client']['name'], array('controller' => 'clients', 'action' => 'view', $otherPoliciesAndProcedure['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media'); ?></dt>
		<dd>
			<?php echo h($otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['media']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Other Policies And Procedure'), array('action' => 'edit', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Other Policies And Procedure'), array('action' => 'delete', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id']), null, __('Are you sure you want to delete # %s?', $otherPoliciesAndProcedure['OtherPoliciesAndProcedure']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Other Policies And Procedures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Policies And Procedure'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
