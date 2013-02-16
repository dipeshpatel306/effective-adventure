<?php
$this->Html->addCrumb('Contracts & Documents');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	
	if($group == 1){
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
	}

?>
<div class="dashboard index">
	<h2><?php echo __('Contracts & Documents'); ?></h2>

	<?php 
		echo $this->Html->link( // policies & procedures
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ra_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Risk Assessment Documents'
								)) .
					'<h3>Risk Assessment Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment Documents</div>' . $dashBtn .
					'</div>',
					array('controller' => 'risk_assessment_documents', 'action' => 'index'),
					array('escape' => false)
			);
			
			
		echo $this->Html->link( // Business Associate Agreements
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ba_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Business Associate Agreements'
								)) .
					'<h3>Business Associate Agreements</h3>' .
					'</div>' .
					'<div class="dashSum">Business Associate Agreements</div>' . $dashBtn .
					'</div>',
					array('controller' => 'business_associate_agreements', 'action' => 'index'),
					array('escape' => false)
			);
			
		echo $this->Html->link( // Disaster Recovery Plans
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('dr_tile.bmp', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Disaster Recovery Plans'
								)) .
					'<h3>Disaster Recovery Plans</h3>' .
					'</div>' .
					'<div class="dashSum">Disaster Recovery Plans</div>' . $dashBtn .
					'</div>',
					array('controller' => 'disaster_recovery_plans', 'action' => 'index'),
					array('escape' => false)
			);

		echo $this->Html->link( // Other Contracts & Documents
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ocnd_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Other Contracts & Documents'
								)) .
					'<h3>Other Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Other Contracts & Documents</div>' . $dashBtn .
					'</div>',
					array('controller' => 'other_contracts_and_documents', 'action' => 'index'),
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
