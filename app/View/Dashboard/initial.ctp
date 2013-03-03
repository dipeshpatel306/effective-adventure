<?php
// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
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
?>

<div class="dashboard index">
	<h2><?php echo __('Compliance Portal Dashboard'); ?></h2>
	
	<?php 					

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
					'<div class="dashSum">Organization Profile</div>' . $dashBtn .
					'</div>',
					array('controller' => 'organization_profiles', 'action' => 'index'),
					array('escape' => false)
			);		
			
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
			
		echo $this->Html->link( // Risk Assessment Status
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
			);				
	?>
	
</div>
<div class="actions newsFeed">
	<h3><?php echo __('Latest News'); ?></h3>
	<!--<ul>
		<li><?php echo $this->Html->link(__('New Dashboard'), array('action' => 'add')); ?></li>
	</ul>-->
	<?php echo $this->element('feeds'); ?>
</div>
