<?php
$this->Html->addCrumb('Templates', '/templates');
$this->Html->addCrumb('Templates');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="templates index">
	<h2><?php echo __('Templates'); ?></h2>
	<table>
	<tr>
			<?php if($group ==1): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif; ?>

			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($templates as $template): ?>
	<tr>
		<?php if($group == 1 ): ?>
		<td>
			<?php echo $template['Client']['name']; ?>
		</td>
		<?php endif; ?>

		<td><?php echo ($template['Template']['name']); ?>&nbsp;</td>
		<td>
		<?php

			if(!empty($template['Template']['attachment'])){
				$dir = $template['Template']['attachment_dir'];
				$file = $template['Template']['attachment'];
				echo $this->Html->link($template['Template']['attachment'], array('action' => 'sendFile', $dir, $file));
			}

		?>
		&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $template['Template']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $template['Template']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $template['Template']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $template['Template']['id'])); ?>
			<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Template', 'id' => $template['Template']['id'])); ?>
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
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?></li>
		<?php endif; ?>
	</ul>
</div>
