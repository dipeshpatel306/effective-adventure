<?php
//$this->Html->addCrumb('Organization Profiles', '/organization_profiles');
$this->Html->addCrumb('View Organization Profile - ' . $organizationProfile['Client']['name']);

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="organizationProfiles view">
<h2><?php  echo __('Organization Profile'); ?></h2>
    <h3>Name and Location</h3>
	<dl>
	    <dt>Client</dt>
	    <dd><?php echo ($organizationProfile['Client']['name']); ?>&nbsp;</dd>
	    
	    <dt>Industry</dt>
	    <dd><?php echo ($organizationProfile['OrganizationProfile']['industry']); ?>&nbsp;</dd>
	    	
	    <dt>Administrator Name</dt>
	    <dd><?php echo ($organizationProfile['OrganizationProfile']['administrator_name']); ?>&nbsp;</dd>
	    
	    <dt>Administrator Email</dt>
	    <dd><?php echo ($organizationProfile['OrganizationProfile']['administrator_email']); ?>&nbsp;</dd>
        
        <dt>Administrator Phone (Primary Contact)</dt>
        <dd>
            <?php

                if(!empty($organizationProfile['OrganizationProfile']['administrator_phone_ext'])){
                    $ext = ' ext. ' . $organizationProfile['OrganizationProfile']['administrator_phone_ext'];
                } else {
                $ext = '';
                }
            echo ($organizationProfile['OrganizationProfile']['administrator_phone'] . $ext); ?>
            &nbsp;
        </dd>
        
        <dt>Administrator Phone (Alternative)</dt>
        <dd>
            <?php
                if(!empty($organizationProfile['OrganizationProfile']['administrator_phone_alt_ext'])){
                    $altExt = ' ext. ' . $organizationProfile['OrganizationProfile']['administrator_phone_alt_ext'];
                } else {
                $altExt = '';
                }
            echo ($organizationProfile['OrganizationProfile']['administrator_phone_alt']) . $altExt; ?>
            &nbsp;
        </dd>
        
        <dt>Address 1</dt>
        <dd><?php echo ($organizationProfile['OrganizationProfile']['address_1']); ?>&nbsp;</dd>
        
        <dt>Address 2</dt>
        <dd><?php echo ($organizationProfile['OrganizationProfile']['address_2']); ?>&nbsp;</dd>
        
        <dt>City</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['city']); ?>
            &nbsp;
        </dd>
        
        <dt>State</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['state']); ?>
            &nbsp;
        </dd>
        
        <dt>Zip</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['zip']); ?>
            &nbsp;
        </dd>
        
        <dt>Number of Employees</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['number_employees']); ?>
            &nbsp;
        </dd>

		<?php if ($organizationProfile['OrganizationProfile']['second_location'] == 'Yes'): ?>
		<br /> <h4 class='strong'>Second Location</h4>   
		<dt>Address 1</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['second_address_1']); ?>
			&nbsp;
		</dd>
		
		<dt>Address 2</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['second_address_2']); ?>
			&nbsp;
		</dd>
		
		<dt>City</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['second_city']); ?>
			&nbsp;
		</dd>
		
		<dt>State</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['second_state']); ?>
			&nbsp;
		</dd>
		
		<dt>Zip</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['second_zip']); ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		
		<?php if ($organizationProfile['OrganizationProfile']['third_location'] == 'Yes'): ?>
        <br /><h4 class='strong'>Third Location</h4> 
        <dt>Address 1</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['third_address_1']); ?>
            &nbsp;
        </dd>
        
        <dt>Address 2</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['third_address_2']); ?>
            &nbsp;
        </dd>
        
        <dt>City</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['third_city']); ?>
            &nbsp;
        </dd>
        
        <dt>State</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['third_state']); ?>
            &nbsp;
        </dd>
        
        <dt>Zip</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['third_zip']); ?>
            &nbsp;
        </dd>
        <?php endif; ?>
        
        <?php if ($organizationProfile['OrganizationProfile']['fourth_location'] == 'Yes'): ?>
        <br /><h4 class='strong'>Fourth Location</h4>
        <dt>Address 1</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fourth_address_1']); ?>
            &nbsp;
        </dd>
        
        <dt>Address 2</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fourth_address_2']); ?>
            &nbsp;
        </dd>
        
        <dt>City</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fourth_city']); ?>
            &nbsp;
        </dd>
        
        <dt>State</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fourth_state']); ?>
            &nbsp;
        </dd>
        
        <dt>Zip</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fourth_zip']); ?>
            &nbsp;
        </dd>
        <?php endif; ?>
        
        <?php if ($organizationProfile['OrganizationProfile']['fifth_location'] == 'Yes'): ?>
        <br /><h4 class='strong'>Fifth Location</h4>
        <dt>Address 1</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fifth_address_1']); ?>
            &nbsp;
        </dd>
        
        <dt>Address 2</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fifth_address_2']); ?>
            &nbsp;
        </dd>
        
        <dt>City</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fifth_city']); ?>
            &nbsp;
        </dd>
        
        <dt>State</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fifth_state']); ?>
            &nbsp;
        </dd>
        
        <dt>Zip</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['fifth_zip']); ?>
            &nbsp;
        </dd>
        <?php endif; ?>
   
		<br /><h3>Network</h3>
		<dt>Number of Servers</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['number_of_servers']); ?>
			&nbsp;
		</dd>
		
		<dt>Network Operating System</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['network_operating_system']); ?>
			&nbsp;
		</dd>
		
		<dt>Network Details</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['network_details']); ?>
			&nbsp;
		</dd>
		
		<dt>Number of Workstations</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['number_workstations']); ?>
			&nbsp;
		</dd>
		
		<dt>Number of Laptops</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['number_laptops']); ?>
			&nbsp;
		</dd>
		
		<dt>Workstation/Laptop Operating System</dt>
		<dd>
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
		</dd>
		
		<br /><h3>Email</h3>
		
		<dt>Email</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['email']); ?>
			&nbsp;
		</dd>
		
		<dt>Email Vendor</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['email_vendor']); ?>
			&nbsp;
		</dd>
		
		<dt>Email Vendor Details</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['email_vendor_details']); ?>
			&nbsp;
		</dd>
		
		<dt>Email Vendor Other</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['email_vendor_other']); ?>
			&nbsp;
		</dd>
		
		<dt>Email Server Location</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['email_server_location']); ?>
			&nbsp;
		</dd>
		
		<dt>Additional Email Details</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['email_details']); ?>
			&nbsp;
		</dd>
		
		<br /><h3>Portable Media</h3>
		<dt>Portable Media</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['portable_media_devices']); ?>
			&nbsp;
		</dd>
		
		<dt>Tablets</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['tablets']); ?>
			&nbsp;
		</dd>
		
		<dt>Portable Media Devices</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['list_portable_devices']); ?>
			&nbsp;
		</dd>
		
		<br /><h3>Backup Media</h3>
		<dt>Backup Tapes</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['backup_media']); ?>
			&nbsp;
		</dd>
		
		<br /><h3>Smartphones</h3>
		<dt>Smartphones</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['smartphones']); ?>
			&nbsp;
		</dd>
		
		<dt>Smartphone Vendors</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['list_smartphone_vendors']); ?>
			&nbsp;
		</dd>
		
		<?php if ($organizationProfile['OrganizationProfile']['system_1_name']): ?>
		<br /><h3>Additional Systems</h3>
		
		<br /><h4>System 1</h4>
		<dt>Name</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_name']); ?>
			&nbsp;
		</dd>
		
		<dt>Operating System</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_os']); ?>
			&nbsp;
		</dd>
		
		<dt>Vendor</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_vendor']); ?>
			&nbsp;
		</dd>
		
		<dt>Location</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_location']); ?>
			&nbsp;
		</dd>
		
		<dt>Number of PII Records</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_pii']); ?>
			&nbsp;
		</dd>
		
		<dt>System Details</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['system_1_details']); ?>
			&nbsp;
		</dd>
		
		<?php if ($organizationProfile['OrganizationProfile']['system_2_name']): ?>
        <br /><h4>System 2</h4>
        <dt>Name</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_2_name']); ?>
            &nbsp;
        </dd>
        
        <dt>Operating System</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_2_os']); ?>
            &nbsp;
        </dd>
        
        <dt>Vendor</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_2_vendor']); ?>
            &nbsp;
        </dd>
        
        <dt>Location</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_2_location']); ?>
            &nbsp;
        </dd>
        
        <dt>Number of PII Records</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_2_pii']); ?>
            &nbsp;
        </dd>
        
        <dt>System Details</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_2_details']); ?>
            &nbsp;
        </dd>
        <?php endif; ?>
        
        <?php if ($organizationProfile['OrganizationProfile']['system_3_name']): ?>
        <br /><h4>System 3</h4>
        <dt>Name</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_3_name']); ?>
            &nbsp;
        </dd>
        
        <dt>Operating System</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_3_os']); ?>
            &nbsp;
        </dd>
        
        <dt>Vendor</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_3_vendor']); ?>
            &nbsp;
        </dd>
        
        <dt>Location</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_3_location']); ?>
            &nbsp;
        </dd>
        
        <dt>Number of PII Records</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_3_pii']); ?>
            &nbsp;
        </dd>
        
        <dt>System Details</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_3_details']); ?>
            &nbsp;
        </dd>
        <?php endif; ?>
        
        <?php if ($organizationProfile['OrganizationProfile']['system_4_name']): ?>
        <br /><h4>System 4</h4>
        <dt>Name</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_4_name']); ?>
            &nbsp;
        </dd>
        
        <dt>Operating System</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_4_os']); ?>
            &nbsp;
        </dd>
        
        <dt>Vendor</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_4_vendor']); ?>
            &nbsp;
        </dd>
        
        <dt>Location</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_4_location']); ?>
            &nbsp;
        </dd>
        
        <dt>Number of PII Records</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_4_pii']); ?>
            &nbsp;
        </dd>
        
        <dt>System Details</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_4_details']); ?>
            &nbsp;
        </dd>
        <?php endif; ?>
        
        <?php if ($organizationProfile['OrganizationProfile']['system_5_name']): ?>
        <br /><h4>System 5</h4>
        <dt>Name</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_5_name']); ?>
            &nbsp;
        </dd>
        
        <dt>Operating System</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_5_os']); ?>
            &nbsp;
        </dd>
        
        <dt>Vendor</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_5_vendor']); ?>
            &nbsp;
        </dd>
        
        <dt>Location</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_5_location']); ?>
            &nbsp;
        </dd>
        
        <dt>Number of PII Records</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_5_pii']); ?>
            &nbsp;
        </dd>
        
        <dt>System Details</dt>
        <dd>
            <?php echo ($organizationProfile['OrganizationProfile']['system_5_details']); ?>
            &nbsp;
        </dd>
        <?php endif; ?>
        <?php endif; ?>
        
        <br /><h3>Additional Information</h3>
		<dt>Additional Info</dt>
		<dd>
			<?php echo ($organizationProfile['OrganizationProfile']['additional_info']); ?>
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
        <li><?php echo $this->Html->link(__('Export Organization Profile CSV'), array('action' => 'view', $organizationProfile['OrganizationProfile']['id'], 'ext' => 'csv')); ?></li>
        <li><a href="javascript:if(window.print)window.print()">Print Organization Profile</a></li>
		<?php endif; ?>
	</ul>
</div>
