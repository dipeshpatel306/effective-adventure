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
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_name'); ?></th>
			<th><?php echo $this->Paginator->sort('administrator_name'); ?></th>
			<th><?php echo $this->Paginator->sort('administrator_email'); ?></th>
			<th><?php echo $this->Paginator->sort('administrator_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>			
			<!--<th><?php echo $this->Paginator->sort('address_1'); ?></th>
			<th><?php echo $this->Paginator->sort('address_2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('number_employees'); ?></th>
			<th><?php echo $this->Paginator->sort('second_location'); ?></th>
			<th><?php echo $this->Paginator->sort('number_of_servers'); ?></th>
			<th><?php echo $this->Paginator->sort('network_operating_system'); ?></th>
			<th><?php echo $this->Paginator->sort('network_details'); ?></th>
			<th><?php echo $this->Paginator->sort('number_workstations'); ?></th>
			<th><?php echo $this->Paginator->sort('number_laptops'); ?></th>
			<th><?php echo $this->Paginator->sort('os_installed'); ?></th>
			<th><?php echo $this->Paginator->sort('emr_ehr_implemented'); ?></th>
			<th><?php echo $this->Paginator->sort('emr_ehr_vendor'); ?></th>
			<th><?php echo $this->Paginator->sort('emr_ehr_internal_name'); ?></th>
			<th><?php echo $this->Paginator->sort('emr_ehr_os'); ?></th>
			<th><?php echo $this->Paginator->sort('emr_ehr_details'); ?></th>
			<th><?php echo $this->Paginator->sort('emr_ehr_location'); ?></th>
			<th><?php echo $this->Paginator->sort('emr_ehr_description'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('email_vendor'); ?></th>
			<th><?php echo $this->Paginator->sort('email_server_location'); ?></th>
			<th><?php echo $this->Paginator->sort('email_details'); ?></th>
			<th><?php echo $this->Paginator->sort('portable_media_devices'); ?></th>
			<th><?php echo $this->Paginator->sort('tables'); ?></th>
			<th><?php echo $this->Paginator->sort('list_portable_devices'); ?></th>
			<th><?php echo $this->Paginator->sort('back_up_tapes'); ?></th>
			<th><?php echo $this->Paginator->sort('smartphones'); ?></th>
			<th><?php echo $this->Paginator->sort('list_smartphone_vendors'); ?></th>
			<th><?php echo $this->Paginator->sort('system_1_name'); ?></th>
			<th><?php echo $this->Paginator->sort('system_1_os'); ?></th>
			<th><?php echo $this->Paginator->sort('system_1_vendor'); ?></th>
			<th><?php echo $this->Paginator->sort('system_1_location'); ?></th>
			<th><?php echo $this->Paginator->sort('system_1_ephi'); ?></th>
			<th><?php echo $this->Paginator->sort('system_1_details'); ?></th>
			<th><?php echo $this->Paginator->sort('system_2_name'); ?></th>
			<th><?php echo $this->Paginator->sort('system_2_os'); ?></th>
			<th><?php echo $this->Paginator->sort('system_2_vendor'); ?></th>
			<th><?php echo $this->Paginator->sort('system_2_location'); ?></th>
			<th><?php echo $this->Paginator->sort('system_2_ephi'); ?></th>
			<th><?php echo $this->Paginator->sort('system_2_details'); ?></th>
			<th><?php echo $this->Paginator->sort('system_3_name'); ?></th>
			<th><?php echo $this->Paginator->sort('system_3_os'); ?></th>
			<th><?php echo $this->Paginator->sort('system_3_vendor'); ?></th>
			<th><?php echo $this->Paginator->sort('system_3_location'); ?></th>
			<th><?php echo $this->Paginator->sort('system_3_ephi'); ?></th>
			<th><?php echo $this->Paginator->sort('system_3_details'); ?></th>
			<th><?php echo $this->Paginator->sort('system_4_name'); ?></th>
			<th><?php echo $this->Paginator->sort('system_4_os'); ?></th>
			<th><?php echo $this->Paginator->sort('system_4_vendor'); ?></th>
			<th><?php echo $this->Paginator->sort('system_4_location'); ?></th>
			<th><?php echo $this->Paginator->sort('system_4_ephi'); ?></th>
			<th><?php echo $this->Paginator->sort('system_4_details'); ?></th>
			<th><?php echo $this->Paginator->sort('system_5_name'); ?></th>
			<th><?php echo $this->Paginator->sort('system_5_os'); ?></th>
			<th><?php echo $this->Paginator->sort('system_5_vendor'); ?></th>
			<th><?php echo $this->Paginator->sort('system_5_location'); ?></th>
			<th><?php echo $this->Paginator->sort('system_5_ephi'); ?></th>
			<th><?php echo $this->Paginator->sort('system_5_details'); ?></th>
			<th><?php echo $this->Paginator->sort('additional_info'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($organizationProfiles as $organizationProfile): ?>
	<tr>
		<!--<td><?php echo h($organizationProfile['OrganizationProfile']['id']); ?>&nbsp;</td>-->

		
		<td>
			<?php echo $this->Html->link($organizationProfile['Client']['name'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
		</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['organization_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['administrator_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['administrator_email']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['administrator_phone']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', ($organizationProfile['OrganizationProfile']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', ($organizationProfile['OrganizationProfile']['modified'])); ?>&nbsp;</td>		
		<!--<td><?php echo h($organizationProfile['OrganizationProfile']['address_1']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['address_2']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['city']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['state']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['zip']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['number_employees']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['second_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['number_of_servers']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['network_operating_system']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['network_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['number_workstations']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['number_laptops']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['os_installed']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_implemented']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_vendor']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_internal_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_os']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_description']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['email']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['email_vendor']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['email_server_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['email_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['portable_media_devices']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['tables']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['list_portable_devices']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['back_up_tapes']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['smartphones']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['list_smartphone_vendors']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_1_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_1_os']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_1_vendor']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_1_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_1_ephi']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_1_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_2_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_2_os']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_2_vendor']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_2_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_2_ephi']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_2_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_3_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_3_os']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_3_vendor']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_3_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_3_ephi']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_3_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_4_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_4_os']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_4_vendor']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_4_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_4_ephi']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_4_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_5_name']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_5_os']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_5_vendor']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_5_location']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_5_ephi']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['system_5_details']); ?>&nbsp;</td>
		<td><?php echo h($organizationProfile['OrganizationProfile']['additional_info']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizationProfile['OrganizationProfile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationProfile['OrganizationProfile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizationProfile['OrganizationProfile']['id']), null, __('Are you sure you want to delete # %s?', $organizationProfile['OrganizationProfile']['id'])); ?>
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
