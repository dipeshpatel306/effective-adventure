<?php
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
	
	/*if($group == 1){
		$dashBtn = '<div class="dashBtn approved">
						<div class="btnWrapNarrow">
						<div class="btnText">Click Here</div> 
						<div class="triangle"></div>
						</div>
					</div>';
	} elseif($group == 2){
		$dashBtn = '<div class="dashBtn denied">
						<div class="btnWrapWide">
						<div class="btnText">Subscribers Only!</div> 
						<div class="triangle"></div>
						</div>
					</div>';
	} elseif($group == 3){
		$dashBtn = 'User';
	} else {
		$dashBtn = 'No Role yet';
	}*/
?>

<div class="dashboard index">
	<h2><?php echo __('Compliance Portal Dashboard'); ?></h2>
	
	<!--<?php echo $this->Html->link('Risk Assessment Questionnaire', array('controller' => 'riskassessments', 'action' => 'take_risk_assessment'))?><br /><br />-->

	<?php
		// policies & procedures. everyone sees this 					
		echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('pnp_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Policies & Procedures'
								)) .
					'<h3>Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">HIPAA and Other Policies and Procedures</div>' . $approved .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'policies_and_procedures'),
					array('escape' => false)
			);
			
		
		// 	// contracts and documents. managers see this. Users do not
		if($group == '3'){
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
					array('controller' => 'education_center', 'action' => 'learn_now'),
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
			
			
		echo $this->Html->link( // Risk Assessment Questionnaire
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('raq_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Risk Assessment Questionnaire'
								)) .
					'<h3>Risk Assessment Questionnaire</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment Questionnaire</div>' . $approved .
					'</div>',
					array('controller' => 'risk_assessments', 'action' => 'take_risk_assessment'),
					array('escape' => false)
			);
				
		echo $this->Html->link( // Organization Profile
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('org_prof_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Organization Profile'
								)) .
					'<h3>Organization Profile</h3>' .
					'</div>' .
					'<div class="dashSum">Organization Profile</div>' . $approved .
					'</div>',
					array('controller' => 'organization_profiles', 'action' => 'index'),
					array('escape' => false)
			);	
			
		
		if(isset($partner)){	
			echo $this->Html->link( // Partner Link
				'<div class="dashBox">' . 
				'<div class="dashHeadLogo">' .
				$this->Html->image($partner['Partner']['logo'], array(
							//'class' => 'dashTileLogo', 
							'alt' => 'HIPAA Partner Link'
							)) .
				//'<h3>' . $partner['Partner']['name'] . '</h3>' .
				'</div>' .
				'<div class="dashSum">' . $partner['Partner']['name'] .'</div>' . $approved .
				'</div>', $partner['Partner']['link'],
				array('escape' => false, 'target' => '_blank')
			);		
		}
				
	?>
	
</div>
<div class="actions newsFeed">
	<?php echo $this->element('quickLinks'); ?>
	
	<h3><?php echo __('Latest News'); ?></h3>
	<?php echo $this->element('feeds'); ?>
</div>
