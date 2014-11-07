<?php
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');

	if(isset($risk) && !empty($risk)){  // if already filled out then give edit link
		$riskAss = array('controller' => 'risk_assessments', 'action' => 'edit', $risk['RiskAssessment']['id']);
	} else {
		$riskAss = array('controller' => 'risk_assessments', 'action' => 'take_risk_assessment');
	}

	if(isset($org) && !empty($org)){ // if already filled out then give edit link
		$orgPro = array('controller' => 'Organization_profiles', 'action' => 'edit', $org['OrganizationProfile']['id']);
	} else {
		$orgPro = array('controller' => 'Organization_profiles', 'action' => 'add');
	}

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
	<h2><?php echo __('Compliance Portal Dashboard'); ?></h2>

	<?php
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
		if($group == '3' && $acct != 'Training'){
			echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('cnd_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Contracts and Documents'
								)) .
					'<h3>Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment, Business Associates, Disaster Recovery</div>' . $noAuth.
					'</div>',
					array('controller' => 'dashboard', 'action' => 'index'),
					array('escape' => false)
			);
		} else{
			echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('cnd_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Contracts and Documents'
								)) .
					'<h3>Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment, Business Associates, Disaster Recovery</div>' . $approved.
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);

		}


		// Track and Document  // Everyone sees
		echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('tnd_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Track and Document'
								)) .
					'<h3>Track and Document</h3>' .
					'</div>' .
					'<div class="dashSum">Security Incidents and ePHI Received and Removed</div>' . $approved .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'track_and_document'),
					array('escape' => false)
			);

		// Social Center Every one sees
		echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('social.png', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Social Center'
								)) .
					'<h3>Social Center</h3>' .
					'</div>' .
					'<div class="dashSum">Facebook and Twitter</div>' . $approved .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'social_center'),
					array('escape' => false)
			);

		// Education Center. Everyone sees
		echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('edcenter.png', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Education Center'
								)) .
					'<h3>Education Center</h3>' .
					'</div>' .
					'<div class="dashSum">Videos and Training</div>' . $approved .
					'</div>',
					array('controller' => 'education_center', 'action' => 'index'),
					array('escape' => false)
			);

		// Information Center. Everyone sees
		echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('infocenter.png', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Information Center'
								)) .
					'<h3>Information Center</h3>' .
					'</div>' .
					'<div class="dashSum">Articles and Blog</div>' . $approved .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'information_center'),
					array('escape' => false)
			);

		/*echo $this->Html->link( // SIRP
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('sirp.png', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA SIRP'
								)) .
					'<h3>SIRP</h3>' .
					'</div>' .
					'<div class="dashSum">Security Incident Response Plan</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'sirp'),
					array('escape' => false)
			);*/

		if($group != 3){
			//pr($displayRaOrg);
		if($displayRaOrg['Client']['display_ra_org']){
		    echo $this->Html->link(
            '<div class="dashBox">' .
            '<div class="dashHead">' .
            $this->Html->image('raq_tile.jpg', array(
                        'class' => 'dashTile',
                        'alt' => 'Perform Your Risk Assessment'
                        )) .
            '<h3>Risk Assessment</h3>' .
            '</div>' .
            '<div class="dashSum">Perform Your Risk Assessment</div>' . $approved .
            '</div>',
            array('controller' => 'dashboard', 'action' => 'initial'),
            array('escape' => false)
        );
				// echo $this->Html->link( // Risk Assessment Questionnaire
						// '<div class="dashBox">' .
						// '<div class="dashHead">' .
						// $this->Html->image('raq_tile.jpg', array(
									// 'class' => 'dashTile',
									// 'alt' => 'HIPAA Risk Assessment Questionnaire'
									// )) .
						// '<h3>Risk Assessment Questionnaire</h3>' .
						// '</div>' .
						// '<div class="dashSum">Risk Assessment Questionnaire</div>' . $approved .
						// '</div>',
						// $riskAss,
						// array('escape' => false)
				// );
// 				
// 
// 
			// echo $this->Html->link( // Organization Profile
						// '<div class="dashBox">' .
						// '<div class="dashHead">' .
						// $this->Html->image('org_prof_tile.jpg', array(
									// 'class' => 'dashTile',
									// 'alt' => 'HIPAA Organization Profile'
									// )) .
						// '<h3>Organization Profile</h3>' .
						// '</div>' .
						// '<div class="dashSum">Organization Profile</div>' . $approved .
						// '</div>',
						// $orgPro,
						// array('escape' => false)
				// );
// 				
			// echo 	'<div class="dashBox markComplete">' .
					// '<div class="dashHead">' .
// 					
					// $this->Html->image('mark_comp_tile.bmp', array(
								// 'class' => 'dashTile',
								// 'alt' => 'HIPAA Mark Risk Assessment Complete'
								// )) . 
// 					
					// '<h3>Mark Risk Assessment Complete</h3>' .
					// '</div>' .
					// '<div class="dashSum">Mark Risk Assessment Complete</div>' .
					// $approved . 
				// '</div>';
// 				

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
							'alt' => 'HIPAA Partner Link',
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
		<div class='completeBox' title='Mark Risk Assessment Complete?'>
			<p>Before you mark the Risk Assessment Complete, please make sure you have completed the following:</p>
			<ul>
				<li>Completely filled in the Organization info</li>
				<li>Answered each of the Risk Assessment Questions</li>
				<li>Uploaded existing Policies and Procesures</li>
			</ul><br />
			<p>If you have completed each of the above please mark the Risk Assessment complete</p>
			<p>If you still have more to complete please close this dialog box and complete those sections first.</p>

			<?php
				echo $this->Html->link($confirmBtn, array('controller' => 'dashboard', 'action' => 'mark_complete'), array('class' => 'closeBox','escape' => false));
			?>


		</div>
</div>
<div class="actions">
	<?php echo $this->element('quickLinks'); ?>
</div>

<div class='newsFeed'>
	<h3><?php echo __('Latest News'); ?></h3>
	<?php echo $this->element('feeds'); ?>
</div>
