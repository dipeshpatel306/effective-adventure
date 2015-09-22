<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Contracts & Documents');
$group = $this->Session->read('Auth.User.group_id'); 
$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="dashboard index">
	<h2><?php echo __('Contracts & Documents'); ?></h2>
	<?php 
		$ra_docs_name = Configure::read('Theme.ra_docs_name');
		// Risk Assessment Documents. If user deny
		if ($acct == 'Training') {
		    $ra_ba_btn = 'subscribers';
		} elseif ($group == Group::USER) {
			$ra_ba_btn = 'no_auth';
		} else {
			$ra_ba_btn = 'approved';		
		}

		echo $this->element('tile', array(
			'img' => array('file' => 'ra_tile.jpg', 'alt' => $ra_docs_name),
			'heading' => $ra_docs_name,
			'text' => $ra_docs_name,
			'button' => $ra_ba_btn,
			'link' => ($ra_ba_btn == 'aproved' ? array('controller' => 'risk_assessment_documents' , 'action' => 'index') : array('action' => 'contracts_and_documents')) 
		));
		
		$baa_name = Configure::read('Theme.baa_name');
		$baa_link_name = Configure::read('Theme.baa_link_name');
		echo $this->element('tile', array(
			'img' => array('file' => 'ba_tile.jpg', 'alt' => $baa_name),
			'heading' => $baa_name,
			'text' => $baa_name,
			'button' => $ra_ba_btn,
			'link' => ($ra_ba_btn == 'approved' ? array('controller' => $baa_link_name, 'action' => 'index') : array('action' => 'contracts_and_documents'))
		));
				
		// Disaster Recovery Plans. Only Sub Manager can use. Sub User is not authorized. MU is banned
		if ($acct == 'Meaningful Use' || $acct == 'Training') {
			$drp_ocnd_btn = 'subscribers';
		} elseif ($group == Group::USER) {
			$drp_ocnd_btn = 'no_auth';
		} else {
			$drp_ocnd_btn = 'approved';
		}
		
		echo $this->element('tile', array(
			'img' => array('file' => 'dr_tile.bmp', 'alt' => 'HIPAA Disaster Recovery Plan'),
			'heading' => 'Disaster Recovery Plans',
			'text' => 'Disaster Recovery Plans',
			'button' => $drp_ocnd_btn,
			'link' => ($drp_ocnd_btn == 'approved' ? array('controller' => 'disaster_recovery_plans', 'action' => 'index') : array('action' => 'contracts_and_documents'))
		));
		
		echo $this->element('tile', array(
			'img' => array('file' => 'ocnd_tile.jpg', 'alt' => 'HIPAA Other Contracts & Documents'),
			'heading' => 'Other Contracts & Documents',
			'text' => 'Other Contracts & Documents',
			'button' => $drp_ocnd_btn,
			'link' => ($drp_ocnd_btn == 'approved' ? array('controller' => 'other_contracts_and_documents', 'action' => 'index') : array('action' => 'contracts_and_documents'))
		));

        if (($group == Group::ADMIN) || (($acct == 'Meaningful Use' || $acct == 'Subscription') && $group == Group::MANAGER)) {
            echo $this->element('tile', array(
				'img' => array('file' => 'templates_tile.png', 'alt' => 'Templates'),
				'heading' => 'Templates',
				'text' => 'Templates',
				'button' => 'approved',
				'link' => array('controller' => 'templates', 'action' => 'index')
			));
        }
	?>

</div>
<div class="actions newsFeed">
	<?php echo $this->element('quickLinks'); ?>
</div>
