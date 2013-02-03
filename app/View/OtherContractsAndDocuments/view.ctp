<div class="otherContractsAndDocuments view">
<h2><?php  echo __('Other Contracts And Document'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherContractsAndDocument['Client']['name'], array('controller' => 'clients', 'action' => 'view', $otherContractsAndDocument['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($otherContractsAndDocument['OtherContractsAndDocument']['attachment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Other Contracts And Document'), array('action' => 'edit', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Other Contracts And Document'), array('action' => 'delete', $otherContractsAndDocument['OtherContractsAndDocument']['id']), null, __('Are you sure you want to delete # %s?', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Other Contracts And Documents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Contracts And Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
