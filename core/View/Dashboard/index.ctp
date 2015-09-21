<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');

	$approved = '<div class="dashBtn approved">
						<div class="btnWrapNarrow">
						<div class="btnText">Click Here</div>
						<div class="triangle"></div>
						</div>
					</div>';

	$banned = '<div class="dashBtn denied">
						<div class="btnWrapWide">
						<div class="btnText">Subscribers Only!</div>
						<div class="triangle"></div>
						</div>
					</div>';

	$noAuth = '<div class="dashBtn denied">
						<div class="btnWrapWide">
						<div class="btnText">Not Authorized!</div>
						<div class="triangle"></div>
						</div>
					</div>';
	
	$confirmBtn = '<div class="dashBtn approved">
						<div class="btnWrapComplete">
						<div class="btnText">Mark Complete</div>
						<div class="triangle"></div>
						</div>
					</div>';
										
					
	
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
		
		$ed_center_tile = $this->Html->link(
			'<div class="dashBox">' .
			'<div class="dashHead">' .
			$this->Html->image('edcenter.png', array(
						'class' => 'dashTile',
						'alt' => 'Education Center'
						)) .
			'<h3>Education Center</h3>' .
			'</div>' .
			'<div class="dashSum">Videos and Training</div>' . $approved .
			'</div>',
			array('controller' => 'education_center', 'action' => 'index'),
			array('escape' => false)
		);
		
		if ($group == Group::USER && $acct == 'AYCE Training') {
			echo $ed_center_tile;
		}
	
		// policies & procedures. everyone sees this
		echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('pnp_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'Policies & Procedures'
								)) .
					'<h3>Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">Policies and Procedures</div>' . $approved .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'policies_and_procedures'),
					array('escape' => false)
			);


		// 	// contracts and documents. managers see this. Users do not
		$ra_name = Configure::read('Theme.ra_name');
		$baa_entity_name = Configure::read('Theme.baa_entity_name');
		if($group == Group::USER && $acct != 'Training'){
			if ($acct != 'AYCE Training') {
				echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('cnd_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'Contracts and Documents'
								)) .
					'<h3>Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">' . $ra_name .', ' . $baa_entity_name .', Disaster Recovery</div>' . $noAuth.
					'</div>',
					array('controller' => 'dashboard', 'action' => 'index'),
					array('escape' => false)
				);
			}
		} else{
			echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('cnd_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'Contracts and Documents'
								)) .
					'<h3>Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">' . $ra_name .', ' . $baa_entity_name .', Disaster Recovery</div>' . $approved.
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);

		}


		// Track and Document  // Everyone sees
		if (Configure::read('Theme.display_ephi')) {
			$td_title = 'Security Incidents and ePHI Received and Removed';
		} else {
			$td_title = 'Security Incidents and Server Room Access';
		}
		
		if ($acct != 'AYCE Training') {
			echo $this->Html->link(
				'<div class="dashBox">' .
				'<div class="dashHead">' .
				$this->Html->image('tnd_tile.jpg', array(
									'class' => 'dashTile',
									'alt' => 'Track and Document'
									)) .
				'<h3>Track and Document</h3>' .
				'</div>' .
				'<div class="dashSum">' . $td_title . '</div>' . $approved .
				'</div>',
				array('controller' => 'dashboard', 'action' => 'track_and_document'),
				array('escape' => false)
			);	
		}
		
		if (!($group == Group::USER && $acct = 'AYCE Training')) {
			echo $ed_center_tile;
		}

		if (Configure::read('Theme.display_social_center')) {
			// Social Center Every one sees
			echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('social.png', array(
								'class' => 'dashTile',
								'alt' => 'Social Center'
								)) .
					'<h3>Social Center</h3>' .
					'</div>' .
					'<div class="dashSum">Facebook and Twitter</div>' . $approved .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'social_center'),
					array('escape' => false)
			);
		}

		if (Configure::read('Theme.display_information_center')) {
			// Information Center. Everyone sees
			echo $this->Html->link(
						'<div class="dashBox">' .
						'<div class="dashHead">' .
						$this->Html->image('infocenter.png', array(
									'class' => 'dashTile',
									'alt' => 'Information Center'
									)) .
						'<h3>Information Center</h3>' .
						'</div>' .
						'<div class="dashSum">Articles and Blog</div>' . $approved .
						'</div>',
						array('controller' => 'dashboard', 'action' => 'information_center'),
						array('escape' => false)
				);
		}

		/*echo $this->Html->link( // SIRP
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('sirp.png', array(
								'class' => 'dashTile',
								'alt' => 'SIRP'
								)) .
					'<h3>SIRP</h3>' .
					'</div>' .
					'<div class="dashSum">Security Incident Response Plan</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'sirp'),
					array('escape' => false)
			);*/

		$ra_name = Configure::read('Theme.ra_name');
		if($group != Group::USER){
			//pr($displayRaOrg);
		if(!empty($displayRaOrg) && $displayRaOrg['Client']['display_ra_org'] &&
			!($group == Group::USER && $acct == 'AYCE Training')){
		    echo $this->Html->link(
            '<div class="dashBox">' .
            '<div class="dashHead">' .
            $this->Html->image('raq_tile.jpg', array(
                        'class' => 'dashTile',
                        'alt' => 'Perform Your ' . $ra_name
                        )) .
            '<h3>' . $ra_name . '</h3>' .
            '</div>' .
            '<div class="dashSum">Perform Your ' . $ra_name . '</div>' . $approved .
            '</div>',
            array('controller' => 'dashboard', 'action' => 'initial'),
            array('escape' => false)
        );

		}
		}
		if(isset($partner)){
			$partnerImg = '/files/partner/logo/' . $partner['Partner']['logo_dir'] . '/' . $partner['Partner']['logo'];	
			if(isset($partner['Partner']['link']) && $partner['Partner']['link'] != 'http://'){
				$partnerLink = $partner['Partner']['link'];
			} else {
				$partnerLink = '/#';
			}
			
			echo $this->Html->link( // Partner Link
				'<div class="dashBox">' .
				'<div class="dashHeadLogo">' .
				$this->Html->image($partnerImg, array(
							//'class' => 'dashTileLogo',
							'alt' => 'Partner Link',
							//'url' => array($partnerImg),
							'class' => 'partnerImg'
							)) .
				//'<h3>' . $partner['Partner']['name'] . '</h3>' .
				'</div>' .
				'<div class="dashSum">' . $partner['Partner']['name'] .'</div>' . $approved .
				'</div>', $partnerLink,
				array('escape' => false, 'target' => '_blank')
			);
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
