<div class="sirtTeams view">
<h2><?php  echo __('Sirt Team'); ?></h2>
	<dl>

		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address 1'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['address_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address 2'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['address_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($sirtTeam['SirtTeam']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sirtTeam['Client']['name'], array('controller' => 'clients', 'action' => 'view', $sirtTeam['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $sirtTeam['SirtTeam']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $sirtTeam['SirtTeam']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sirt Team'), array('action' => 'edit', $sirtTeam['SirtTeam']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sirt Team'), array('action' => 'delete', $sirtTeam['SirtTeam']['id']), null, __('Are you sure you want to delete # %s?', $sirtTeam['SirtTeam']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sirt Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sirt Members'), array('controller' => 'sirt_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Member'), array('controller' => 'sirt_members', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sirt Members'); ?></h3>
	<?php if (!empty($sirtTeam['SirtMember'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Company'); ?></th>
		<th><?php echo __('Responsibility'); ?></th>
		<th><?php echo __('Sirt Team Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($sirtTeam['SirtMember'] as $sirtMember): ?>
		<tr>
			<td><?php echo $sirtMember['id']; ?></td>
			<td><?php echo $sirtMember['first_name']; ?></td>
			<td><?php echo $sirtMember['last_name']; ?></td>
			<td><?php echo $sirtMember['company']; ?></td>
			<td><?php echo $sirtMember['responsibility']; ?></td>
			<td><?php echo $sirtMember['sirt_team_id']; ?></td>
			<td><?php echo $sirtMember['created']; ?></td>
			<td><?php echo $sirtMember['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sirt_members', 'action' => 'view', $sirtMember['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sirt_members', 'action' => 'edit', $sirtMember['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sirt_members', 'action' => 'delete', $sirtMember['id']), null, __('Are you sure you want to delete # %s?', $sirtMember['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sirt Member'), array('controller' => 'sirt_members', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
