<?php
App::uses('Group', 'Model');
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="dashboard index">
	<h2><?php echo Configure::read('Theme.dashboard_name'); ?></h2>
	<?php
		if ($group == Group::MANAGER && $acct == 'AYCE Training') {
			$show = $displayIntro['User']['display_intro_video_real'] ? '1' : '0';
			$form = $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'edit', $displayIntro['User']['id'])));
			$form .= $this->Form->input('User.display_intro_video',
										array('label' => 'Do not show again',
											  'checked' => !$displayIntro['User']['display_intro_video']));
			$form .= $this->Form->end();
			echo "<div id='introvideo' show='$show'>";
			echo $this->element('video_overlay', compact('form'));
			echo "</div>";
		}
		
		$ed_center_tile = $this->element('tile', array(
			'img' => array('file' => 'edcenter.png', 'alt' => 'Education Center'),
			'heading' => 'Education Center',
			'text' => 'Videos and Training',
			'link' => array('controller' => 'education_center', 'action' => 'index'),
		));
		
		if ($group == Group::USER && $acct == 'AYCE Training') {
			echo $ed_center_tile;
		}
	
		// policies & procedures. everyone sees this
		echo $this->element('tile', array(
			'img' => array('file' => 'pnp_tile.jpg', 'alt' => 'Policies & Procedures'),
			'heading' => 'Policies & Procedures',
			'text' => 'Policies and Procedures',
			'link' => array('action' => 'policies_and_procedures'),
		));

		// contracts and documents. managers see this. Users do not
		$ra_name = Configure::read('Theme.ra_name');
		$baa_entity_name = Configure::read('Theme.baa_entity_name');
		if ($group == Group::USER) {
			if ($acct == 'Training') {
				$cnd_btn = 'approved';
			} elseif ($acct == 'AYCE Training') {
				$cnd_btn = null;
			} else {
				$cnd_btn = 'no_auth';
			}
		} else {
			$cnd_btn = 'approved';
		}

		if (!is_null($cnd_btn)) {
			echo $this->element('tile', array(
				'img' => array('file' => 'cnd_tile.jpg', 'alt' => 'Contracts and Documents'),
				'heading' => 'Contracts & Documents',
				'text' => $ra_name . ', ' . $baa_entity_name . ', Disaster Recovery',
				'link' => array('action' => ($cnd_btn === 'approved' ? 'contracts_and_documents' : 'index')),
				'button' => $cnd_btn
			));
		}
		
		// Track and Document
		if (Configure::read('Theme.display_ephi')) {
			$td_title = 'Security Incidents and ePHI Received and Removed';
		} else {
			$td_title = 'Security Incidents and Server Room Access';
		}
		
		if (!($group == Group::USER && $acct == 'AYCE Training')) {
			echo $this->element('tile', array(
				'img' => array('file' => 'tnd_tile.jpg', 'alt' => 'Track and Document'),
				'heading' => 'Track and Document',
				'text' => $td_title,
				'link' => array('action' => 'track_and_document'),
				'button' => 'approved'
			));
		}
		
		if (!($group == Group::USER && $acct == 'AYCE Training')) {
			echo $ed_center_tile;
		}

		if (Configure::read('Theme.display_social_center')) {
			// Social Center Every one sees
			echo $this->element('tile', array(
				'img' => array('file' => 'social.png', 'alt' => 'Social Center'),
				'heading' => 'Social Center',
				'text' => 'Facebook and Twitter',
				'link' => array('action' => 'social_center'),
			));
		}

		if (Configure::read('Theme.display_information_center')) {
			// Information Center. Everyone sees
			echo $this->element('tile', array(
				'img' => array('file' => 'infocenter.png', 'alt' => 'HIPAA Information Center'),
				'heading' => 'Information Center',
				'text' => 'Articles and Blog',
				'link' => array('action' => 'information_center')
			));
		}

		$ra_name = Configure::read('Theme.ra_name');
		if ($group != Group::USER && $acct != 'AYCE Training' && $displayRaOrg['Client']['display_ra_org']) {
			echo $this->element('tile', array(
				'img' => array('file' => 'raq_tile.jpg', 'alt' => 'Perform Your ' . $ra_name),
				'heading' => $ra_name,
				'text' => 'Perform Your ' . $ra_name,
				'link' => array('action' => 'initial')
			));
		}
		
		if ($group == Group::MANAGER && $acct == 'AYCE Training') {
			echo $this->element('tile', array(
				'img' => array('file' => 'raq_tile.jpg', 'alt' => 'Breach Response Services'),
				'heading' => 'Cyber Protection & Breach Response',
				'text' => 'Breach Response Services',
				'link' => array('video' => 'breachResponseOverview')
			));
		}
		
		if (isset($partner)) {
			$partnerImg = '/files/partner/logo/' . $partner['Partner']['logo_dir'] . '/' . $partner['Partner']['logo'];	
			if(isset($partner['Partner']['link']) && $partner['Partner']['link'] != 'http://'){
				$partnerLink = $partner['Partner']['link'];
			} else {
				$partnerLink = '/#';
			}
			
			echo $this->element('tile', array(
				'img' => array('file' => $partnerImg, 'alt' => 'Partner Link', 'class' => 'partnerImg'),
				'text' => $partner['Partner']['name'],
				'link' => $partnerLink,
				'target' => '_blank'
			));
		}
	?>
		<div class='completeBox' title='Mark <?php echo $ra_name; ?> Complete?'>
			<p>Before you mark the <?php echo $ra_name; ?> Complete, please make sure you have completed the following:</p>
			<ul>
				<li>Completely filled in the Organization info</li>
				<li>Answered each of the Risk Assessment Questions</li>
				<li>Uploaded existing Policies and Procesures</li>
			</ul><br />
			<p>If you have completed each of the above please mark the <?php echo $ra_name; ?> complete</p>
			<p>If you still have more to complete please close this dialog box and complete those sections first.</p>

			<?php
				echo $this->Html->link($confirmBtn, array('controller' => 'dashboard', 'action' => 'mark_complete'), array('class' => 'closeBox','escape' => false));
			?>


		</div>
</div>
<div class="actions">
	<?php echo $this->element('quickLinks'); ?>
</div>
<?php echo $this->element('newsFeed'); ?>
<form>
	<input tpye="hidden" id="page_is_dirty" name="page_is_dirty" value="0" style="display: none"/>
</form>