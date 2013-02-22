<?php
$this->Html->addCrumb('Organization Profiles', '/organization_profiles');
$this->Html->addCrumb('Edit Organization Profile');

	$states = array('AL'=>"Alabama", 'AK'=>"Alaska", 'AZ'=>"Arizona", 'AR'=>"Arkansas", 'CA'=>"California", 'CO'=>"Colorado", 
					'CT'=>"Connecticut", 'DE'=>"Delaware", 'DC'=>"District Of Columbia", 'FL'=>"Florida", 'GA'=>"Georgia", 
					'HI'=>"Hawaii", 'ID'=>"Idaho", 'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa", 'KS'=>"Kansas", 
					'KY'=>"Kentucky", 'LA'=>"Louisiana", 'ME'=>"Maine", 'MD'=>"Maryland", 'MA'=>"Massachusetts", 'MI'=>"Michigan", 
					'MN'=>"Minnesota", 'MS'=>"Mississippi", 'MO'=>"Missouri", 'MT'=>"Montana", 'NE'=>"Nebraska", 'NV'=>"Nevada", 
					'NH'=>"New Hampshire", 'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York", 'NC'=>"North Carolina", 
					'ND'=>"North Dakota", 'OH'=>"Ohio", 'OK'=>"Oklahoma", 'OR'=>"Oregon", 'PA'=>"Pennsylvania", 'RI'=>"Rhode Island", 
					'SC'=>"South Carolina", 'SD'=>"South Dakota", 'TN'=>"Tennessee", 'TX'=>"Texas", 'UT'=>"Utah", 'VT'=>"Vermont", 
					'VA'=>"Virginia", 'WA'=>"Washington", 'WV'=>"West Virginia", 'WI'=>"Wisconsin", 'WY'=>"Wyoming"
					);
	$choice = array('Yes' => 'Yes', 'No' => 'No');
	$osLong = array('Windows 8' => 'Windows 8', 'Windows 7' => 'Windows 7', 'Windows Vista' => 'Windows Vista', 'Windows XP' => 'Windows XP', 
				'Older Windows (ME, 2000, NT)' => 'Older Windows (ME, 2000, NT)', 'Mac OS' => 'Mac OS', 'UNIX/Linux' => 'UNIX/Linux', 'Other' => 'Other');
	$os = array('Windows' => 'Windows', 'UNIX' => 'UNIX', 'Linux' => 'Linux', 'Mac OS' => 'Mac OS', 'Other' => 'Other'); 
	$emailVendor = array('Microsoft Exchange' => 'Microsoft Exchange', 'Google Gmail' => 'Google Gmail', 
						'Yahoo! Mail' => 'Yahoo Mail!', 'Hotmail' => 'Hotmail', 'Other' => 'Other');
	$emailHost = array('Onsite' => 'Onsite', 'Hosted by a 3rd party' => 'Hosted by a 3rd party', 
					'Cloud(Google, Yahoo!, Hotmail)' => 'Cloud(Google, Yahoo!, Hotmail)', 'Other' => 'Other' );
	$host = array('Onsite' => 'Onsite', 'Vendor Hosted' => 'Vendor Hosted', 'Hosted by a 3rd party' => 'Hosted by a 3rd party', 'Other' => 'Other' );					

	// Convert OS installed from comma separated string back into check options
	$os_installed = explode(',', $this->request->data['OrganizationProfile']['os_installed']);
?>

<div class="organizationProfiles form">
<?php echo $this->Form->create('OrganizationProfile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Organization Profile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		
		$client = $this->Session->read('Auth.User.client_id');  // Test Client. 
		if($client == 1){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}
		
		
		echo $this->Form->input('organization_name', array('label' => 'Organization Name: '));
		echo $this->Form->input('administrator_name', array('label' => "Organization's Administrator Name: "));
		echo $this->Form->input('administrator_email', array('label' =>"Organization's Adminstrator Email: "));
		echo $this->Form->input('administrator_phone', array('label' =>"Administrator Phone (Primary Contact): "));
		echo $this->Form->input('administrator_phone_alt', array('label' =>"Administrator Phone (Alternative): "));
		echo $this->Form->input('address_1', array('label' => 'Address 1: '));
		echo $this->Form->input('address_2', array('label' => 'Address 2: '));
		echo $this->Form->input('city', array('label' => 'City: '));
		echo $this->Form->input('state', array('label' => 'State: ', 'options' => $states, 'empty' => 'Please Select One'));
		echo $this->Form->input('zip', array('label' => 'Zip: '));
		echo $this->Form->input('number_employees', array('label' =>'How many employees(total in the Organization?):'));
		echo $this->Form->input('second_location', array('label' =>'Do you have a second location?', 'options' => $choice, 'empty' => 'Please Select One'));
		
		echo $this->Form->input('number_of_servers', array('label' =>'How many servers do you have?'));
		echo $this->Form->input('network_operating_system', array('label' =>'What is the network operating system?'));
		echo $this->Form->input('network_details', array('label' =>'Please provide details of your network: '));
		echo $this->Form->input('number_workstations', array('label' =>'How many workstations(desktops) do you have?'));
		echo $this->Form->input('number_laptops', array('label' =>'How many laptops do you have?'));
		echo $this->Form->input('os_installed', array('label' =>'Please select the operating systems your workstations and laptiops are running: ',
								'options' => $osLong, 'multiple' => 'checkbox', 'selected' => $os_installed));
		
		echo $this->Form->input('emr_ehr_implemented', array('label' => 'Do you have an EMR/EHR implemented?', 'options' => $choice, 'empty' => 'Please Select One' ));
		echo $this->Form->input('emr_ehr_vendor', array('label' => 'What is the name of your EMP/EHR Vendor?'));
		echo $this->Form->input('emr_ehr_internal_name', array('label' => 'What is the internal name that you use to refer to your EMR/EHR?'));
		echo $this->Form->input('emr_ehr_os', array('label' => 'What server operating system does your EMR/EHR run on?', 
													'options' => $os, 'empty' => 'Please Select One'));
		echo $this->Form->input('emr_ehr_details', array('label' => 'Please enter EMR/EHR Other operating system or provide more details: '));
		echo $this->Form->input('emr_ehr_location', array('label' => 'Where is your EMR/EHR located?'));
		echo $this->Form->input('emr_ehr_description', array('label' => 'Please describe where your EMR/EHR is located: '));
		
		echo $this->Form->input('email', array('label' => 'Do you utilize Email in your organization?', 'options' => $choice, 'empty' => 'Please Select One'));
		echo $this->Form->input('email_vendor', array('label' => 'What Email vendor and product do you use?', 
														'options' => $emailVendor, 'empty' => 'Please Select One'));
		echo $this->Form->input('email_vendor_details', array('label' => 'List the name of the other Email vendor or provide more details: '));		
		echo $this->Form->input('email_server_location', array('label' => 'Where is your Email Server?', 'options' => $emailHost, 'empty' => 'Please Select One'));
		echo $this->Form->input('email_details', array('label' => 'Please provide us with any additional details regarding your Email: '));
		
		echo $this->Form->input('portable_media_devices', array('label' => 'Do you use portable media devices?', 
																'options' => $choice, 'empty' => 'Please Select One'));
		echo $this->Form->input('tablets', array('label' => 'Do you use Tablets?', 'options' => $choice, 'empty' => 'Please Select One'));
		echo $this->Form->input('list_portable_devices', array('label' => 'List the portable media devices you are currently using:'));
		echo $this->Form->input('back_up_tapes', array('label' => 'Do you utilize backup tapes?', 'options' => $choice, 'empty' => 'Please Select One'));
		
		echo $this->Form->input('smartphones', array('label' => 'Do you utilize smartphones?', 'options' => $choice, 'empty' => 'Please Select One'));
		echo $this->Form->input('list_smartphone_vendors', array('label' => 'List the smartphone vendors and/or phones: '));
		
		echo $this->Form->input('system_1_name', array('label' => 'System 1 Name: '));
		echo $this->Form->input('system_1_os', array('label' => 'System 1 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_1_vendor', array('label' => 'System 1 Vendor: '));
		echo $this->Form->input('system_1_location', array('label' => 'System 1 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_1_ephi', array('label' => 'System 1 # of ePHI Records (estimate):'));
		echo $this->Form->input('system_1_details', array('label' => 'System 1 - Please provide details of the system (how it is used, who uses it, etc.): '));
		
		echo $this->Form->input('system_2_name', array('label' => 'System 2 Name: '));
		echo $this->Form->input('system_2_os', array('label' => 'System 2 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_2_vendor', array('label' => 'System 2 Vendor: '));
		echo $this->Form->input('system_2_location', array('label' => 'System 2 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_2_ephi', array('label' => 'System 2 # of ePHI Records (estimate):'));
		echo $this->Form->input('system_2_details', array('label' => 'System 2 - Please provide details of the system (how it is used, who uses it, etc.): '));
		
		echo $this->Form->input('system_3_name', array('label' => 'System 3 Name: '));
		echo $this->Form->input('system_3_os', array('label' => 'System 3 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_3_vendor', array('label' => 'System 3 Vendor: '));
		echo $this->Form->input('system_3_location', array('label' => 'System 3 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_3_ephi', array('label' => 'System 3 # of ePHI Records (estimate):'));
		echo $this->Form->input('system_3_details', array('label' => 'System 3 - Please provide details of the system (how it is used, who uses it, etc.): '));
		
		echo $this->Form->input('system_4_name', array('label' => 'System 4 Name: '));
		echo $this->Form->input('system_4_os', array('label' => 'System 4 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_4_vendor', array('label' => 'System 4 Vendor: '));
		echo $this->Form->input('system_4_location', array('label' => 'System 4 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_4_ephi', array('label' => 'System 4 # of ePHI Records (estimate):'));
		echo $this->Form->input('system_4_details', array('label' => 'System 4 - Please provide details of the system (how it is used, who uses it, etc.): '));
		
		echo $this->Form->input('system_5_name', array('label' => 'System 5 Name: '));
		echo $this->Form->input('system_5_os', array('label' => 'System 5 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_5_vendor', array('label' => 'System 5 Vendor: '));
		echo $this->Form->input('system_5_location', array('label' => 'System 5 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
		echo $this->Form->input('system_5_ephi', array('label' => 'System 5 # of ePHI Records (estimate):'));
		echo $this->Form->input('system_5_details', array('label' => 'System 5 - Please provide details of the system (how it is used, who uses it, etc.): '));
		
		echo $this->Form->input('additional_info', array('label' => 'Additional Information: '));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OrganizationProfile.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OrganizationProfile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Organization Profiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
