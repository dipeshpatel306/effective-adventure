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


	if($acct == 'Initial'){
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

<div class="dashboard index">
	<h2><?php echo __('Compliance Portal Dashboard'); ?></h2>

	<?php

		echo $this->Html->link( // Upload Other Policies and Procedures
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					'<h3><center>Lets Get Started<center></h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment is a 4 Step Process</div>' . $dashBtn .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'lets_get_started'),
					array('escape' => false)
			);

	if($group != 3){
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

<div class='newsFeed'>
	<h3><?php echo __('Latest News'); ?></h3>
	<?php echo $this->element('feeds'); ?>
</div>
