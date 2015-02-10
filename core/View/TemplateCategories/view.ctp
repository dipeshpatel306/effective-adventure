<?php
$this->Html->addCrumb('Template Categories', '/template_categories');
$this->Html->addCrumb($category['TemplateCategory']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="templateCategories view">
<h2><?php  echo __('Template Category'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($category['TemplateCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $category['TemplateCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $category['TemplateCategory']['modified']); ?>
			&nbsp;
		</dd>
		
	</dl>
	

<div class="related">
	
	<h3><?php echo __('Templates'); ?></h3>

	<table>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Attachment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>

	<?php
		$i = 0;
		foreach ($category['Template'] as $template): ?>
		<tr>
			<td><?php echo $template['name']; ?></td>
			<td><?php echo $template['description']; ?></td>
			<td>
			<?php
	
				if(!empty($template['attachment'])){
					$dir = $template['attachment_dir'];
					$file = $template['attachment'];
					echo $this->Html->link($template['attachment'], array('controller' => 'templates', 'action' => 'sendFile', $dir, $file));
				}
	
			?>
			&nbsp;</td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $template['created']); ?></td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $template['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'templates', 'action' => 'view', $template['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'templates', 'action' => 'edit', $template['id'])); ?>
				<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Template', 'id' => $template['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Templates'), array('controller' => 'templates', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Template'), array('controller' => 'templates', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Template Categories'), array('action' => 'index')); ?> </li>

		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Template Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Template Category'), array('action' => 'edit', $category['TemplateCategory']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Template Category', 'name' => 'Template Category', 'id' => $category['TemplateCategory']['id'])); ?></li>
		<?php endif; ?>

	</ul>
</div>
