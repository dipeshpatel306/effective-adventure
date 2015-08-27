<?php
$this->Html->addCrumb('Edit Organization Profile');
$choice = array('Yes' => 'Yes', 'No' => 'No');
$os = array('Windows' => 'Windows', 'UNIX' => 'UNIX', 'Linux' => 'Linux', 'Mac OS' => 'Mac OS', 'Other' => 'Other');
$emailVendor = array('Microsoft Exchange' => 'Microsoft Exchange', 'Google Gmail' => 'Google Gmail',
					'Yahoo! Mail' => 'Yahoo! Mail', 'Hotmail' => 'Hotmail', 'Other' => 'Other');
$emailHost = array('Onsite' => 'Onsite', 'Hosted by a 3rd party' => 'Hosted by a 3rd party',
					'Cloud(Google, Yahoo!, Hotmail)' => 'Cloud(Google, Yahoo!, Hotmail)', 'Other' => 'Other' );
$host = array('Onsite' => 'Onsite', 'Vendor Hosted' => 'Vendor Hosted', 'Hosted by a 3rd party' => 'Hosted by a 3rd party', 'Other' => 'Other' );
$emrehr = array('Running on a server in office' => 'Running on a server in office', 'Hosted by vendor(Cloud/SaaS)' => 'Hosted by vendor(Cloud/SaaS)', 'Hosted by third party(Not EMR vendor)' => 'Hosted by third party(Not EMR vendor)', 'Other' => 'Other');
$industries = array(
    'Agriculture' => 'Agriculture',
    'Apparel' => 'Apparel',
    'Banking' => 'Banking',
    'Biotechnology' => 'Biotechnology',
    'Chemicals' => 'Chemicals',
    'Communications' => 'Communications',
    'Construction' => 'Construction',
    'Consulting' => 'Consulting',
    'Education' => 'Education',
    'Electronics' => 'Electronics',
    'Energy' => 'Energy',
    'Engineering' => 'Engineering',
    'Entertainment' => 'Entertainment',
    'Environmental' => 'Environmental',
    'Finance' => 'Finance',
    'Food & Beverage' => 'Food & Beverage',
    'Government' => 'Government',
    'Healthcare' => 'Healthcare',
    'Hospitality' => 'Hospitality',
    'Insurance' => 'Insurance',
    'Legal' => 'Legal',
    'Machinery' => 'Machinery',
    'Manufacturing' => 'Manufacturing',
    'Media' => 'Media',
    'Not For Profit' => 'Not For Profit',
    'Other' => 'Other',
    'Recreation' => 'Recreation',
    'Retail' => 'Retail',
    'Shipping' => 'Shipping',
    'Technology' => 'Technology',
    'Telecommunications' => 'Telecommunications',
    'Transportation' => 'Transportation',
    'Utilities' => 'Utilities',
    'Other' => 'Other'
);

// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="fouc organizationProfiles form">
<?php echo $this->Form->create('OrganizationProfile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Organization Profile'); ?></legend>
	<div class='orgProfTabs'>
	  <ul>
        <li><a href='#tab1' class='orgProfTab'>Name and Location</a></li>
        <li><a href='#tab2' class='orgProfTab'>Network</a></li>
        <li><a href='#tab3' class='orgProfTab'>Email</a></li>
        <li><a href='#tab4' class='orgProfTab'>Portable Media</a></li>
        <li><a href='#tab5' class='orgProfTab'>Backup Media</a></li>
        <li><a href='#tab6' class='orgProfTab'>SmartPhones</a></li>
        <li><a href='#tab7' class='orgProfTab'>Systems</a></li>
        <li><a href='#tab8' class='orgProfTab'>Additional Information</a></li>
    </ul>
    <div class='hidden tooltip', for='OrganizationProfileNetworkOperatingSystem'>
        <p>This is the operating system used on your servers.</p>
    </div>
    <div class='hidden tooltip', for='OrganizationProfilePiiOnWorkstations'>
        <p>Keep in mind, sensitive data may be in Documents, Spreadsheets, PDFs, Email Attachments, Screenshots, Audio/Videos, etc.</p>
    </div>
    <div class='hidden tooltip', for='OrganizationProfilePiiOnLaptops'>
        <p>Keep in mind, sensitive data may be in Documents, Spreadsheets, PDFs, Email Attachments, Screenshots, Audio/Videos, etc.</p>
    </div>
    <div id='tab1' class='tabBox'>
    <?php

        $client = $this->Session->read('Auth.User.client_id');  // Test Client.
        if($client == 1){  // if admin allow to choose
            echo $this->Form->input('client_id', array('empty' => 'Please Select'));
        } else {
            echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
        }

		echo $this->Form->input('industry', array('label' => 'What industry describes your organization?', 'options' => $industries, 'empty' => 'Please Select One'));
	?>
	<div class='otherIndustry hidden'>
        <?php echo $this->Form->input('industry_other', array('label' => 'Other Industry')); ?>
    </div>
    <?php
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
        echo $this->Form->input('second_location', array('label' =>'Do you have a second location?', 'type' => 'checkbox', 'value' => 'Yes', 'hiddenField' => 'No', 'class' => 'orgCheck2'));
    ?>

    <div class='orgSecondLocation hidden'>
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

    <div class='orgThirdLocation hidden'>
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
    <div class='orgFourthLocation hidden'>
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
    <div class='orgFifthLocation hidden'>
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
    	<div class='highlight'>
          <p>In this section we will ask you questions about your network including your servers, desktops, laptops, etc. This will help us get an overview of your network and assist with the Risk Assessment.</p>   
    	  <p>Personally Identifiable Information (PII) and Sensitive Data</p>
    	  <p>Use the below information to help answer questions about PII and Sensitive Data. Keep in mind that PII might be clients, customers, vendors, employees, etc. The following is PII and Sensitive Data</p>
    	  <p class='underline italic'>Personal Identifiers</p>
    	  <ul>
    		<li>Name</li>
    		<li>Social Security number</li>
    		<li>Drivers' license number</li>
    		<li>Credit card numbers</li>
    		<li>Other financial account numbers (bank, etc)</li>
    		<li>Passport numbers</li>
    		<li>Other Government ID # or unique identifiers</li>
    	  </ul>
    	  <br />
    	  <p class='underline italic'>Contact Information</p>
    	  <ul>
    	  	<li>E-mail address</li>
    	  	<li>Phone number</li>
    	  	<li>Postal address</li>
    	  </ul>
    	  <br />
    	  <p class='underline italic'>Other personal data</p>
    	  <ul>
    	  	<li>User names, avatars, etc.</li>
    	  	<li>Mother's maiden name</li>
    	  	<li>Birth date</li>
    	  	<li>Sex</li>
    	  	<li>Age</li>
    	  	<li>Other physical descriptors (eye/hair color, height, etc.)</li>
    	  	<li>Sexual orientation</li>
    	  	<li>Race/ethnicity</li>
    	  	<li>Religion</li>
			<li>Education</li>
			<li>Employment</li>
			<li>Citizenship</li>
			<li>Health, insurance, treatment, or medical information</li>
			<li>Criminal history</li>
			<li>Other PII (e.g., in unstructured data fields completed by user)</li>
	      </ul>
	      <br />
    	  <p class='underline italic'>Biometric identifiers and similar physical-based data</p>
	      <ul>
			<li>Signature</li>
			<li>Fingerprints, handprints</li>
			<li>Photo, scans (retinal, facial)</li>
			<li>Voice</li>
			<li>Physical movements (e.g., finger swipes, keystrokes)</li>
			<li>DNA markers</li>
		  </ul>
	      <br />
    	  <p class='underline italic'>Device-based or -related data</p>
	      <ul>
			<li>User names</li>
			<li>Passwords</li>
			<li>Unique device identifier</li>
			<li>Location/GPS data</li>
			<li>Camera controls (photo, video, videoconference)</li>
			<li>Microphone controls</li>
			<li>Other hardware/software controls</li>
			<li>Photo data</li>
			<li>Audio/sound data</li>
			<li>Other device sensor controls or data</li>
			<li>On/Off status and controls</li>
			<li>Cell tower records (e.g., logs, user location, time, date)</li>
			<li>Data collected by apps (itemize)</li>
			<li>Contact lists and directories</li>
			<li>Biometric data or related data (see above)</li>
			<li>SD card or other stored data</li>
			<li>Network status</li>
			<li>Network communications data</li>
			<li>Device settings or preferences (e.g., security, sharing, status, etc.)</li>
		  </ul>
		  <br />
    	  <p class='underline italic'>Web site or platform-related data</p>
		  <ul>
		  	<li>Log data (e.g., IP address, time, date, referrer site, browser type)</li>
			<li>Tracking data (e.g., single- or multi-session cookies, beacons)</li>
			<li>Forms data</li>
		  </ul>
		  <br />
    	  <p class='underline italic'>Sensitive data</p>
			<li>Organization's proprietary information</li>
			<li>Organizations plans or information that might be damaging if a competitor accessed the information</li>
		  </ul>
    	</div>
    <?php
        echo $this->Form->input('number_of_servers', array('label' =>'How many servers do you have?', 'class' => 'num', 'min' => '0'));
        echo $this->Form->input('pii_on_servers', array('label' => 'Do you collect and/or store sensitive data (including credit cards, social security numbers, date of birth, driver’s licenses or confidential organizational information) on any server?', 'options' => $choice));
        echo $this->Form->input('network_operating_system', array('label' =>'What is the network operating system?', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('network_details', array('label' =>'Please provide details of your network: '));
        echo $this->Form->input('number_workstations', array('label' =>'How many workstations(desktops) do you have?', 'class' => 'num', 'min' => '0'));
        echo $this->Form->input('pii_on_workstations', array('label' => 'Do you collect and/or store sensitive data (including credit cards, social security numbers, date of birth, driver’s licenses or confidential organizational information) on any workstations?', 'options' => $choice));
        echo $this->Form->input('number_laptops', array('label' =>'How many laptops do you have?', 'class' => 'num', 'min' => '0'));
        echo $this->Form->input('pii_on_laptops', array('label' => 'Do you collect and/or store sensitive data (including credit cards, social security numbers, date of birth, driver’s licenses or confidential organizational information) on any laptops?', 'options' => $choice));
        echo $this->Form->label(null, 'Please check any operating systems your workstations and laptops are running: ');
		echo $this->Form->input('os_win10', array('label' => 'Windows 10', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_win8', array('label' => 'Windows 8', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_win7', array('label' => 'Windows 7', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_winvista', array('label' => 'Windows Vista', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_winxp', array('label' => 'Windows XP', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_winold', array('label' => 'Older Windows (ME, 2000, NT)', 'div' => 'input checkbox inlinebox'));
        echo $this->Form->input('os_mac', array('label' => 'Apple/MAC', 'div' => 'input checkbox inlinebox'));
    ?>
    </div>
    <div id='tab3' class='tabBox'>
    <?php
        echo $this->Form->input('email', array('label' => 'Do you utilize Email in your organization?', 'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('pii_on_email', array('label' => 'Do you have PII or Sensitive Data in any email accounts?', 'options' => $choice));
        echo $this->Form->input('email_vendor', array('label' => 'What Email vendor and product do you use?',
                                                        'options' => $emailVendor, 'empty' => 'Please Select One'));

        echo '<div class="otherEmail hidden">'.
        $this->Form->input('email_vendor_details', array('label' => 'List the name of the other Email vendor or provide more details: '))
        . "</div>";

        echo $this->Form->input('email_server_location', array('label' => 'Where is your Email Server?', 'options' => $emailHost, 'empty' => 'Please Select One'));
        echo $this->Form->input('email_details', array('label' => 'Please provide us with any additional details regarding your Email: '));
    ?>
    </div>

    <div id='tab4' class='tabBox'>
        <p class='highlight'>Portable media includes: USB drives, CD-ROM, DVD-ROM, Floppy Drives, Tablet Computers (iPad), etc.</p>
    <?php
        echo $this->Form->input('portable_media_devices', array('label' => 'Do you use portable media devices?',
                                                                'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('pii_on_portable_media', array('label' => 'Do you have PII or Sensitive Data on any portable media (including USB drives, CDs, DVD, Tablets, etc.)?', 'options' => $choice));                                                        
        echo $this->Form->input('tablets', array('label' => 'Do you use Tablets?', 'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('list_portable_devices', array('label' => 'List the portable media devices you are currently using:'));
    ?>
    </div>

    <div id='tab5' class='tabBox'>
    <?php
        echo $this->Form->input('backup_media', array('label' => 'Do you utilize backup media?', 'options' => $choice, 'empty' => 'Please Select One'));
    ?>
      <div class="backupMediaDetails hidden">
          <?php echo $this->Form->input('backup_media_details', array('label' => 'Please provide us with any additional details regarding your Backup Media')) ?>
      </div>
    </div>

    <div id='tab6' class='tabBox'>
    <?php
        echo $this->Form->input('smartphones', array('label' => 'Do you utilize smartphones?', 'options' => $choice, 'empty' => 'Please Select One'));
        echo $this->Form->input('pii_on_smartphones', array('label' => 'Do you have PII or Sensitive Data on any Smartphones (including emails, text messages, etc)?', 'options' => $choice));
        echo $this->Form->input('list_smartphone_vendors', array('label' => 'List the smartphone vendors and/or phones: '));
    ?>
    </div>

    <div id='tab7' class='tabBox'>
        <p class='highlight'>Please list any systems that contain PII or Sensitive Data.  Keep in mind that PII might be clients, customers, vendors, employees, etc. Systems may include: Billing Systems, Customer Relationship Management, Order Management Systems, Website(s), Network File Shares, Collaborative Systems (Microsoft SharePoint, Google Docs, etc.), Multi-function copy/print/scanners that contain hard drives, Database Systems, Employee / Human Resource Management Systems, Vendor Management Systems, Accounting and Financial Systems, etc.</p>
    <?php
        echo '<h3 class="highlight">System 1</h3>';
        echo $this->Form->input('system_1_name', array('label' => 'System 1 Name: '));
        echo $this->Form->input('system_1_os', array('label' => 'System 1 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_1_vendor', array('label' => 'System 1 Vendor: '));
        echo $this->Form->input('system_1_location', array('label' => 'System 1 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_1_pii', array('label' => 'System 1 # of PII or Sensitive Data Records (estimate):', 'min' => 0, 'class' => 'numwide'));
        echo $this->Form->input('system_1_details', array('label' => 'System 1 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 2</h3>';
        echo $this->Form->input('system_2_name', array('label' => 'System 2 Name: '));
        echo $this->Form->input('system_2_os', array('label' => 'System 2 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_2_vendor', array('label' => 'System 2 Vendor: '));
        echo $this->Form->input('system_2_location', array('label' => 'System 2 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_2_pii', array('label' => 'System 2 # of PII or Sensitive Data Records (estimate):', 'min' => 0, 'class' => 'numwide'));
        echo $this->Form->input('system_2_details', array('label' => 'System 2 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 3</h3>';
        echo $this->Form->input('system_3_name', array('label' => 'System 3 Name: '));
        echo $this->Form->input('system_3_os', array('label' => 'System 3 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_3_vendor', array('label' => 'System 3 Vendor: '));
        echo $this->Form->input('system_3_location', array('label' => 'System 3 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_3_pii', array('label' => 'System 3 # of PII or Sensitive Data Records (estimate):', 'min' => 0, 'class' => 'numwide'));
        echo $this->Form->input('system_3_details', array('label' => 'System 3 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 4</h3>';
        echo $this->Form->input('system_4_name', array('label' => 'System 4 Name: '));
        echo $this->Form->input('system_4_os', array('label' => 'System 4 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_4_vendor', array('label' => 'System 4 Vendor: '));
        echo $this->Form->input('system_4_location', array('label' => 'System 4 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_4_pii', array('label' => 'System 4 # of PII or Sensitive Data Records (estimate):', 'min' => 0, 'class' => 'numwide'));
        echo $this->Form->input('system_4_details', array('label' => 'System 4 - Please provide details of the system (how it is used, who uses it, etc.): '));

        echo '<h3 class="highlight">System 5</h3>';
        echo $this->Form->input('system_5_name', array('label' => 'System 5 Name: '));
        echo $this->Form->input('system_5_os', array('label' => 'System 5 Operating System: ', 'options' => $os, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_5_vendor', array('label' => 'System 5 Vendor: '));
        echo $this->Form->input('system_5_location', array('label' => 'System 5 Location: ', 'options' => $host, 'empty' => 'Please Select One'));
        echo $this->Form->input('system_5_pii', array('label' => 'System 5 # of PII or Sensitive Data Records (estimate):', 'min' => 0, 'class' => 'numwide'));
        echo $this->Form->input('system_5_details', array('label' => 'System 5 - Please provide details of the system (how it is used, who uses it, etc.): '));
    ?>
    </div>
    <div id="tab8" class='tabBox'>
        <p class='highlight'>Please provide any additional information that will help us understand your network/computer environment.</p>
        <ul>
            <li><p class='highlight'>List any additional systems that contain PII.</p></li>
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
<?php echo $this->element('newsFeed'); ?>