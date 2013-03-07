<?php
$this->Html->addCrumb('Organization Profiles', '/organization_profiles');
$this->Html->addCrumb('View Organization Profile - ' . $organizationProfile['Client']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="organizationProfiles view">
<h2><?php  echo __('Organization Profile'); ?></h2>
	<dl>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationProfile['Client']['name'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$organizationProfile['Client']['created'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$organizationProfile['Client']['modified'], array('controller' => 'clients', 'action' => 'view', $organizationProfile['Client']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Organization Name:'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['organization_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __("Organization's Administrator Name: "); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['administrator_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __("Organization's Adminstrator Email:"); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['administrator_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Administrator Phone (Primary Contact): '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['administrator_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Administrator Phone (Alternative): '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['administrator_phone_alt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address 1: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['address_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address 2: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['address_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City:'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State:'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip:'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('How many employees(total in the Organization?):'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['number_employees']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Do you have a second location?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['second_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('How many servers do you have?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['number_of_servers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('What is the network operating system?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['network_operating_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Please provide details of your network: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['network_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('How many workstations(desktops) do you have?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['number_workstations']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('How many laptops do you have?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['number_laptops']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Please select the operating systems your workstations and laptiops are running: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['os_installed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Do you have an EMR/EHR implemented?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_implemented']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('What is the name of your EMP/EHR Vendor?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_vendor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('What is the internal name that you use to refer to your EMR/EHR?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_internal_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('What server operating system does your EMR/EHR run on?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Please enter EMR/EHR Other operating system or provide more details: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Where is your EMR/EHR located?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Please describe where your EMR/EHR is located: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['emr_ehr_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Do you utilize Email in your organization?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('What Email vendor and product do you use?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['email_vendor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('List the name of the other Email vendor or provide more details: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['email_vendor_details']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Where is your Email Server?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['email_server_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Please provide us with any additional details regarding your Email: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['email_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Do you use portable media devices?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['portable_media_devices']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Do you use Tablets?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['tablets']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('List the portable media devices you are currently using:'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['list_portable_devices']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Do you utilize backup tapes?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['back_up_tapes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Do you utilize smartphones?'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['smartphones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('List the smartphone vendors and/or phones: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['list_smartphone_vendors']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 1 Name: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_1_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 1 Operating System: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_1_os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 1 Vendor: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_1_vendor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 1 Location: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_1_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 1 # of ePHI Records (estimate):'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_1_ephi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 1 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_1_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 2 Name: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_2_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 2 Operating System: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_2_os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 2 Vendor: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_2_vendor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 2 Location: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_2_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 2 # of ePHI Records (estimate):'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_2_ephi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 2 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_2_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 3 Name: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_3_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 3 Operating System: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_3_os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 3 Vendor: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_3_vendor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 3 Location: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_3_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 3 # of ePHI Records (estimate):'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_3_ephi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 3 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_3_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 4 Name: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_4_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 4 Operating System: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_4_os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 4 Vendor: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_4_vendor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 4 Location:'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_4_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 4 # of ePHI Records (estimate):'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_4_ephi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 4 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_4_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 5 Name: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_5_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 5 Operating System: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_5_os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 5 Vendor: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_5_vendor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 5 Location: '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_5_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 5 # of ePHI Records (estimate):'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_5_ephi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System 5 - Please provide details of the system (how it is used, who uses it, etc.): '); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['system_5_details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Additional Info:'); ?></dt>
		<dd>
			<?php echo h($organizationProfile['OrganizationProfile']['additional_info']); ?>
			&nbsp;
		</dd>
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
