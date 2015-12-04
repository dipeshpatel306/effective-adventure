<?php
$this->Html->addCrumb('Settings', '/settings');
$this->Html->addCrumb($setting['setting']['key']);
?>
<div class="setting view">
<h2><?php  echo __('Setting'); ?></h2>
	<dl>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo $setting['Setting']['key']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo ($setting['Setting']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo ($setting['Setting']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $setting['Setting']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $setting['Setting']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Setting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Setting'), array('action' => 'edit', $setting['Setting']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Setting', 'name' => 'Setting', 'id' => $setting['Setting']['id'])); ?></li>
	</ul>
</div>
