<?php
//$this->Html->addCrumb('Organization Profiles', '/organization_profiles');
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
	$emrehr = array('Running on a server in office' => 'Running on a server in office', 'Hosted by vendor(Cloud/SaaS)' => 'Hosted by vendor(Cloud/SaaS)', 'Hosted by third party(Not EMR vendor)' => 'Hosted by third party(Not EMR vendor)', 'Other' => 'Other');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="organizationProfiles form">
<?php echo $this->Form->create('OrganizationProfile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Organization Profile'); ?></legend>
	<div class='orgProfTabs'>
	  <ul>
        <li><a href='#tab1' class='orgProfTab'>Name and Location</a></li>
        <li><a href='#tab2' class='orgProfTab'>Network</a></li>
        <li><a href='#tab3' class='orgProfTab'>EMR/EHR</a></li>
        <li><a href='#tab4' class='orgProfTab'>Email</a></li>
        <li><a href='#tab5' class='orgProfTab'>Portable Media</a></li>
        <li><a href='#tab6' class='orgProfTab'>Backup Media</a></li>
        <li><a href='#tab7' class='orgProfTab'>SmartPhones</a></li>
        <li><a href='#tab8' class='orgProfTab'>Additional Systems</a></li>
        <li><a href='#tab9' class='orgProfTab'>Additional Information</a></li>
    </ul>

    <div id='tab1' class='tabBox'>
    <?php

        $client = $this->Session->read('Auth.User.client_id');  // Test Client.
        if($client == 1){  // if admin allow to choose
            echo $this->Form->input('client_id', array('empty' => 'Please Select'));
        } else {
            echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
        }

        //echo $this->Form->input('organization_name', array('label' => 'Organization Name: ', 'value' => $orgName));
        echo $this->Form->input('administrator_name', array('label' => "Organization's Administrator Name: "));
        echo $this->Form->input('administrator_email', array('label' =>"Organization's Adminstrator Email: "));
        echo $this->Form->input('administrator_phone', array('type' => 'tel', 'class' => 'tel', 'label' =>"Administrator Phone (Primary Contact): "));
        echo $this->Form->input('administrator_phone_ext', array('label' =>"Ext.", 'class' => 'num'));
        echo $this->Form->input('administrator_phone_alt', array('type' => 'tel', 'label' =>"Administrator Phone (Alternative): ", 'class' => 'tel'));
        echo $this->Form->input('administrator_phone_alt_ext', array('label' =>"Ext.", 'class' => 'num'));
        echo $this->Form->input('address_1', array('label' => 'Address 1: '));
        echo $this->Form->input('address_2', array('label' => 'Address 2: '));
        echo $this->Form->input('city', array('label' => 'City: '));
        echo $this->Form->input('state', array('label' => 'State: ', 'options' => $states, 'empty' => 'Please Select One'));
        echo $this->Form->input('zip', array('label' => 'Zip: ', 'class' => 'num'));
        echo $this->Form->input('number_employees', array('label' =>'How many employees(total in the Organization?):', 'class' => 'num', 'min' => '1'));
        echo $this->Form->input('mu_incentive_program', array('label' => 'If you are a HIPAA Covered Entity are you participating in the Meaningful Use Incentive Program?', 
                                                              'options' => array('' => '', 'Yes' => 'Yes', 'No' => 'No', )));
        echo $this->Form->input('second_location', array('label' =>'Do you have a second location?', 'type' => 'checkbox', 'value' => 'Yes', 'hiddenField' => 'No', 'class' => 'orgCheck2'));
    ?>

    <div class='orgSecondLocation'>
        <hr />
        <h3>Second Location</h3>
        <?php
        echo $this->Form->input('second_address_1', array('label' => 'Address 1: '));
        echo $this->Form->input('second_address_2', array('label' => 'Address 2: '));
        echo $this->Form->input('second_city', array('label' => 'City: '));
        echo $this->Form->input('second_state', array('label' => 'State: ', 'options' => $states, 'empty' => 'Please Select One'));
        echo $this->Form->input('second_zip', array('label' => 'Zip: ', 'class' => 'num'));
        echo $this->Form->input('third_location', array('label' =>'Do you have a third location?', 'type' => 'checkbox', 'value' => 'Yes', 'hiddenField' => 'No', 'class' => 'orgCheck3'));
        ?>
    </div>

    <div class='orgThirdLocation'>
        <hr />
        <h3>Third Location</h3>
        <?php
        echo $this->Form->input('third_address_1', array('label' => 'Address 1: '));
        echo $this->Form->input('third_address_2', array('label' => 'Address 2: '));
        echo $this->Form->input('third_city', array('label' => 'City: '));
        echo $this->Form->input('third_state', array('label' => 'State: ', 'options' => $states, 'empty' => 'Please Select One'));
        echo $this->Form->input('third_zip', array('label' => 'Zip: ', 'class' => 'num'));
        echo $this->Form->input('fourth_location', array('label' =>'Do you have a fourth location?', 'type' => 'checkbox', 'value' => 'Yes', 'hiddenField' => 'No', 'class' => 'orgCheck4'));
        ?>
    </div>
    <div class='orgFourthLocation'>
        <hr />
        <h3>Fourth Location</h3>
        <?php
        echo $this->Form->input('fourth_address_1', array('label' => 'Address 1: '));
        echo $this->Form->input('fourth_address_2', array('label' => 'Address 2: '));
        echo $this->Form->input('fourth_city', array('label' => 'City: '));
        echo $this->Form->input('fourth_state', array('label' => 'State: ', 'options' => $states, 'empty' => 'Please Select One'));
        echo $this->Form->input('fourth_zip', array('label' => 'Zip: ', 'class' => 'num'));
        echo $this->Form->input('fifth_location', array('label' =>'Do you have a fifth location?', 'type' => 'checkbox', 'value' => 'Yes', 'hiddenField' => 'No', 'class' => 'orgCheck5'));
        ?>
    </div>
    <div class='orgFifthLocation'>
        <hr />
        <h3>Fifth Location</h3>
        <?php
        echo $this->Form->input('fifth_address_1', array('label' => 'Address 1: '));
        echo $this->Form->input('fifth_address_2', array('label' => 'Address 2: '));
        echo $this->Form->input('fifth_city', array('label' => 'City: '));
        echo $this->Form->input('fifth_state', array('label' => 'State: ', 'options' => $states, 'empty' => 'Please Select One'));
        echo $this->Form->input('fifth_zip', array('label' => 'Zip: ', 'class' => 'num'));
        ?>
    </div>
    </div>
    <div id='tab2' class='tabBox'>
        <p class='highlight'>In this section we will ask you questions about your network including your servers, desktops, laptops, etc. This will help us get an overview of your network and assist with the Risk Assessment.</p>
    <?php
        echo $this->Form->input('number_of_servers', array('label' =>'How many servers do you have?', 'class' => 'num', 'min' => '0'));
        echo $this->Form->input('phi_on_servers', array('label' => 'Do you have patient information on any servers?', 'options' => $choice));
        echo $this->Form->input('network_operating_system', array('label' =>'What is the network operating system?', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('network_details', array('label' =>'Please provide details of your network: '));
        echo $this->Form->input('number_workstations', array('label' =>'How many workstations(desktops) do you have?', 'class' => 'num', 'min' => '0'));
        echo $this->Form->input('phi_on_workstations', array('label' => 'Do you have patient information on any workstations?', 'options' => $choice));
        echo $this->Form->input('number_laptops', array('label' =>'How many laptops do you have?', 'class' => 'num', 'min' => '0'));
        echo $this->Form->input('phi_on_laptops', array('label' => 'Do you have patient information on any laptops?', 'options' => $choice));
        echo $this->Form->label(null, 'Please check any operating systems your workstations and laptops are running: ');
        echo $this->Form->input('os_win8', array('label' => 'Windows 8', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_win7', array('label' => 'Windows 7', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_winvista', array('label' => 'Windows Vista', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_winxp', array('label' => 'Windows XP', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_winold', array('label' => 'Older Windows (ME, 2000, NT)', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_mac', array('label' => 'Apple/MAC', 'div' => 'input checkbox inlinebox'));
    ?>
    </div>
    <div id='tab3' class='tabBox'>
        <p class='highlight'>In this section we will ask you questions about your Electronic Medical Records (EMR) or Electronic Health Records (EHR)</p>
    <?php
        echo $this->Form->input('emr_ehr_implemented', array('label' => 'Do you have an EMR/EHR implemented?', 'options' => $choice, 'empty' => 'Please Select One' ));
        echo $this->Form->input('emr_ehr_vendor', array('label' => 'What is the name of your EMR/EHR Vendor?'));
        echo $this->Form->input('emr_ehr_internal_name', array('label' => 'What is the internal name that you use to refer to your EMR/EHR?'));
        echo $this->Form->input('emr_ehr_os', array('label' => 'What server operating system does your EMR/EHR run on?',
                                                    'options' => $os, 'empty' => 'Please Select One'));
        echo '<div class="otherEmrOs hidden">'.
        $this->Form->input('emr_ehr_os_other', array('label' => 'Other EMR/EHR OS?'))
        . '</div>';


        echo $this->Form->input('emr_ehr_details', array('label' => 'Please enter EMR/EHR Other operating system or provide more details: '));
        echo $this->Form->input('emr_ehr_location', array('label' => 'Where is your EMR/EHR located?', 'options' => $emrehr, 'empty' => 'Please Select One'));

        echo '<div class="emrEhrOtherLoc hidden">'.
        $this->Form->input('emr_ehr_other_location', array('label' => 'Other EMR/EHR Location'))
        . '</div>';

        echo $this->Form->input('emr_ehr_description', array('label' => 'Please describe where your EMR/EHR is located: '));
    ?>
    </div>

    <div id='tab4' class='tabBox'>
    <?php
        echo $this->Form->input('email', array('label' => 'Do you utilize Email in your organization?', 'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('phi_on_email', array('label' => 'Do you have patient information in any email accounts?', 'options' => $choice));
        echo $this->Form->input('email_vendor', array('label' => 'What Email vendor and product do you use?',
                                                        'options' => $emailVendor, 'empty' => 'Please Select One'));

        echo '<div class="otherEmail hidden">'.
        $this->Form->input('email_vendor_details', array('label' => 'List the name of the other Email vendor or provide more details: '))
        . "</div>";

        echo $this->Form->input('email_server_location', array('label' => 'Where is your Email Server?', 'options' => $emailHost, 'empty' => 'Please Select One'));
        echo $this->Form->input('email_details', array('label' => 'Please provide us with any additional details regarding your Email: '));
    ?>
    </div>

    <div id='tab5' class='tabBox'>
        <p class='highlight'>Portable media includes: USB drives, CD-ROM, DVD-ROM, Floppy Drives, Tablet Computers (iPad), etc.</p>
    <?php
        echo $this->Form->input('portable_media_devices', array('label' => 'Do you use portable media devices?',
                                                                'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('phi_on_portable_media', array('label' => 'Do you have patient information on any portable media (including USB drives, CDs, DVD, Tablets, etc.)?', 'options' => $choice));                                                        
        echo $this->Form->input('tablets', array('label' => 'Do you use Tablets?', 'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('list_portable_devices', array('label' => 'List the portable media devices you are currently using:'));
    ?>
    </div>

    <div id='tab6' class='tabBox'>
    <?php
        echo $this->Form->input('backup_media', array('label' => 'Do you utilize backup media?', 'options' => $choice, 'empty' => 'Please Select One'));
    ?>
      <div class="backupMediaDetails hidden">
          <?php echo $this->Form->input('backup_media_details', array('label' => 'Please provide us with any additional details regarding your Backup Media')) ?>
      </div>
    </div>

    <div id='tab7' class='tabBox'>
    <?php
        echo $this->Form->input('smartphones', array('label' => 'Do you utilize smartphones?', 'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('phi_on_smartphones', array('label' => 'Do you have patient information on any Smartphones (including emails, text messages, etc)?', 'options' => $choice));
        echo $this->Form->input('list_smartphone_vendors', array('label' => 'List the smartphone vendors and/or phones: '));
    ?>
    </div>

    <div id='tab8' class='tabBox'>
        <p class='highlight'>Please list any other systems that contain patient information or electronic protected health information (ePHI). Systems may include Digital x-ray, Billing, Practice Management, etc.</p>
    <?php
        echo '<h3 class="highlight">System 1</h3>';
        echo $this->Form->input('system_1_name', array('label' => 'System 1 Name: '));
        echo $this->Form->input('system_1_os', array('label' => 'System 1 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_1_vendor', array('label' => 'System 1 Vendor: '));
        echo $this->Form->input('system_1_location', array('label' => 'System 1 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_1_ephi', array('label' => 'System 1 # of ePHI Records (estimate):', 'min' => 0));
        echo $this->Form->input('system_1_details', array('label' => 'System 1 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 2</h3>';
        echo $this->Form->input('system_2_name', array('label' => 'System 2 Name: '));
        echo $this->Form->input('system_2_os', array('label' => 'System 2 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_2_vendor', array('label' => 'System 2 Vendor: '));
        echo $this->Form->input('system_2_location', array('label' => 'System 2 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_2_ephi', array('label' => 'System 2 # of ePHI Records (estimate):', 'min' => 0));
        echo $this->Form->input('system_2_details', array('label' => 'System 2 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 3</h3>';
        echo $this->Form->input('system_3_name', array('label' => 'System 3 Name: '));
        echo $this->Form->input('system_3_os', array('label' => 'System 3 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_3_vendor', array('label' => 'System 3 Vendor: '));
        echo $this->Form->input('system_3_location', array('label' => 'System 3 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_3_ephi', array('label' => 'System 3 # of ePHI Records (estimate):', 'min' => 0));
        echo $this->Form->input('system_3_details', array('label' => 'System 3 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 4</h3>';
        echo $this->Form->input('system_4_name', array('label' => 'System 4 Name: '));
        echo $this->Form->input('system_4_os', array('label' => 'System 4 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_4_vendor', array('label' => 'System 4 Vendor: '));
        echo $this->Form->input('system_4_location', array('label' => 'System 4 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_4_ephi', array('label' => 'System 4 # of ePHI Records (estimate):', 'min' => 0));
        echo $this->Form->input('system_4_details', array('label' => 'System 4 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 5</h3>';
        echo $this->Form->input('system_5_name', array('label' => 'System 5 Name: '));
        echo $this->Form->input('system_5_os', array('label' => 'System 5 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_5_vendor', array('label' => 'System 5 Vendor: '));
        echo $this->Form->input('system_5_location', array('label' => 'System 5 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_5_ephi', array('label' => 'System 5 # of ePHI Records (estimate):', 'min' => 0));
        echo $this->Form->input('system_5_details', array('label' => 'System 5 - Please provide details of the system (how it is used, who uses it, etc.): '));
    ?>
    </div>
    <div id="tab9" class='tabBox'>
        <p class='highlight'>Please provide any additional information that will help us understand your network/computer environment.</p>
        <ul>
            <li><p class='highlight'>List any additional systems that contain patient information or electronic protected health information (ePHI).</p></li>
            <li><p class='highlight'>List any known threats or issues that you have experienced in the past (floods, crimes, etc.)</p></li>
            <li><p class='highlight'>Use this section to provide anything that you feel will help us with the Risk Assessment</p></li>
        </ul>
    <?php

        echo $this->Form->input('additional_info', array('label' => 'Additional Information: '));

    ?>
    </div>
	</div>
	</fieldset>
	<div class='submit'>
	    <?php echo $this->Form->submit('Save', array('div' => false)); ?>
	   <?php echo $this->Html->link('Save and next', '#', array( 'class' => 'submitbtn orgProfNextTab')); ?>
	</div>
    <?php echo $this->Form->end(); ?>
</div>
<?php if($group == 1): ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Organization Profiles'), array('action' => 'index')); ?></li>
	</ul>
</div>
<?php endif; ?>
<div class='newsFeed'>
	<h3><?php echo __('Latest News'); ?></h3>
	<?php echo $this->element('feeds'); ?>
</div>
