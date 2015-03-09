<?php
$this->Html->addCrumb('Partners', '/partners');
$this->Html->addCrumb($partner['Partner']['name']);
?>

<div class="partners view">
<h2><?php  echo __('Partner'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($partner['Partner']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo $this->Text->autoLinkEmails($partner['Partner']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin Code'); ?></dt>
		<dd>
			<?php echo ($partner['Partner']['admin_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo $this->Html->link($partner['Partner']['link'],null, array('target' => '_blank')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo ($partner['Partner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo ($partner['Partner']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	<br />
	<div class='partnerLogo'>
		<?php 
		$partnerImg = '../files/partner/logo/' . $partner['Partner']['logo_dir'] . '/' . $partner['Partner']['logo'];
		echo $this->Html->image($partnerImg, array(
							'alt' => $partner['Partner']['name'],
							'url' => $partner['Partner']['link'],
							'class' => 'logo'
							)); ?>
	</div>
	<br />
		<div class="related">
		<h3><?php echo __('Clients'); ?></h3>
		<?php if (!empty($partner['Client'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Account Type'); ?></th>
			<th><?php echo __('Admin Code'); ?></th>
			<th><?php echo __('User Code'); ?></th>
			<th><?php echo __('Last Login'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($partner['Client'] as $client): ?>
			<tr>
				<td><?php echo $client['name']; ?></td>
				<td><?php echo $client['account_type']; ?></td>
				<td><?php echo $client['admin_account']; ?></td>
				<td><?php echo $client['user_account']; ?></td>
				<td><?php echo $this->Time->format('m/d/y g:i a', $client['last_login']); ?></td>
				<td><?php echo $this->Time->format('m/d/y g:i a', $client['created']); ?></td>
				<td><?php echo $this->Time->format('m/d/y g:i a', $client['modified']); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'clients', 'action' => 'view', $client['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'clients', 'action' => 'edit', $client['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clients', 'action' => 'delete', $client['id']), null, __('Are you sure you want to delete # %s?', $client['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
	</div>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Partners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partner'), array('action' => 'add')); ?> </li>		
		<li><?php echo $this->Html->link(__('Edit Partner'), array('action' => 'edit', $partner['Partner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Partner'), array('action' => 'delete', $partner['Partner']['id']), null, __('Are you sure you want to delete # %s?', $partner['Partner']['id'])); ?> </li>
		<br />
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
