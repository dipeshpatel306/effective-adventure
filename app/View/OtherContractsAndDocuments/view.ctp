<?php
$this->Html->addCrumb('Contracts & Documents', '/dashboard/contracts_and_documents');
$this->Html->addCrumb('Other Contracts & Documents', '/other_contracts_and_documents');
$this->Html->addCrumb($otherContractsAndDocument['OtherContractsAndDocument']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
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
				$attr_dir = '/files/other_contracts_and_document/attachment/'.
				$otherContractsAndDocument['OtherContractsAndDocument']['attachment_dir'] . '/' .
				$otherContractsAndDocument['OtherContractsAndDocument']['attachment'];

				$opnpLink =  preg_replace('/\/.*\//', '', $otherContractsAndDocument['OtherContractsAndDocument']['attachment']);
				echo $this->Html->link($otherContractsAndDocument['OtherContractsAndDocument']['attachment'], $attr_dir);

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
		<li><?php echo $this->Html->link(__('List Other Contracts And Documents'), array('action' => 'index')); ?> </li>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->Html->link(__('New Other Contracts And Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Other Contracts And Document'), array('action' => 'edit', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Other Contracts And Document'), array('action' => 'delete', $otherContractsAndDocument['OtherContractsAndDocument']['id']), null, __('Are you sure you want to delete # %s?', $otherContractsAndDocument['OtherContractsAndDocument']['id'])); ?> </li>
		<?php endif; ?>

	</ul>
</div>
