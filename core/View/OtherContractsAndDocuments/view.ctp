<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Other Contracts & Documents');
} else {
	$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
	$this->Html->addCrumb('Other Contracts & Documents', '/other_contracts_and_documents');
}
$this->Html->addCrumb($otherContractsAndDocument['OtherContractsAndDocument']['name']);
?>

<div class="otherContractsAndDocuments view">
<h2><?php  echo __('Other Contracts And Documents'); ?></h2>
	<dl>
		<?php if($group == 1): ?>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $otherContractsAndDocument['Client']['name']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>

		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($otherContractsAndDocument['OtherContractsAndDocument']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo ($otherContractsAndDocument['OtherContractsAndDocument']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php
			if(!empty($otherContractsAndDocument['OtherContractsAndDocument']['date'])){
			echo $this->Time->format('m/d/y', $otherContractsAndDocument['OtherContractsAndDocument']['date']);
			} ?>
			&nbsp;
		</dd>


		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', $otherContractsAndDocument['OtherContractsAndDocument']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
		<?php
			if(!empty($otherContractsAndDocument['OtherContractsAndDocument']['attachment'])){
                $dir = $otherContractsAndDocument['OtherContractsAndDocument']['attachment_dir'];
                $file = $otherContractsAndDocument['OtherContractsAndDocument']['attachment'];
                echo $this->Html->link($otherContractsAndDocument['OtherContractsAndDocument']['attachment'], array('action' => 'sendFile', $dir, $file));
            }
		?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Details'); ?></dt>
		<dd><?php echo ($otherContractsAndDocument['OtherContractsAndDocument']['details']); ?>
			&nbsp;</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $otherContractsAndDocument['OtherContractsAndDocument']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Other Contracts And Documents'), array('action' => 'index')); ?> </li>
		<?php endif; ?>

		<?php if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN || $group == Group::MANAGER): ?>
		<?php if ($group != Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('New Other Contracts And Document'), array('action' => 'add')); ?> </li>
		<?php endif; ?>
		<li><?php echo $this->Html->link(__('Edit Other Contracts And Document'), array('action' => 'edit', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Other Contract & Document', 'name' => 'Other Contract & Document', 'id' => $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?></li>
		<?php endif; ?>

	</ul>
</div>
