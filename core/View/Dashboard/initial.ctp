<?php
App::uses('Group', 'Model');
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

$ra_name = Configure::read('Theme.ra_name');

$disabled = !in_array($acct, array('Initial', 'Subscription', 'Admin'));
$dashBtn = $disabled ? 'subscribers' : 'approved';
$nolink = ''; //($acct == 'AYCE Training') ? array('video' => 'sraOverview') : '';
?>

<div class="dashboard index initial">
	<h2><?php echo Configure::read('Theme.dashboard_name'); ?></h2>
	<?php
		echo $this->element('video_overlay');
		echo $this->element('initMsg');
		echo $this->element('tile', array(
			'class' => 'getStartedDashBox',
			'heading' => "<center>Let's Get Started</center>",
			'text' => 'Risk Assessment is a 4 Step Process',
			'link' => $disabled ? $nolink : array('action' => 'lets_get_started'),
			'button' => $dashBtn
		));
	?>
</div>
<div class='initTiles clear'>
	<?php
		if ($group != Group::USER && $displayRaOrg['Client']['display_ra_org']) {
			echo $this->element('tile', array(
				'img' => array('file' => 'org_prof_tile.jpg', 'alt' => 'Organization Profile'),
				'heading' => 'Organization Profile',
				'text' => 'Organization Profiles',
				'button' => $dashBtn,
				'link' => $disabled ? $nolink : array('controller' => 'organization_profiles', 'action' => 'add')
			));
			echo $this->element('tile', array(
				'img' => array('file' => 'raq_tile.jpg', 'alt' => $ra_name . ' Questionnaire'),
				'heading' => $ra_name . ' Questionnaire',
				'text' => $ra_name . ' Questionnaire',
				'button' => $dashBtn,
				'link' => $disabled ? $nolink : array('controller' => 'risk_assessments', 'action' => 'take_risk_assessment')
			));
		}
		echo $this->element('tile', array(
			'img' => array('file' => 'upload_pol_tile.jpg', 'alt' => 'Upload Policies & Procedures'),
			'heading' => 'Upload Existing Policies',
			'text' => 'Upload Existing Policies',
			'button' => $dashBtn,
			'link' => $disabled ? $nolink : array('controller' => 'other_policies_and_procedures', 'action' => 'index')
		));
		
		echo $this->element('tile', array(
			'img' => array('file' => 'mark_comp_tile.bmp', 'alt' => 'Mark ' . $ra_name . ' Complete'),
			'heading' => 'Mark ' . $ra_name . ' Complete',
			'text' => 'Mark ' . $ra_name . ' Complete',
			'button' => $dashBtn,
			'class' => $disabled ? '' : 'markComplete',
			'link' => '#'
		));
	?>

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
				echo $this->Html->link($this->element('button', array('approved' => true, 'text' => 'Mark Complete', 'wrap' => 'btnWrapComplete')), 
					array('controller' => 'dashboard', 'action' => 'mark_complete'), array('class' => 'closeBox', 'escape' => false));
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
