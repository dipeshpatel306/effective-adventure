<div class="businessAssociateAgreements view">
<h2><?php  echo __('Business Associate Agreement'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contract Date'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['contract_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['document']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($businessAssociateAgreement['Client']['name'], array('controller' => 'clients', 'action' => 'view', $businessAssociateAgreement['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Business Associate Agreement'), array('action' => 'edit', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Business Associate Agreement'), array('action' => 'delete', $businessAssociateAgreement['BusinessAssociateAgreement']['id']), null, __('Are you sure you want to delete # %s?', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Associate Agreements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Associate Agreement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
