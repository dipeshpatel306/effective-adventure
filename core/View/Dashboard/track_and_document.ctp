<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Track & Document');
$group = $this->Session->read('Auth.User.group_id'); 
$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="dashboard index">
	<h2><?php echo __('Track & Document'); ?></h2>
	<?php
		if ($acct == 'AYCE Training') {
			echo $this->element('video_overlay');
			echo $this->element('tile', array(
				'img' => array('file' => 'opnp_tile.jpg', 'alt' => 'Learn More Tracking'),
				'heading' => 'Tracking Overview Video',
				'text' => 'Learn More About Tracking',
				'link' => array('video' => 'trackingOverview')
			));
		}
		
		$nolink = array('controller' => 'track_and_document');
		// Security Incidents
		if ($acct == 'Training') {
			$si_btn = 'subscribers';
			$si_link = $nolink;
		} else {
			$si_btn = 'approved';
			$si_link = array('controller' => 'security_incidents', 'action' => 'index');
		}
		
		echo $this->element('tile', array(
			'img' => array('file' => 'si_tile.png', 'alt' => 'Security Incidents'),
			'heading' => 'Security Incidents',
			'text' => 'Security Incidents',
			'button' => $si_btn,
			'link' => $si_link
		));
		
		if ($acct == 'Meaningful Use' || $acct == 'Training') {
			$sra_ephi_btn = 'subscribers';
			$sra_link = $nolink;
			$ephi_rem_link = $nolink;
			$ephi_rec_link = $nolink;
		} elseif ($group == Group::USER) {
			$sra_ephi_btn = 'no_auth';
			$sra_link = $nolink;
			$ephi_rem_link = $nolink;
			$ephi_rec_link = $nolink;
		} else {
			$sra_ephi_btn = 'approved';
			$sra_link = array('controller' => 'server_room_access', 'action' => 'index');
			$ephi_rem_link = array('controller' => 'ehpi_removed', 'action' => 'index');
			$ephi_rec_link = array('controller' => 'ephi_recieved', 'action' => 'index');	
		}
        
		echo $this->element('tile', array(
			'img' => array('file' => 'sra_tile.jpg', 'alt' => 'Server Room Access'),
			'heading' => 'Server Room Access',
			'text' => 'Server Room Access',
			'button' => $sra_ephi_btn,
			'link' => $sra_link
		));
		
		if (Configure::read('Theme.display_ephi')) {
			echo $this->element('tile', array(
				'img' => array('file' => 'ephirem_tile.jpg', 'alt' => 'ePHI Removed'),
				'heading' => 'ePHI Removed',
				'text' => 'ePHI Removed',
				'button' => $sra_ephi_btn,
				'link' => $ephi_rem_link
			));
			echo $this->element('tile', array(
				'img' => array('file' => 'ephirec_tile.png', 'alt' => 'ePHI Received'),
				'heading' => 'ePHI Received',
				'text' => 'ePHI Received',
				'button' => $sra_ephi_btn,
				'link' => $ephi_rec_link
			));
		}		
	?>
</div>
<div class="actions newsFeed">
	<?php echo $this->element('quickLinks'); ?>
</div>
