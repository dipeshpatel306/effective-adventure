<div class="operatingSystems view">
<h2><?php  echo __('Operating System'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($operatingSystem['OperatingSystem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Os Name'); ?></dt>
		<dd>
			<?php echo h($operatingSystem['OperatingSystem']['os_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($operatingSystem['OperatingSystem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($operatingSystem['OperatingSystem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Operating System'), array('action' => 'edit', $operatingSystem['OperatingSystem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Operating System'), array('action' => 'delete', $operatingSystem['OperatingSystem']['id']), null, __('Are you sure you want to delete # %s?', $operatingSystem['OperatingSystem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Operating Systems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operating System'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Profiles'), array('controller' => 'organization_profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Profile'), array('controller' => 'organization_profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Organization Profiles'); ?></h3>
	<?php if (!empty($operatingSystem['OrganizationProfile'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Organization Name'); ?></th>
		<th><?php echo __('Administrator Name'); ?></th>
		<th><?php echo __('Administrator Email'); ?></th>
		<th><?php echo __('Administrator Phone'); ?></th>
		<th><?php echo __('Administrator Phone Ext'); ?></th>
		<th><?php echo __('Administrator Phone Alt'); ?></th>
		<th><?php echo __('Administrator Phone Alt Ext'); ?></th>
		<th><?php echo __('Address 1'); ?></th>
		<th><?php echo __('Address 2'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Zip'); ?></th>
		<th><?php echo __('Number Employees'); ?></th>
		<th><?php echo __('Second Location'); ?></th>
		<th><?php echo __('Second Address 1'); ?></th>
		<th><?php echo __('Second Address 2'); ?></th>
		<th><?php echo __('Second City'); ?></th>
		<th><?php echo __('Second State'); ?></th>
		<th><?php echo __('Second Zip'); ?></th>
		<th><?php echo __('Third Location'); ?></th>
		<th><?php echo __('Third Address 1'); ?></th>
		<th><?php echo __('Third Address 2'); ?></th>
		<th><?php echo __('Third City'); ?></th>
		<th><?php echo __('Third State'); ?></th>
		<th><?php echo __('Third Zip'); ?></th>
		<th><?php echo __('Fourth Location'); ?></th>
		<th><?php echo __('Fourth Address 1'); ?></th>
		<th><?php echo __('Fourth Address 2'); ?></th>
		<th><?php echo __('Fourth City'); ?></th>
		<th><?php echo __('Fourth State'); ?></th>
		<th><?php echo __('Fourth Zip'); ?></th>
		<th><?php echo __('Fifth Location'); ?></th>
		<th><?php echo __('Fifth Address 1'); ?></th>
		<th><?php echo __('Fifth Address 2'); ?></th>
		<th><?php echo __('Fifth City'); ?></th>
		<th><?php echo __('Fifth State'); ?></th>
		<th><?php echo __('Fifth Zip'); ?></th>
		<th><?php echo __('Number Of Servers'); ?></th>
		<th><?php echo __('Network Operating System'); ?></th>
		<th><?php echo __('Network Details'); ?></th>
		<th><?php echo __('Number Workstations'); ?></th>
		<th><?php echo __('Number Laptops'); ?></th>
		<th><?php echo __('Os Installed'); ?></th>
		<th><?php echo __('Emr Ehr Implemented'); ?></th>
		<th><?php echo __('Emr Ehr Vendor'); ?></th>
		<th><?php echo __('Emr Ehr Internal Name'); ?></th>
		<th><?php echo __('Emr Ehr Os'); ?></th>
		<th><?php echo __('Emr Ehr Os Other'); ?></th>
		<th><?php echo __('Emr Ehr Details'); ?></th>
		<th><?php echo __('Emr Ehr Location'); ?></th>
		<th><?php echo __('Emr Ehr Description'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Email Vendor'); ?></th>
		<th><?php echo __('Email Vendor Details'); ?></th>
		<th><?php echo __('Email Vendor Other'); ?></th>
		<th><?php echo __('Email Server Location'); ?></th>
		<th><?php echo __('Email Details'); ?></th>
		<th><?php echo __('Portable Media Devices'); ?></th>
		<th><?php echo __('Tablets'); ?></th>
		<th><?php echo __('List Portable Devices'); ?></th>
		<th><?php echo __('Back Up Tapes'); ?></th>
		<th><?php echo __('Smartphones'); ?></th>
		<th><?php echo __('List Smartphone Vendors'); ?></th>
		<th><?php echo __('System 1 Name'); ?></th>
		<th><?php echo __('System 1 Os'); ?></th>
		<th><?php echo __('System 1 Vendor'); ?></th>
		<th><?php echo __('System 1 Location'); ?></th>
		<th><?php echo __('System 1 Ephi'); ?></th>
		<th><?php echo __('System 1 Details'); ?></th>
		<th><?php echo __('System 2 Name'); ?></th>
		<th><?php echo __('System 2 Os'); ?></th>
		<th><?php echo __('System 2 Vendor'); ?></th>
		<th><?php echo __('System 2 Location'); ?></th>
		<th><?php echo __('System 2 Ephi'); ?></th>
		<th><?php echo __('System 2 Details'); ?></th>
		<th><?php echo __('System 3 Name'); ?></th>
		<th><?php echo __('System 3 Os'); ?></th>
		<th><?php echo __('System 3 Vendor'); ?></th>
		<th><?php echo __('System 3 Location'); ?></th>
		<th><?php echo __('System 3 Ephi'); ?></th>
		<th><?php echo __('System 3 Details'); ?></th>
		<th><?php echo __('System 4 Name'); ?></th>
		<th><?php echo __('System 4 Os'); ?></th>
		<th><?php echo __('System 4 Vendor'); ?></th>
		<th><?php echo __('System 4 Location'); ?></th>
		<th><?php echo __('System 4 Ephi'); ?></th>
		<th><?php echo __('System 4 Details'); ?></th>
		<th><?php echo __('System 5 Name'); ?></th>
		<th><?php echo __('System 5 Os'); ?></th>
		<th><?php echo __('System 5 Vendor'); ?></th>
		<th><?php echo __('System 5 Location'); ?></th>
		<th><?php echo __('System 5 Ephi'); ?></th>
		<th><?php echo __('System 5 Details'); ?></th>
		<th><?php echo __('Additional Info'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($operatingSystem['OrganizationProfile'] as $organizationProfile): ?>
		<tr>
			<td><?php echo $organizationProfile['id']; ?></td>
			<td><?php echo $organizationProfile['client_id']; ?></td>
			<td><?php echo $organizationProfile['created']; ?></td>
			<td><?php echo $organizationProfile['modified']; ?></td>
			<td><?php echo $organizationProfile['organization_name']; ?></td>
			<td><?php echo $organizationProfile['administrator_name']; ?></td>
			<td><?php echo $organizationProfile['administrator_email']; ?></td>
			<td><?php echo $organizationProfile['administrator_phone']; ?></td>
			<td><?php echo $organizationProfile['administrator_phone_ext']; ?></td>
			<td><?php echo $organizationProfile['administrator_phone_alt']; ?></td>
			<td><?php echo $organizationProfile['administrator_phone_alt_ext']; ?></td>
			<td><?php echo $organizationProfile['address_1']; ?></td>
			<td><?php echo $organizationProfile['address_2']; ?></td>
			<td><?php echo $organizationProfile['city']; ?></td>
			<td><?php echo $organizationProfile['state']; ?></td>
			<td><?php echo $organizationProfile['zip']; ?></td>
			<td><?php echo $organizationProfile['number_employees']; ?></td>
			<td><?php echo $organizationProfile['second_location']; ?></td>
			<td><?php echo $organizationProfile['second_address_1']; ?></td>
			<td><?php echo $organizationProfile['second_address_2']; ?></td>
			<td><?php echo $organizationProfile['second_city']; ?></td>
			<td><?php echo $organizationProfile['second_state']; ?></td>
			<td><?php echo $organizationProfile['second_zip']; ?></td>
			<td><?php echo $organizationProfile['third_location']; ?></td>
			<td><?php echo $organizationProfile['third_address_1']; ?></td>
			<td><?php echo $organizationProfile['third_address_2']; ?></td>
			<td><?php echo $organizationProfile['third_city']; ?></td>
			<td><?php echo $organizationProfile['third_state']; ?></td>
			<td><?php echo $organizationProfile['third_zip']; ?></td>
			<td><?php echo $organizationProfile['fourth_location']; ?></td>
			<td><?php echo $organizationProfile['fourth_address_1']; ?></td>
			<td><?php echo $organizationProfile['fourth_address_2']; ?></td>
			<td><?php echo $organizationProfile['fourth_city']; ?></td>
			<td><?php echo $organizationProfile['fourth_state']; ?></td>
			<td><?php echo $organizationProfile['fourth_zip']; ?></td>
			<td><?php echo $organizationProfile['fifth_location']; ?></td>
			<td><?php echo $organizationProfile['fifth_address_1']; ?></td>
			<td><?php echo $organizationProfile['fifth_address_2']; ?></td>
			<td><?php echo $organizationProfile['fifth_city']; ?></td>
			<td><?php echo $organizationProfile['fifth_state']; ?></td>
			<td><?php echo $organizationProfile['fifth_zip']; ?></td>
			<td><?php echo $organizationProfile['number_of_servers']; ?></td>
			<td><?php echo $organizationProfile['network_operating_system']; ?></td>
			<td><?php echo $organizationProfile['network_details']; ?></td>
			<td><?php echo $organizationProfile['number_workstations']; ?></td>
			<td><?php echo $organizationProfile['number_laptops']; ?></td>
			<td><?php echo $organizationProfile['os_installed']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_implemented']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_vendor']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_internal_name']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_os']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_os_other']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_details']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_location']; ?></td>
			<td><?php echo $organizationProfile['emr_ehr_description']; ?></td>
			<td><?php echo $organizationProfile['email']; ?></td>
			<td><?php echo $organizationProfile['email_vendor']; ?></td>
			<td><?php echo $organizationProfile['email_vendor_details']; ?></td>
			<td><?php echo $organizationProfile['email_vendor_other']; ?></td>
			<td><?php echo $organizationProfile['email_server_location']; ?></td>
			<td><?php echo $organizationProfile['email_details']; ?></td>
			<td><?php echo $organizationProfile['portable_media_devices']; ?></td>
			<td><?php echo $organizationProfile['tablets']; ?></td>
			<td><?php echo $organizationProfile['list_portable_devices']; ?></td>
			<td><?php echo $organizationProfile['back_up_tapes']; ?></td>
			<td><?php echo $organizationProfile['smartphones']; ?></td>
			<td><?php echo $organizationProfile['list_smartphone_vendors']; ?></td>
			<td><?php echo $organizationProfile['system_1_name']; ?></td>
			<td><?php echo $organizationProfile['system_1_os']; ?></td>
			<td><?php echo $organizationProfile['system_1_vendor']; ?></td>
			<td><?php echo $organizationProfile['system_1_location']; ?></td>
			<td><?php echo $organizationProfile['system_1_ephi']; ?></td>
			<td><?php echo $organizationProfile['system_1_details']; ?></td>
			<td><?php echo $organizationProfile['system_2_name']; ?></td>
			<td><?php echo $organizationProfile['system_2_os']; ?></td>
			<td><?php echo $organizationProfile['system_2_vendor']; ?></td>
			<td><?php echo $organizationProfile['system_2_location']; ?></td>
			<td><?php echo $organizationProfile['system_2_ephi']; ?></td>
			<td><?php echo $organizationProfile['system_2_details']; ?></td>
			<td><?php echo $organizationProfile['system_3_name']; ?></td>
			<td><?php echo $organizationProfile['system_3_os']; ?></td>
			<td><?php echo $organizationProfile['system_3_vendor']; ?></td>
			<td><?php echo $organizationProfile['system_3_location']; ?></td>
			<td><?php echo $organizationProfile['system_3_ephi']; ?></td>
			<td><?php echo $organizationProfile['system_3_details']; ?></td>
			<td><?php echo $organizationProfile['system_4_name']; ?></td>
			<td><?php echo $organizationProfile['system_4_os']; ?></td>
			<td><?php echo $organizationProfile['system_4_vendor']; ?></td>
			<td><?php echo $organizationProfile['system_4_location']; ?></td>
			<td><?php echo $organizationProfile['system_4_ephi']; ?></td>
			<td><?php echo $organizationProfile['system_4_details']; ?></td>
			<td><?php echo $organizationProfile['system_5_name']; ?></td>
			<td><?php echo $organizationProfile['system_5_os']; ?></td>
			<td><?php echo $organizationProfile['system_5_vendor']; ?></td>
			<td><?php echo $organizationProfile['system_5_location']; ?></td>
			<td><?php echo $organizationProfile['system_5_ephi']; ?></td>
			<td><?php echo $organizationProfile['system_5_details']; ?></td>
			<td><?php echo $organizationProfile['additional_info']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organization_profiles', 'action' => 'view', $organizationProfile['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organization_profiles', 'action' => 'edit', $organizationProfile['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organization_profiles', 'action' => 'delete', $organizationProfile['id']), null, __('Are you sure you want to delete # %s?', $organizationProfile['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organization Profile'), array('controller' => 'organization_profiles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
