<?php
$this->Html->addCrumb('Template Categories', '/template_categories');
$this->Html->addCrumb('Template Categories');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="templateCategories index">
	<h2><?php echo __('Template Categories'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($categories as $category): ?>
	<tr>
		<td><?php echo ($category['TemplateCategory']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $category['TemplateCategory']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $category['TemplateCategory']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['TemplateCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['TemplateCategory']['id'])); ?>
			<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Template', 'id' => $category['TemplateCategory']['id'])); ?>
			<?php echo $this->Html->link(__('New Template'), array('controller' => 'templates', 'action' => 'add', $category['TemplateCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Template Category'), array('action' => 'add')); ?></li>
		<?php endif; ?>
	</ul>
</div>
