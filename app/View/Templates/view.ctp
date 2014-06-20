<?php
$this->Html->addCrumb('Templates', '/templates');
$this->Html->addCrumb($template['Template']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="templates view">
<h2><?php  echo __('Template'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($template['Template']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo ($template['Template']['description']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $template['Template']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $template['Template']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
		<?php
			if(!empty($template['Template']['attachment'])){
                $dir = $template['Template']['attachment_dir'];
                $file = $template['Template']['attachment'];
                echo $this->Html->link($template['Template']['attachment'], array('action' => 'sendFile', $dir, $file));
            }
		?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?> </li>

		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Template'), array('action' => 'edit', $template['Template']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Template', 'name' => 'Template', 'id' => $template['Template']['id'])); ?></li>
		<?php endif; ?>

	</ul>
</div>
