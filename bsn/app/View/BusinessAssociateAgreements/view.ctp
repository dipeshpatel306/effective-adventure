<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Service Provider Contracts');
} else {
	$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
	$this->Html->addCrumb('Service Provider Contracts', '/service_provider_contracts');
}
$this->Html->addCrumb($businessAssociateAgreement['BusinessAssociateAgreement']['contact']);


?>
<div class="businessAssociateAgreements view">
<h2><?php  echo __('Service Provider Contract'); ?></h2>
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
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['business_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Address'); ?></dt>
		<dd>
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['business_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Address 2'); ?></dt>
		<dd>
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['business_address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Name'); ?></dt>
		<dd>
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo $this->Text->autoLinkEmails($businessAssociateAgreement['BusinessAssociateAgreement']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['phone']); ?>
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
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $businessAssociateAgreement['BusinessAssociateAgreement']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Service Provider Contracts'), array('action' => 'index')); ?> </li>
		<?php endif; ?>

		<?php if(($group == Group::ADMIN || $group == Group::PARTNER_ADMIN || $group == Group::MANAGER) && $acct != 'AYCE Training'): ?>
			<?php if ($group != Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('New Service Provider Contract'), array('action' => 'add')); ?> </li>
			<?php endif; ?>
		<li><?php echo $this->Html->link(__('Edit Service Provider Contract'), array('action' => 'edit', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Service Provider Contract', 'name' => 'Service Provider Contract', 'id' => $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?></li>
		<?php endif; ?>
	</ul>
</div>
