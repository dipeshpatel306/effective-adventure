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


	if($acct == 'Initial' || $acct == 'Subscription' || $acct == 'HIPAA'){
		$dashBtn = '<div class="dashBtn approved">
						<div class="btnWrapNarrow">
						<div class="btnText">Click Here</div>
						<div class="triangle"></div>
						</div>
					</div>';
	} else{
		$dashBtn = '<div class="dashBtn denied">
						<div class="btnWrapWide">
						<div class="btnText">Subscribers Only!</div>
						<div class="triangle"></div>
						</div>
					</div>';
	}

		$confirmBtn = '<div class="dashBtn approved">
						<div class="btnWrapComplete">
						<div class="btnText">Mark Complete</div>
						<div class="triangle"></div>
						</div>
					</div>';
                   				
?>

<div class="dashboard index initial">
	<h2><?php echo __('Compliance Portal Dashboard'); ?></h2>


	<div class='initBox'>
	    <div class='initTxt floatLeft'>
            <h3>
            <p>The first step to getting <span class='redHL'>HIPAA Secure Now!</span> is to complete a Risk Assessment</p>
            <p>Click "Let's Get Started" to review the <span class='redHL'>HIPAA Secure Now!</span> process</p>
            </h3>
        </div>
	
	<?php
		
		echo $this->Html->link( // Upload Other Policies and Procedures
					'<div class="dashBox getStartedDashBox">' .
					'<div class="dashHead">' .
					"<h3><center>Let's Get Started<center></h3>" .
					'</div>' .
					'<div class="dashSum">Risk Assessment is a 4 Step Process</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'lets_get_started'),
					array('escape' => false)
			);
	?>
	
		
	</div>
<div class='initTiles clear'>
	<?php
	if($group != 3){
	if($displayRaOrg['Client']['display_ra_org']){
		echo $this->Html->link( // Organization Profile
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('org_prof_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Organization Profile'
								)) .
					'<h3>Organization Profile</h3>' .
					'</div>' .
					'<div class="dashSum">Organization Profile</div>' . $dashBtn .
					'</div>',
					$orgPro,
					array('escape' => false)
			);

		echo $this->Html->link( // Risk Assessment Questionnaire
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('raq_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Risk Assessment Questionnaire'
								)) .
					'<h3>Risk Assessment Questionnaire</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment Questionnaire</div>' . $dashBtn .
					'</div>',
					$riskAss,
					array('escape' => false)
			);
	}
	}


		echo $this->Html->link( // Upload Other Policies and Procedures
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('upload_pol_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Organization Profile'
								)) .
					'<h3>Upload Existing Policies</h3>' .
					'</div>' .
					'<div class="dashSum">Upload Existing Policies</div>' . $dashBtn .
					'</div>',
					array('controller' => 'other_policies_and_procedures', 'action' => 'index'),
					array('escape' => false)
			);

		/*echo $this->Html->link( // Risk Assessment Status
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('mark_comp_tile.bmp', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Mark Risk Assessment Complete'
								)) .
					'<h3>Mark Risk Assessment Complete</h3>' .
					'</div>' .
					'<div class="dashSum">Mark Risk Assessment Complete</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'mark_complete'),
					array('escape' => false)
			);*/
			
			
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
				<div class="dashBox markComplete">
					<div class="dashHead">
					<?php
					echo $this->Html->image('mark_comp_tile.bmp', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Mark Risk Assessment Complete'
								));
					?>
					<h3>Mark Risk Assessment Complete</h3>
					</div>
					<div class="dashSum">Mark Risk Assessment Complete</div>
					<?php echo $dashBtn; ?>

				</div>


		<div class='completeBox dialogBox' title='Mark Risk Assessment Complete?'>
			<p>Before you mark the Risk Assessment Complete, please make sure you have completed the following:</p>
			<ul>
				<li>Completely filled in the Organization info</li>
				<li>Answered each of the Risk Assessment Questions</li>
				<li>Uploaded existing Policies and Procesures</li>
				<li>I certify that I have provided information to the best of my knowledge and have utilized all appropriate resources necessary to complete the Risk Assessment information. HIPAA Secure Now! has provided me with the appropriate level of information and I was made aware of the proper requirements necessary to complete the Risk Assessment.</li>
			</ul><br />
			<p>If you have completed each of the above please mark the Risk Assessment complete</p>
			<p>If you still have more to complete please close this dialog box and complete those sections first.</p>

			<?php
				echo $this->Html->link($confirmBtn, array('controller' => 'dashboard', 'action' => 'mark_complete'), array('class' => 'completeClose','escape' => false));
			?>
		</div>
			
	    <div class='thanksBox dialogBox' title='Complete'>
	        <p>Thanks for completing the Risk Assessment.</p>
	        &nbsp;
	        <p>We will send you an email when the Risk Assessment Reports are complete.</p>
	        <p>We will contact you if we need any additional information.</p>
	        <?php echo $this->element('dialogok'); ?>
	    </div>

		</div>
</div>

<div class='newsFeed'>
	<h3><?php echo __('Latest News'); ?></h3>
	<?php echo $this->element('feeds'); ?>
</div>
