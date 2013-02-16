<?php
$this->Html->addCrumb('Track & Document');

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
	<h2><?php echo __('Track & Document'); ?></h2>

	<?php 
		echo $this->Html->link( // Security Incidents
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('si_tile.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Security Incidents'
								)) .
					'<h3>Security Incidents</h3>' .
					'</div>' .
					'<div class="dashSum">Security Incidents</div>' . $dashBtn .
					'</div>',
					array('controller' => 'security_incidents', 'action' => 'index'),
					array('escape' => false)
			);
			
			
		echo $this->Html->link( // Server Room Access
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('sra_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Server Room Access'
								)) .
					'<h3>Server Room Access</h3>' .
					'</div>' .
					'<div class="dashSum">Server Room Access</div>'  . $dashBtn .
					'</div>',
					array('controller' => 'server_room_access', 'action' => 'index'),
					array('escape' => false)
			);
			
		echo $this->Html->link( // ePHI Removed
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ephirem_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA ePHI Removed'
								)) .
					'<h3>ePHI Removed</h3>' .
					'</div>' .
					'<div class="dashSum">ePHI Removed</div>' . $dashBtn .
					'</div>',
					array('controller' => 'ephi_removed', 'action' => 'index'),
					array('escape' => false)
			);

		echo $this->Html->link( // ePHI Recieved
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ephirec_tile.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA ePHI Recieved'
								)) .
					'<h3>ePHI Received</h3>' .
					'</div>' .
					'<div class="dashSum">ePHI Received</div>' . $dashBtn .
					'</div>',
					array('controller' => 'ephi_received', 'action' => 'index'),
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
