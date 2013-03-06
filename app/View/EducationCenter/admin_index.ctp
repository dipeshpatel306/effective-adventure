<?php
$this->Html->addCrumb('Education Center', '/education_center');
$this->Html->addCrumb('Education Center Admin');
?>
<div class="educationCenter index">
	<h2><?php echo __('Education Center'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('header'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('video_link', 'Media Type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($educationCenter as $educationCenter): ?>
	<tr>
		<td><?php echo h($educationCenter['EducationCenter']['header']); ?>&nbsp;</td>		
		<td><?php echo h($educationCenter['EducationCenter']['name']); ?>&nbsp;</td>
		<td><?php echo h($educationCenter['EducationCenter']['video_link']); ?>&nbsp;</td>		
		<td><?php echo $this->Time->format('m/d/y g:i a', ($educationCenter['EducationCenter']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', ($educationCenter['EducationCenter']['modified'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $educationCenter['EducationCenter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $educationCenter['EducationCenter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $educationCenter['EducationCenter']['id']), null, __('Are you sure you want to delete # %s?', $educationCenter['EducationCenter']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Education Center'), array('action' => 'add')); ?></li>
	</ul>
</div>
