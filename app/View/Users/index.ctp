<?php
$this->Html->addCrumb('Users');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table>
	<tr>
			<?php if($group == 1): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('last_name', 'Name'); ?></th>			
			<th><?php echo $this->Paginator->sort('email'); ?></th>		
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>	
			<th><?php echo $this->Paginator->sort('active'); ?></th>			
			<th><?php echo $this->Paginator->sort('last_login'); ?></th>		
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<?php if($group == 1): ?>
		<td><?php echo $this->Html->link($user['Client']['name'], array('controller' => 'clients', 'action' => 'view', $user['Client']['id'])); ?></td>		
		<?php endif; ?>
		<td><?php echo $user['User']['last_name'] . ', ' . $user['User']['first_name']; ?>&nbsp;</td>			
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo $user['Group']['name']; ?></td>
		<td><?php echo h($user['User']['active']); ?>&nbsp;</td>
		<td> 
		<?php 
			if($user['User']['last_login'] == '0000-00-00 00:00:00'){
				echo ''; 
			} else {
			echo $this->Time->format('m/d/y g:i a', $user['User']['last_login']); 
			}
		?>&nbsp;</td>		
		<td><?php echo $this->Time->format('m/d/y g:i a', $user['User']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $user['User']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<?php endif; ?>

	</ul>
</div>
