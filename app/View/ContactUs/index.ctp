<?php
$this->Html->addCrumb('Messages');
?>
<div class="contactUs index">
	<h2><?php echo __('Messages'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('subject'); ?></th>
			<th><?php echo $this->Paginator->sort('feedback'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($contactUs as $contactUs): ?>
	<tr>
		<td><?php echo ($contactUs['ContactUs']['email']); ?>&nbsp;</td>
		<td><?php echo ($contactUs['ContactUs']['subject']); ?>&nbsp;</td>
		<td><?php echo ($contactUs['ContactUs']['feedback']); ?>&nbsp;</td>
		<td><?php echo ($contactUs['ContactUs']['first_name']); ?>&nbsp;</td>
		<td><?php echo ($contactUs['ContactUs']['last_name']); ?>&nbsp;</td>
		<td><?php echo ($contactUs['ContactUs']['company']); ?>&nbsp;</td>
		<td><?php echo ($contactUs['ContactUs']['phone']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $contactUs['ContactUs']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contactUs['ContactUs']['id'])); ?>
			<!--<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contactUs['ContactUs']['id'])); ?>-->
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contactUs['ContactUs']['id']), null, __('Are you sure you want to delete # %s?', $contactUs['ContactUs']['id'])); ?>
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
<!--	<ul>
		<li><?php // echo $this->Html->link(__('New Contact Us'), array('action' => 'add')); ?></li>
</ul>-->
</div>
