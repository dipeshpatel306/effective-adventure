<div class="ephiRemoved view">
<h2><?php  echo __('Ephi Removed'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Removed By'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['removed_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Returned By'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['returned_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ephiRemoved['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ephiRemoved['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ephi Removed'), array('action' => 'edit', $ephiRemoved['EphiRemoved']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ephi Removed'), array('action' => 'delete', $ephiRemoved['EphiRemoved']['id']), null, __('Are you sure you want to delete # %s?', $ephiRemoved['EphiRemoved']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ephi Removed'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ephi Removed'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
