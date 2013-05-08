<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Business Associate Agreements', '/business_associate_agreements');
$this->Html->addCrumb($businessAssociateAgreement['BusinessAssociateAgreement']['contact']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="businessAssociateAgreements view">
<h2><?php  echo __('Business Associate Agreement'); ?></h2>
	<dl>
		<?php if($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $businessAssociateAgreement['Client']['name']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>


		<dt><?php echo __('Business Name'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['business_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Address'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['business_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Address 2'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['business_address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Name'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo $this->Text->autoLinkEmails($businessAssociateAgreement['BusinessAssociateAgreement']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($businessAssociateAgreement['BusinessAssociateAgreement']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contract Date'); ?></dt>
		<dd>
			<?php
			if(!empty($businessAssociateAgreement['BusinessAssociateAgreement']['contract_date'])){
				echo $this->Time->format('m/d/y', $businessAssociateAgreement['BusinessAssociateAgreement']['contract_date']);
			}

			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document'); ?></dt>
		<dd>
		<?php

			if(!empty($businessAssociateAgreement['BusinessAssociateAgreement']['attachment'])){

				$dir = $businessAssociateAgreement['BusinessAssociateAgreement']['attachment_dir'];
				$file = $businessAssociateAgreement['BusinessAssociateAgreement']['attachment'];
				$opnpLink =  preg_replace('/\/.*\//', '', $businessAssociateAgreement['BusinessAssociateAgreement']['attachment']);
				echo $this->Html->link($businessAssociateAgreement['BusinessAssociateAgreement']['attachment'], array(
				'controller' => 'business_associate_agreements',

				'action' => 'sendFile', $dir, $file ));

			}

		?>
			&nbsp;
		</dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $businessAssociateAgreement['BusinessAssociateAgreement']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $businessAssociateAgreement['BusinessAssociateAgreement']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Business Associate Agreements'), array('action' => 'index')); ?> </li>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('New Business Associate Agreement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Business Associate Agreement'), array('action' => 'edit', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Business Associate Agreement'), array('action' => 'delete', $businessAssociateAgreement['BusinessAssociateAgreement']['id']), null, __('Are you sure you want to delete # %s?', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?> </li>

		<?php endif; ?>
	</ul>
</div>
