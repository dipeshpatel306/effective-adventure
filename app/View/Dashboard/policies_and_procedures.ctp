<?php
$this->Html->addCrumb('Policies & Procedures');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
	if($acct == 'Meaningful Use'){
		$dashBtn = '<div class="dashBtn denied">
						<div class="btnWrapWide">
						<div class="btnText">Subscribers Only!</div> 
						<div class="triangle"></div>
						</div>
					</div>';
	} else {
		$dashBtn = '<div class="dashBtn approved">
						<div class="btnWrapNarrow">
						<div class="btnText">Click Here</div> 
						<div class="triangle"></div>
						</div>
					</div>';	
	}
?>

<div class="dashboard index">
	<h2><?php echo __('Policies & Procedures'); ?></h2>

	<?php 
		echo $this->Html->link( // policies & procedures
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('pnp_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Policies & Procedures'
								)) .
					'<h3>Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">HIPAA and other Policies and Procedures</div>'  . $dashBtn .
					'</div>',
					array('controller' => 'policies_and_procedures', 'action' => 'index'),
					array('escape' => false)
			);
			
			
		echo $this->Html->link( // Other policies & procedures
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('opnp_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Other Policies & Procedures'
								)) .
					'<h3>Other Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">Other Policies & Procedures</div>' . $dashBtn .
					'</div>',
					array('controller' => 'other_policies_and_procedures', 'action' => 'index'),
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
