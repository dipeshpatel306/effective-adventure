<?php
$this->Html->addCrumb('Organization Profiles');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="organizationProfiles index">
	<h2><?php echo __('Organization Profiles'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('administrator_name'); ?></th>
			<th><?php echo $this->Paginator->sort('administrator_email'); ?></th>
			<th><?php echo $this->Paginator->sort('administrator_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($organizationProfiles as $organizationProfile): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($organizationProfile['Client']['name'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
		</td>
		<?php
		if(!empty($organizationProfile['OrganizationProfile']['administrator_phone_ext'])){
			$ext = ' ext. ' . $organizationProfile['OrganizationProfile']['administrator_phone_ext'];
		} else {
			$ext = '';
		}
		?>
		<td><?php echo ($organizationProfile['OrganizationProfile']['administrator_name']); ?>&nbsp;</td>
		<td><?php echo ($organizationProfile['OrganizationProfile']['administrator_email']); ?>&nbsp;</td>
		<td><?php echo ($organizationProfile['OrganizationProfile']['administrator_phone']) . $ext; ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', ($organizationProfile['OrganizationProfile']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', ($organizationProfile['OrganizationProfile']['modified'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizationProfile['OrganizationProfile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationProfile['OrganizationProfile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizationProfile['OrganizationProfile']['id']), null, __('Are you sure you want to delete # %s?', $organizationProfile['OrganizationProfile']['id'])); ?>
		    <?php echo $this->Html->link(__('Export'), array('action' => 'view', $organizationProfile['OrganizationProfile']['id'], 'ext' => 'csv')); ?>
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
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Organization Profile'), array('action' => 'add')); ?></li>

		<?php endif; ?>
	</ul>
</div>
