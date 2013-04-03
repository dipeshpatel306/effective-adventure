<?php
$this->Html->addCrumb('Track & Document', '/dashboard/track_and_document');
$this->Html->addCrumb('ePHI Removed', '/ephi_removed');
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $ephiRemoved['EphiRemoved']['date']));

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="ephiRemoved view">
<h2><?php  echo __('Ephi Removed'); ?></h2>
	<dl>
		<?php if($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $ephiRemoved['Client']['name']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt><?php echo __('Description of item removed'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiRemoved['EphiRemoved']['item']) . ' '; ?>
			<?php echo $this->Time->format('m/d/y', $ephiRemoved['EphiRemoved']['other_description']) . ' '; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiRemoved['EphiRemoved']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $ephiRemoved['EphiRemoved']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reason for removing ePHI'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['reason']) . ' '; ?>
			<?php echo h($ephiRemoved['EphiRemoved']['other_reason']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Who Removed ePHI'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['removed_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Who approved of removal of ePHI? '); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Who returned the ePHI?'); ?></dt>
		<dd>
			<?php echo h($ephiRemoved['EphiRemoved']['returned_by']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('When was ePHI returned?'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiRemoved['EphiRemoved']['when_returned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo $ephiRemoved['EphiRemoved']['notes']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $ephiRemoved['EphiRemoved']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $ephiRemoved['EphiRemoved']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Ephi Removed'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ephi Removed'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Ephi Removed'), array('action' => 'edit', $ephiRemoved['EphiRemoved']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ephi Removed'), array('action' => 'delete', $ephiRemoved['EphiRemoved']['id']), null, __('Are you sure you want to delete # %s?', $ephiRemoved['EphiRemoved']['id'])); ?> </li>

	</ul>
</div>
