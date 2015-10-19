<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Service Provider Contracts');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="businessAssociateAgreements index">
	<h2><?php echo __('Service Provider Contracts'); ?></h2>
	<table>
	<tr>
			<?php if($group == 1): ?>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('business_name'); ?></th>
			<th><?php echo $this->Paginator->sort('contact'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('contract_date'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($businessAssociateAgreements as $businessAssociateAgreement): ?>
	<tr>
		<?php if($group == 1): ?>
		<td>
			<?php echo $businessAssociateAgreement['Client']['name']; ?>
		</td>
		<?php endif; ?>
		<td><?php echo $businessAssociateAgreement['BusinessAssociateAgreement']['business_name']; ?></td>
		<td><?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['contact']); ?>&nbsp;</td>
		<td><?php echo $this->Text->autoLinkEmails($businessAssociateAgreement['BusinessAssociateAgreement']['email']); ?>&nbsp;</td>
		<td><?php echo ($businessAssociateAgreement['BusinessAssociateAgreement']['phone']); ?>&nbsp;</td>
		<td>
			<?php
			if(!empty($businessAssociateAgreement['BusinessAssociateAgreement']['contract_date'])){
				echo $this->Time->format('m/d/y', $businessAssociateAgreement['BusinessAssociateAgreement']['contract_date']);
			}

			?>&nbsp;</td>
		<td>
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

		<td><?php echo $this->Time->format('m/d/y g:i a', $businessAssociateAgreement['BusinessAssociateAgreement']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $businessAssociateAgreement['BusinessAssociateAgreement']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $businessAssociateAgreement['BusinessAssociateAgreement']['id'])); ?>
			<?php 
				if ($acct != 'AYCE Training') {
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $businessAssociateAgreement['BusinessAssociateAgreement']['id']));	
					echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Service Provider Contract', 'id' => $businessAssociateAgreement['BusinessAssociateAgreement']['id']));
				}
			?>
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

		<?php if(($group == 1 || $group == 2) && $acct != 'AYCE Training'): ?>
		<li><?php echo $this->Html->link(__('New Service Provider Contract'), array('action' => 'add')); ?></li>
		<?php endif; ?>
	</ul>
</div>
