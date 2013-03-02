<?php
$this->Html->addCrumb('Partners', '/partners');
$this->Html->addCrumb('View Partner - ' . $partner['Partner']['company']);
?>

<div class="partners view">
<h2><?php  echo __('Partner'); ?></h2>
	<dl>
		<!--<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['company']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['link']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['logo']); ?>
			&nbsp;
		</dd>-->
		<!--<dt><?php echo __('Cell'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['cell']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['zip']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($partner['Partner']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class='partnerLogo'>
		<?php echo $this->Html->image($partner['Partner']['logo']); ?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Partner'), array('action' => 'edit', $partner['Partner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Partner'), array('action' => 'delete', $partner['Partner']['id']), null, __('Are you sure you want to delete # %s?', $partner['Partner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Partners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partner'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clients'); ?></h3>
	<?php if (!empty($partner['Client'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<!--<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Partner Id'); ?></th>-->
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Account Type'); ?></th>
		<th><?php echo __('Admin Account'); ?></th>
		<th><?php echo __('User Account'); ?></th>
		<!--<th><?php echo __('Details'); ?></th>-->
		<th><?php echo __('Last Login'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($partner['Client'] as $client): ?>
		<tr>
			<!--<td><?php echo $client['id']; ?></td>
			<td><?php echo $client['partner_id']; ?></td>-->
			<td><?php echo $client['name']; ?></td>
			<td><?php echo $client['account_type']; ?></td>
			<td><?php echo $client['admin_account']; ?></td>
			<td><?php echo $client['user_account']; ?></td>
			<!--<td><?php echo $client['details']; ?></td>-->
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

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
