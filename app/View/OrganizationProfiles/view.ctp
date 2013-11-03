<?php
//$this->Html->addCrumb('Organization Profiles', '/organization_profiles');
$this->Html->addCrumb('View Organization Profile - ' . $organizationProfile['Client']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="organizationProfiles view">
<h2><?php  echo __('Organization Profile'); ?></h2>
	<dl>
		<!--<h4 class='highlight'><?php echo __('Id'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['id']); ?>
			&nbsp;
		</p>-->
		<h4 class='highlight'><?php echo __('Client'); ?></h4>
		<p>
			<?php echo $this->Html->link($organizationProfile['Client']['name'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Created'); ?></h4>
		<p>
			<?php echo $this->Time->format('m/d/y g:i a',$organizationProfile['Client']['created'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Modified'); ?></h4>
		<p>
			<?php echo $this->Time->format('m/d/y g:i a',$organizationProfile['Client']['modified'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
			&nbsp;
		</p>

		<!--<h4 class='highlight'><?php echo __('Organization Name:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['organization_name']); ?>
			&nbsp;
		</p>-->
		<h4 class='highlight'><?php echo __("Organization's Administrator Name: "); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['administrator_name']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __("Organization's Adminstrator Email:"); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['administrator_email']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'>
			<?php echo __('Administrator Phone (Primary Contact): '); ?></h4>
		<p>
			<?php

				if(!empty($organizationProfile['OrganizationProfile']['administrator_phone_ext'])){
					$ext = ' ext. ' . $organizationProfile['OrganizationProfile']['administrator_phone_ext'];
				} else {
				$ext = '';
				}
			echo ($organizationProfile['OrganizationProfile']['administrator_phone'] . $ext); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Administrator Phone (Alternative): '); ?></h4>
		<p>
			<?php
				if(!empty($organizationProfile['OrganizationProfile']['administrator_phone_alt_ext'])){
					$altExt = ' ext. ' . $organizationProfile['OrganizationProfile']['administrator_phone_alt_ext'];
				} else {
				$altExt = '';
				}
			echo ($organizationProfile['OrganizationProfile']['administrator_phone_alt']) . $altExt; ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Address 1: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['address_1']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Address 2: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['address_2']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('City:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['city']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('State:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['state']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Zip:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['zip']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('How many employees(total in the Organization?):'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['number_employees']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you have a second location?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['second_location']); ?>
			&nbsp;
		</p>

		<h4 class='highlight'><?php echo __('Second Address 1: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['second_address_1']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Second Address 2: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['second_address_2']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Second City:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['second_city']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Second State:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['second_state']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Second Zip:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['second_zip']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you have a third location?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['third_location']); ?>
			&nbsp;
		</p>

		<h4 class='highlight'><?php echo __('Third Address 1: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['third_address_1']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Third Address 2: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['third_address_2']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Third City:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['third_city']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Third State:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['third_state']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Third Zip:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['third_zip']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you have a fourth location?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fourth_location']); ?>
			&nbsp;
		</p>

		<h4 class='highlight'><?php echo __('Fourth Address 1: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fourth_address_1']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fourth Address 2: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fourth_address_2']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fourth City:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fourth_city']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fourth State:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fourth_state']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fourth Zip:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fourth_zip']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you have a fifth location?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fifth_location']); ?>
			&nbsp;
		</p>

		<h4 class='highlight'><?php echo __('Fifth Address 1: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fifth_address_1']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fifth Address 2: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fifth_address_2']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fifth City:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fifth_city']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fifth State:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fifth_state']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Fifth Zip:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['fifth_zip']); ?>
			&nbsp;
		</p>

		<h4 class='highlight'><?php echo __('How many servers do you have?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['number_of_servers']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('What is the network operating system?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['network_operating_system']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Please provide details of your network: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['network_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('How many workstations(desktops) do you have?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['number_workstations']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('How many laptops do you have?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['number_laptops']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Please select the operating systems your workstations and laptiops are running: '); ?></h4>
		<p>
			<?php // Get OS list, comma separate except last result
			if (!empty($organizationProfile['OperatingSystem'])){
				$i = 0;
				foreach ($organizationProfile['OperatingSystem'] as $operatingSystem){
					$osList[] = $operatingSystem['os_name'];
				}
				$osList = implode(", ", $osList);
				echo $osList;
			}
			?>

			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you have an EMR/EHR implemented?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['emr_ehr_implemented']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('What is the name of your EMP/EHR Vendor?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['emr_ehr_vendor']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('What is the internal name that you use to refer to your EMR/EHR?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['emr_ehr_internal_name']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('What server operating system does your EMR/EHR run on?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['emr_ehr_os']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Please enter EMR/EHR Other operating system or provide more details: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['emr_ehr_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Where is your EMR/EHR located?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['emr_ehr_location']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Please describe where your EMR/EHR is located: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['emr_ehr_description']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you utilize Email in your organization?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['email']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('What Email vendor and product do you use?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['email_vendor']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('List the name of the other Email vendor or provide more details: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['email_vendor_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('What Email vendor and product do you use? '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['email_vendor_other']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Where is your Email Server?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['email_server_location']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Please provide us with any additional details regarding your Email: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['email_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you use portable media devices?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['portable_media_devices']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you use Tablets?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['tablets']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('List the portable media devices you are currently using:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['list_portable_devices']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you utilize backup tapes?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['back_up_tapes']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Do you utilize smartphones?'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['smartphones']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('List the smartphone vendors and/or phones: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['list_smartphone_vendors']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 1 Name: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_name']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 1 Operating System: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_os']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 1 Vendor: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_vendor']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 1 Location: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_location']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 1 # of ePHI Records (estimate):'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_ephi']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 1 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 2 Name: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_2_name']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 2 Operating System: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_2_os']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 2 Vendor: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_2_vendor']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 2 Location: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_2_location']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 2 # of ePHI Records (estimate):'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_2_ephi']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 2 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_2_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 3 Name: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_3_name']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 3 Operating System: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_3_os']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 3 Vendor: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_3_vendor']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 3 Location: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_3_location']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 3 # of ePHI Records (estimate):'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_3_ephi']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 3 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_3_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 4 Name: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_4_name']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 4 Operating System: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_4_os']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 4 Vendor: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_4_vendor']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 4 Location:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_4_location']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 4 # of ePHI Records (estimate):'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_4_ephi']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 4 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_4_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 5 Name: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_5_name']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 5 Operating System: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_5_os']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 5 Vendor: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_5_vendor']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 5 Location: '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_5_location']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 5 # of ePHI Records (estimate):'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_5_ephi']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('System 5 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['system_5_details']); ?>
			&nbsp;
		</p>
		<h4 class='highlight'><?php echo __('Additional Info:'); ?></h4>
		<p>
			<?php echo ($organizationProfile['OrganizationProfile']['additional_info']); ?>
			&nbsp;
		</p>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('List Organization Profiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Profile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Organization Profile'), array('action' => 'edit', $organizationProfile['OrganizationProfile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Profile'), array('action' => 'delete', $organizationProfile['OrganizationProfile']['id']), null, __('Are you sure you want to delete # %s?', $organizationProfile['OrganizationProfile']['id'])); ?> </li>

		<?php endif; ?>
	</ul>
</div>
