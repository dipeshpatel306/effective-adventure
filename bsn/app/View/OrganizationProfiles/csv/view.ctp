<?php
$data = $organizationProfile['OrganizationProfile'];

$this->csv->addRow(
    array('Organization Name', 'Industry', 'Location 1 Address 1', 'Location 1 Address 2',
            'Location 1 City', 'Location 1 State', 'Location 1 Zip',
            'Email Implemented', '# of Servers', '# of Laptops',
            'Portable Media', '# of Workstations', 'Smartphones', 'pii System1 Name',
            'pii System2 Name', 'pii System3 Name', 'pii System4 Name', 
            'pii System5 Name', 'PIIServer', 'PIILaptop', 'PIIPortableMedia', 
            'PIIEmail', 'PIIWorkstations', 'PIISmartphones'));
            
$this->csv->addRow(
    array($organizationProfile['Client']['name'], $data['industry'], $data['address_1'], $data['address_2'],
            $data['city'], $data['state'], $data['zip'],
            $data['email'], $data['number_of_servers'], 
            $data['number_laptops'], $data['portable_media_devices'], 
            $data['number_workstations'], $data['smartphones'], 
            $data['system_1_name'], $data['system_2_name'], $data['system_3_name'],
            $data['system_4_name'], $data['system_5_name'], $data['pii_on_servers'],
            $data['pii_on_laptops'], $data['pii_on_portable_media'], $data['pii_on_email'],
            $data['pii_on_workstations'], $data['pii_on_smartphones']));

echo $this->csv->render('organization_profile.csv');

?>