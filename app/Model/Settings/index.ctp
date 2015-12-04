<?php
$this->Html->addCrumb('Settings', '/settings');
?>
<div class="settings index">
	<h2><?php echo __('Settings'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('key'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($settings as $setting): ?>
	<tr>
		<td><?php echo $setting['Setting']['key']; ?></td>
		<td><?php echo $setting['Setting']['value']; ?></td>
		<td><?php echo $setting['Setting']['description']; ?></td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $setting['Setting']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $setting['Setting']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $setting['Setting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $setting['Setting']['id'])); ?>
			<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Setting', 'id' => $setting['Setting']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Setting'), array('action' => 'add')); ?></li>
	</ul>
</div>
