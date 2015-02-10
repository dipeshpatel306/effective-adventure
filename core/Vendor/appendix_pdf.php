<?php
ini_set('date.timezone', 'America/New_York');
require_once(dirname(__file__) . DS . 'fpdf' . DS . 'fpdf.php');

class AppendixPDF extends FPDF {
	public $margin = 15;
	
	function _decode($str) {
		return utf8_decode($str);
	}
	
	public function Header() {
		$this->SetFont('Arial', '', 9);
		$this->SetX(-65);
		$this->Cell(0, 14, 'HIPAA Security Risk Assessment');
	}
	
	public function Footer() {
		if ($this->PageNo() == 1) return;
		$this->SetXY(8, -15);
		$this->SetFont('Arial', '', 10);
		$this->SetTextColor(255, 0, 0);
		$this->Cell(0, 14, 'Page | ' . $this->PageNo());
	}
	
	function logoFooter() {
		$this->SetXY(15, -35);
		$this->SetFont('Arial', '', 9);
		$this->SetTextColor(128);
		$str = "Copyright &copy; " . date('Y') . " HIPAA Secure Now! All Rights Reserved";
		$str = iconv('UTF-8', 'windows-1252', html_entity_decode($str));
		$this->Cell(120, 14, $str);
		$this->Image(IMAGES . 'hipaa_logo.png', null, null, 0, 14);
		$this->SetTextColor(0);
	}
	
	public function TitlePage($client) {
		$this->AddPage();
		$yPos = 70;
		
		$this->SetY($yPos);
		$this->SetFont('Arial', '', 18);
		$this->Cell(0, 20, 'Appendix A', 0, 0, 'C');
		$yPos += 50;
		
		$this->SetY($yPos);
		$this->SetFont('Arial', 'BI', 17);
		$this->Cell(0, 20, $this->_decode($client['Client']['name']), 0, 0, 'C');
		$yPos += 45;
		
		$this->SetY($yPos);
		$this->SetFont('Arial', 'BU', 17);
		$this->Cell(0, 20, 'Risk Assessment Supporting Information', 0, 0, 'C');
		
		$this->logoFooter();
	}

	public function SectionTitlePage($section, $title) {
		$this->AddPage();
		$this->SetXY(20, 20);
		$this->SetFont('Arial', '', 10);
		$this->Cell(0, 14, 'Section 1.' . (string) $section);
		
		$this->SetY(130);
		$this->SetFont('Arial', 'B', 18);
		$this->Cell(0, 20, $title, 0, 0, 'C');
		
		$this->logoFooter();
	}

	function _locationFields($num=0) {
		$prefixes = array('', '');
		switch ($num) {
			case 1:
				$prefix = '';
			case 2:
				$prefix = 'second_';
			case 3:
				$prefix = 'third_';
			case 4:
				$prefix = 'fourth_';
			case 5:
				$prefix = 'fifth_';
		}
		return array(
			array($prefix . 'address_1', 'Address 1'),
			array($prefix . 'address_2', 'Address 2'),
			array($prefix . 'city', 'City'),
			array($prefix . 'state', 'State'),
			array($prefix . 'zip', 'Zip')	
		);
	}
	
	function _systemFields($num) {
		$num = (string) $num;
		return array(
			array('system_' . $num . '_name', 'Name'),
			array('system_' . $num . '_os', 'Operating System'),
			array('system_' . $num . '_vendor', 'Vendor'),
			array('system_' . $num . '_location', 'Location'),
			array('system_' . $num . '_ephi', 'Number of ePHI Records'),
			array('system_' . $num . '_details', 'System Details'),
			array('system_' . $num . '_ephi', 'Number of ePHI Records')
		);
	}
	
	function _getPhoneWithExt($orgProfile, $col_name) {
		$value = $this->_getFieldValue($orgProfile, $col_name);
		$ext = $this->_getFieldValue($orgProfile, $col_name . '_ext');
		if ($ext) {
			$value .= ' ext. ' . $ext;
		}
		return $value;
	}
	
	function _getWSOS($orgProfile, $col_name) {
		//TODO : shouldn't hardcode here
		$os_names = array(
			'os_win8' => 'Windows 8',
			'os_win7' => 'Windows 7',
			'os_winvista' => 'Windows Vista',
			'os_winxp' => 'Windows XP',
			'os_winold' => 'Older Windows (ME, 2000, NT)',
			'os_mac' => 'Apple/MAC' 
		);
		
		$values = array();
		foreach ($os_names as $col_name => $label) {
			if ($orgProfile['OrganizationProfile'][$col_name]) {
				$values[] = $label;
			}
		}
		return implode(', ', $values);
	}
	
	function _getFieldValue($orgProfile, $col_name) {
		$col_name_exp = explode('.', $col_name);
		if (count($col_name_exp) > 1) {
			$value = $orgProfile[$col_name_exp[0]][$col_name_exp[1]];
		} else {
			$value = $orgProfile['OrganizationProfile'][$col_name];
		}
		return $value;
	}
	
	function _orgProfileTable($orgProfile, $title, $fields, $subtitle=null) {
		if ($this->GetY() > 250) {
			$this->AddPage();
			$this->SetY(25);
		}
		
		if ($title) {
			$this->SetFont('Arial', 'B', 12);
			$this->Cell(0, 15, $title, 0, 2);
		}
		
		if ($subtitle) {
			$this->SetFont('Arial', 'B', 10);
			$this->Cell(0, 12, $subtitle, 0, 2);
		}
		
		$this->SetFillColor(224,235,255);
		$this->SetFont('Arial', '', 10);

		$row_count = 0;
		$num_rows = count($fields);
		foreach ($fields as $field_params) {
			if (isset($field_params[2])) {
				$value_fn = $field_params[2]; 
				$value = $this->$value_fn($orgProfile, $field_params[0]);
			} else {
				$value = $this->_getFieldValue($orgProfile, $field_params[0]);
			}
			if ($row_count == 0) {
				if ($num_rows == 1) {
					$borders = 'LRTB';
				} else {
					$borders = 'LRT';
				}
			} elseif ($row_count == $num_rows-1) {
				$borders = 'LRB';
			} else {
				$borders = 'LR';
			}
			$fill = (($row_count % 2) != 0);
			$this->_tableRow(6, array(80, 100), array($field_params[1], $this->_decode($value)), $borders, array('L', 'L'), $fill);
			$row_count += 1;
		}		
	}

	public function OrgProfile($orgProfile) {
		$this->SectionTitlePage(1, 'Organization Info');
		$this->AddPage();
		$this->SetY(25);

		$name_loc_fields = array(
			array('Client.name', 'Name'),
			array('administrator_name', 'Administrator Name'),
			array('administrator_email', 'Administrator Email'),
			array('administrator_phone', 'Administrator Phone (Primary Contact)', '_getPhoneWithExt'),
			array('administrator_phone_alt', 'Administrator Phone (Alternate)', '_getPhoneWithExt'),
			array('address_1', 'Address 1'),
			array('address_2', 'Address 2'),
			array('city', 'City'),
			array('state', 'State'),
			array('zip', 'Zip'),
			array('number_employees', 'Number of Employees'),
		);
		$this->_orgProfileTable($orgProfile, 'Name and Location', $name_loc_fields);
		
		if ($orgProfile['OrganizationProfile']['second_location'] == 'Yes') {
			$this->_orgProfileTable($orgProfile, 'Second Location', $this->_locationFields(2));
		}
		
		if ($orgProfile['OrganizationProfile']['third_location'] == 'Yes') {
			$this->_orgProfileTable($orgProfile, 'Third Location', $this->_locationFields(3));
		}
		
		if ($orgProfile['OrganizationProfile']['fourth_location'] == 'Yes') {
			$this->_orgProfileTable($orgProfile, 'Fourth Location', $this->_locationFields(4));
		}
		
		if ($orgProfile['OrganizationProfile']['fifth_location'] == 'Yes') {
			$this->_orgProfileTable($orgProfile, 'Fifth Location', $this->_locationFields(5));
		}
		
		$network_fields = array(
			array('number_of_servers', 'Number of Servers'),
			array('network_operating_system', 'Network Operating System'),
			array('network_details', 'Network Details'),
			array('number_workstations', 'Number of Workstations'),
			array('number_laptops', 'Number of Laptops'),
			array(null, 'Workstation/Laptop Operating System', '_getWSOS')
		);
		$this->_orgProfileTable($orgProfile, 'Network', $network_fields);
		
		$emr_ehr_fields = array(
			array('emr_ehr_implemented', 'EMR/EHR Implemented'),
			array('emr_ehr_vendor', 'EMR/EHR Vendor'),
			array('emr_ehr_internal_name', 'EMR/EHR Internal Name'),
			array('emr_ehr_os', 'EMR/EHR Operating System'),
			array('emr_ehr_details', 'EMR/EHR Details'),
			array('emr_ehr_description', 'EMR/EHR Location Description')
		);
		$this->_orgProfileTable($orgProfile, 'EMR/EHR', $emr_ehr_fields);
		
		$email_fields = array(
			array('email', 'Email'),
			array('email_vendor', 'Email Vendor'),
			array('email_vendor_details', 'Email Vendor Details'),
			array('email_vendor_other', 'Email Vendor Other'),
			array('email_server_location', 'Email Server Location'),
			array('email_details', 'Additional Email Details')
		);
		$this->_orgProfileTable($orgProfile, 'Email', $email_fields);

		$portable_media_fields = array(
			array('portable_media_devices', 'Portable Media'),
			array('tablets', 'Tablets'),
			array('list_portable_devices', 'Portable Media Devices')
		);
		$this->_orgProfileTable($orgProfile, 'Portable Media', $portable_media_fields);
		
		$this->_orgProfileTable($orgProfile, 'Backup Media', array(array('backup_media', 'Backup Tapes')));
		
		$smartphone_fields = array(
			array('smartphones', 'Smartphones'),
			array('list_smartphone_vendors', 'Smartphone Vendors')
		);
		$this->_orgProfileTable($orgProfile, 'Smartphones', $smartphone_fields);
		
		$this->_orgProfileTable($orgProfile, 'Additional Systems', array());
		foreach (array(1,2,3,4,5) as $num) {
			if ($orgProfile['OrganizationProfile']['system_' . (string) $num . '_name']) {
				$this->_orgProfileTable($orgProfile, null, $this->_systemFields($num), 'System ' . (string) $num);
			}
		}

		$this->_orgProfileTable($orgProfile, 'Additional Information', array(array('additional_info', 'Additional Info')));
	}
	
	function _tableRow($lh, $w, $data, $border, $align, $fill=false) {
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
		    $nb=max($nb,$this->_nbLines($w[$i],$data[$i]));
		$h=$lh*$nb;
		
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
         	$this->AddPage();
			$this->SetY(35);
		}
		
		//Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
	        $ww=$w[$i];
	        //Save the current position
	        $x=$this->GetX();
	        $y=$this->GetY();
	        //Draw the border
	        if ($fill) {
	        	$style = 'DF';
	        } else {
	        	$style = 'D';
	        }
	        $this->Rect($x, $y, $ww, $h, $style);
	        //Print the text
	        $this->MultiCell($ww,$lh,$data[$i],0,$align[$i]);
	        //Put the position to the right of the cell
	        $this->SetXY($x+$ww,$y);
	    }
	    //Go to the next line
	    $this->Ln($h);
	}
	
	function _nbLines($w, $txt) {
		//Computes the number of lines a MultiCell of width w will take
	    $cw=&$this->CurrentFont['cw'];
	    if($w==0)
	        $w=$this->w-$this->rMargin-$this->x;
	    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	    $s=str_replace("\r",'',$txt);
	    $nb=strlen($s);
	    if($nb>0 and $s[$nb-1]=="\n")
	        $nb--;
	    $sep=-1;
	    $i=0;
	    $j=0;
	    $l=0;
	    $nl=1;
	    while($i<$nb)
	    {
	        $c=$s[$i];
	        if($c=="\n")
	        {
	            $i++;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	            continue;
	        }
	        if($c==' ')
	            $sep=$i;
	        $l+=$cw[$c];
	        if($l>$wmax)
	        {
	            if($sep==-1)
	            {
	                if($i==$j)
	                    $i++;
	            }
	            else
	                $i=$sep+1;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	        }
	        else
	            $i++;
	    }
	    return $nl;
	}
	
	public function RiskAssessmentAnswers($answers, $questions) {
		$this->SectionTitlePage(2, 'Risk Assessment Questions / Answers');
		$this->AddPage();
		$this->SetY(35);
		
		$this->SetFont('Arial', '', 9);
		
		$w = array(20, 25, 38, 72, 25);
		$headers = array('Question #', 'Question', 'Description', 'HIPAA Related Info', 'Control Implemented');
		$header_align = array('C', 'C', 'C', 'C', 'C');
		$this->_tableRow(6, $w, $headers, 1, $header_align);
	
		$this->SetFont('Arial', '', 7);
		$align = array('C', 'L', 'L', 'L', 'C');
		
		foreach ($questions as $question) {
			$data = array(
				$question['RiskAssessmentQuestions']['category_question_number'],
				$question['RiskAssessmentQuestions']['question'],
				$question['RiskAssessmentQuestions']['how_to_answer_question'] . "\n",
				$question['RiskAssessmentQuestions']['additional_information'] . "\n",
				$answers['RiskAssessment']['question_'.((string)($question['RiskAssessmentQuestions']['question_number']))]
			);
			$data = array_map(function($val) { return $this->_decode($val); }, $data);
			$this->_tableRow(4, $w, $data, 1, $align);				
		}
	}
	
	public function Create($client, $orgProfile, $riskAssessment, $raQuestions) {
		$this->AliasNbPages();
		$this->SetMargins($this->margin, $this->margin, $this->margin);
		$this->TitlePage($client);
		$this->OrgProfile($orgProfile);
		$this->RiskAssessmentAnswers($riskAssessment, $raQuestions);
		$this->Output($client['Client']['name'] . ' Appendix ' . date('Y') . '.pdf', 'I');
	}
}

?>