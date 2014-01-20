<?php
$data = $org_prof['OrganizationProfile'];

$this->csv->addRow(array('Organization Name', $data['organization_name']));
$this->csv->addRow(array('Location 1 Address 1', $data['address_1']));
$this->csv->addRow(array('Location 1 Address 2', $data['address_2']));
$this->csv->addRow(array('Location 1 City', $data['city']));
$this->csv->addRow(array('Location 1 State', $data['state']));
$this->csv->addRow(array('Location 1 Zip', $data['zip']));
$this->csv->addRow(array('EMR Implemented', $data['emr_ehr_implemented']));
$this->csv->addRow(array('EMR Internal Name', $data['emr_ehr_internal_name']));
$this->csv->addRow(array('# of Servers', $data['number_of_servers']));
$this->csv->addRow(array('# of Laptops', $data['number_laptops']));
$this->csv->addRow(array('Portable Media', $data['portable_media_devices']));
$this->csv->addRow(array('# of Workstations', $data['number_workstations']));
$this->csv->addRow(array('Smartphones', $data['smartphones']));
$this->csv->addRow(array('ephi System1 Name', $data['system_1_name']));
$this->csv->addRow(array('ephi System2 Name', $data['system_2_name']));
$this->csv->addRow(array('ephi System3 Name', $data['system_3_name']));
$this->csv->addRow(array('ephi System4 Name', $data['system_4_name']));
$this->csv->addRow(array('ephi System5 Name', $data['system_5_name']));
$this->csv->addRow(array('PHIServer', $data['phi_on_servers']));
$this->csv->addRow(array('PHILaptop', $data['phi_on_laptops']));
$this->csv->addRow(array('PHIPortableMedia', $data['phi_on_portable_media']));
$this->csv->addRow(array('PHIEmail', $data['phi_on_email']));
$this->csv->addRow(array('PHIWorkstations', $data['phi_on_workstations']));
$this->csv->addRow(array('PHISmartphones', $data['phi_on_smartphones']));

echo $this->csv->render('organization_profile.csv');

?>