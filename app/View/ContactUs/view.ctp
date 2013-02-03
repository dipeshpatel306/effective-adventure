<div class="contactUs view">
<h2><?php  echo __('Contact Us'); ?></h2>
	<dl>

		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contactUs['ContactUs']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($contactUs['ContactUs']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feedback'); ?></dt>
		<dd>
			<?php echo h($contactUs['ContactUs']['feedback']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($contactUs['ContactUs']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($contactUs['ContactUs']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($contactUs['ContactUs']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($contactUs['ContactUs']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $contactUs['ContactUs']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contact Us'), array('action' => 'edit', $contactUs['ContactUs']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contact Us'), array('action' => 'delete', $contactUs['ContactUs']['id']), null, __('Are you sure you want to delete # %s?', $contactUs['ContactUs']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contact Us'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Us'), array('action' => 'add')); ?> </li>
	</ul>
</div>
