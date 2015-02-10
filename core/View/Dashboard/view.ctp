<div class="dashboard view">
<h2><?php  echo __('Dashboard'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dashboard'), array('action' => 'edit', $dashboard['Dashboard']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dashboard'), array('action' => 'delete', $dashboard['Dashboard']['id']), null, __('Are you sure you want to delete # %s?', $dashboard['Dashboard']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dashboard'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dashboard'), array('action' => 'add')); ?> </li>
	</ul>
</div>
