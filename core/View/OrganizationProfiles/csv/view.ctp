<?php
$data = $organizationProfile['OrganizationProfile'];

$this->csv->addRow(
    array('Organization Name', 'Location 1 Address 1', 'Location 1 Address 2',
            'Location 1 City', 'Location 1 State', 'Location 1 Zip', 'EMR Implemented',
            'EMR Internal Name', 'Email Implemented', '# of Servers', '# of Laptops',
            'Portable Media', '# of Workstations', 'Smartphones', 'ephi System1 Name',
            'ephi System2 Name', 'ephi System3 Name', 'ephi System4 Name', 
            'ephi System5 Name', 'PHIServer', 'PHILaptop', 'PHIPortableMedia', 
            'PHIEmail', 'PHIWorkstations', 'PHISmartphones'));
            
$this->csv->addRow(
    array($organizationProfile['Client']['name'], $data['address_1'], $data['address_2'],
            $data['city'], $data['state'], $data['zip'], $data['emr_ehr_implemented'],
            $data['emr_ehr_internal_name'], $data['email'], $data['number_of_servers'], 
            $data['number_laptops'], $data['portable_media_devices'], 
            $data['number_workstations'], $data['smartphones'], 
            $data['system_1_name'], $data['system_2_name'], $data['system_3_name'],
            $data['system_4_name'], $data['system_5_name'], $data['phi_on_servers'],
            $data['phi_on_laptops'], $data['phi_on_portable_media'], $data['phi_on_email'],
            $data['phi_on_workstations'], $data['phi_on_smartphones']));

echo $this->csv->render('organization_profile.csv');

?>