<div class="otherPolicies view">
<h2><?php  echo __('Other Policy'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otherPolicy['OtherPolicy']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($otherPolicy['OtherPolicy']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($otherPolicy['OtherPolicy']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherPolicy['Client']['name'], array('controller' => 'clients', 'action' => 'view', $otherPolicy['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($otherPolicy['OtherPolicy']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($otherPolicy['OtherPolicy']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($otherPolicy['OtherPolicy']['attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media'); ?></dt>
		<dd>
			<?php echo h($otherPolicy['OtherPolicy']['media']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Other Policy'), array('action' => 'edit', $otherPolicy['OtherPolicy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Other Policy'), array('action' => 'delete', $otherPolicy['OtherPolicy']['id']), null, __('Are you sure you want to delete # %s?', $otherPolicy['OtherPolicy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Other Policies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Policy'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
