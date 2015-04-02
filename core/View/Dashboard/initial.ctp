<?php
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');

	$ra_name = Configure::read('Theme.ra_name');

	$approved = '<div class="dashBtn approved">
					<div class="btnWrapNarrow">
					<div class="btnText">Click Here</div>
					<div class="triangle"></div>
					</div>
				</div>';
	if($acct == 'Initial' || $acct == 'Subscription' || $acct == 'HIPAA'){
		$dashBtn = $approved;
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
	<h2><?php echo Configure::read('Theme.dashboard_name'); ?></h2>

	<?php 
		echo $this->element('initMsg');
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
					$orgPro = array('controller' => 'Organization_profiles', 'action' => 'add'),
					array('escape' => false)
			);

		echo $this->Html->link( // Risk Assessment Questionnaire
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('raq_tile.jpg', array(
								'class' => 'dashTile dashTileLong',
								'alt' => $ra_name . ' Questionnaire'
								)) .
					'<h3>' . $ra_name . ' Questionnaire</h3>' .
					'</div>' .
					'<div class="dashSum">' . $ra_name . ' Questionnaire</div>' . $dashBtn .
					'</div>',
					array('controller' => 'risk_assessments', 'action' => 'take_risk_assessment'),
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
						
	?>
				<div class="dashBox markComplete">
					<div class="dashHead">
					<?php
					echo $this->Html->image('mark_comp_tile.bmp', array(
								'class' => 'dashTile',
								'alt' => 'Mark ' . $ra_name . ' Complete'
								));
					?>
					<h3>Mark <?php echo $ra_name; ?> Complete</h3>
					</div>
					<div class="dashSum">Mark <?php echo $ra_name; ?> Complete</div>
					<?php echo $dashBtn; ?>

				</div>


		<div class='completeBox dialogBox' title='Mark <?php echo $ra_name; ?> Complete?'>
			<p>Before you mark the <?php echo $ra_name; ?> Complete, please make sure you have completed the following:</p>
			<ul>
				<li>Completely filled in the Organization info</li>
				<li>Answered each of the Risk Assessment Questions</li>
				<li>Uploaded existing Policies and Procesures</li>
				<li>I certify that I have provided information to the best of my knowledge and have utilized all appropriate resources necessary to complete the <?php echo $ra_name; ?> information. <?php echo Configure::read('Theme.copyright'); ?> has provided me with the appropriate level of information and I was made aware of the proper requirements necessary to complete the Risk Assessment.</li>
			</ul><br />
			<p>If you have completed each of the above please mark the <?php echo $ra_name; ?> complete</p>
			<p>If you still have more to complete please close this dialog box and complete those sections first.</p>

			<?php
				echo $this->Html->link($confirmBtn, array('controller' => 'dashboard', 'action' => 'mark_complete'), array('class' => 'completeClose','escape' => false));
			?>
		</div>
			
	    <div class='thanksBox dialogBox' title='Complete'>
	        <p>Thanks for completing the <?php echo $ra_name; ?>.</p>
	        &nbsp;
	        <p>We will send you an email when the <?php echo $ra_name; ?> Reports are complete.</p>
	        <p>We will contact you if we need any additional information.</p>
	        <?php echo $this->element('dialogok'); ?>
	    </div>

		</div>
</div>
<?php echo $this->element('newsFeed'); ?>
