<?php
$this->Html->addCrumb('ePHI Recieved', '/ephi_recieved');
$this->Html->addCrumb($this->Time->format('m/d/y g:i a', $ephiRecieved['EphiRecieved']['date_recieved']));
?>
<div class="ephiRecieved view">
<h2><?php  echo __('Ephi Recieved'); ?></h2>
	<dl>

		<dt><?php echo __('Date Recieved'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiRecieved['EphiRecieved']['date_recieved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Recieved'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $ephiRecieved['EphiRecieved']['time_recieved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ephiRecieved['EphiRecieved']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($ephiRecieved['EphiRecieved']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recieved By'); ?></dt>
		<dd>
			<?php echo h($ephiRecieved['EphiRecieved']['recieved_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Returned'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y', $ephiRecieved['EphiRecieved']['date_returned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Returned'); ?></dt>
		<dd>
			<?php echo $this->Time->format('g:i a', $ephiRecieved['EphiRecieved']['time_returned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ephiRecieved['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ephiRecieved['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $ephiRecieved['EphiRecieved']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $ephiRecieved['EphiRecieved']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ephi Recieved'), array('action' => 'edit', $ephiRecieved['EphiRecieved']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ephi Recieved'), array('action' => 'delete', $ephiRecieved['EphiRecieved']['id']), null, __('Are you sure you want to delete # %s?', $ephiRecieved['EphiRecieved']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ephi Recieved'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ephi Recieved'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
