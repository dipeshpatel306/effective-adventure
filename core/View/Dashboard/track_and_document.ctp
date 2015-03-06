<?php
$this->Html->addCrumb('Track & Document');	
	
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
					
	$noAuth = 	'<div class="dashBtn denied">
						<div class="btnWrapWide">
						<div class="btnText">Not Authorized!</div> 
						<div class="triangle"></div>
						</div>
					</div>';	
		
	
/*	if($group == 1){
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
	<h2><?php echo __('Track & Document'); ?></h2>

	<?php 
	
		// Security Incidents
		if ($acct == 'Training') {
		    echo $this->Html->link( 
                    '<div class="dashBox">' . 
                    '<div class="dashHead">' .
                    $this->Html->image('si_tile.png', array(
                                'class' => 'dashTile', 
                                'alt' => 'Security Incidents'
                                )) .
                    '<h3>Security Incidents</h3>' .
                    '</div>' .
                    '<div class="dashSum">Security Incidents</div>' . $banned .
                    '</div>',
                    array('controller' => 'dashboard', 'action' => 'track_and_document'),
                    array('escape' => false)
            );
		} else {
		  echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('si_tile.png', array(
								'class' => 'dashTile', 
								'alt' => 'Security Incidents'
								)) .
					'<h3>Security Incidents</h3>' .
					'</div>' .
					'<div class="dashSum">Security Incidents</div>' . $approved .
					'</div>',
					array('controller' => 'security_incidents', 'action' => 'index'),
					array('escape' => false)
			);
		}
        
		// Server Room Access. Only Managers see everything. User is noauth. MU is banned
		
		if($acct == 'Meaningful Use' || $acct == 'Training'){
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('sra_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Server Room Access'
								)) .
					'<h3>Server Room Access</h3>' .
					'</div>' .
					'<div class="dashSum">Server Room Access</div>'  . $banned .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'track_and_document'),
					array('escape' => false)
			);
		} elseif($group == 3){
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('sra_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Server Room Access'
								)) .
					'<h3>Server Room Access</h3>' .
					'</div>' .
					'<div class="dashSum">Server Room Access</div>'  . $noAuth .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'track_and_document'),
					array('escape' => false)
			);
		} else {
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('sra_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Server Room Access'
								)) .
					'<h3>Server Room Access</h3>' .
					'</div>' .
					'<div class="dashSum">Server Room Access</div>'  . $approved .
					'</div>',
					array('controller' => 'server_room_access', 'action' => 'index'),
					array('escape' => false)
			);
		}
		
		if (Configure::read('Theme.display_ephi')) {
			// ePHI Removed. SU Manager can use. SU User is no auth. MU is banned
			if($acct == 'Meaningful Use' || $acct == 'Training'){
			echo $this->Html->link( 
						'<div class="dashBox">' . 
						'<div class="dashHead">' .
						$this->Html->image('ephirem_tile.jpg', array(
									'class' => 'dashTile', 
									'alt' => 'ePHI Removed'
									)) .
						'<h3>ePHI Removed</h3>' .
						'</div>' .
						'<div class="dashSum">ePHI Removed</div>' . $banned .
						'</div>',
						array('controller' => 'dashboard', 'action' => 'track_and_document'),
						array('escape' => false)
				);
				
			} elseif($group == 3){
				echo $this->Html->link( 
						'<div class="dashBox">' . 
						'<div class="dashHead">' .
						$this->Html->image('ephirem_tile.jpg', array(
									'class' => 'dashTile', 
									'alt' => 'ePHI Removed'
									)) .
						'<h3>ePHI Removed</h3>' .
						'</div>' .
						'<div class="dashSum">ePHI Removed</div>' . $noAuth .
						'</div>',
						array('controller' => 'dashboard', 'action' => 'track_and_document'),
						array('escape' => false)
				);			
			} else{
				echo $this->Html->link( 
						'<div class="dashBox">' . 
						'<div class="dashHead">' .
						$this->Html->image('ephirem_tile.jpg', array(
									'class' => 'dashTile', 
									'alt' => 'ePHI Removed'
									)) .
						'<h3>ePHI Removed</h3>' .
						'</div>' .
						'<div class="dashSum">ePHI Removed</div>' . $approved .
						'</div>',
						array('controller' => 'ephi_removed', 'action' => 'index'),
						array('escape' => false)
				);
			}
	
			// ePHI Recieved. SU Manager can use. SU User is no auth. MU is banned
			if($acct == 'Meaningful Use' || $acct == 'Training'){
			echo $this->Html->link( 
						'<div class="dashBox">' . 
						'<div class="dashHead">' .
						$this->Html->image('ephirec_tile.png', array(
									'class' => 'dashTile', 
									'alt' => 'ePHI Recieved'
									)) .
						'<h3>ePHI Received</h3>' .
						'</div>' .
						'<div class="dashSum">ePHI Received</div>' . $banned .
						'</div>',
						array('controller' => 'dashboard', 'action' => 'track_and_document'),
						array('escape' => false)
				);			
				
			} elseif($group == 3) {
				echo $this->Html->link( 
						'<div class="dashBox">' . 
						'<div class="dashHead">' .
						$this->Html->image('ephirec_tile.png', array(
									'class' => 'dashTile', 
									'alt' => 'ePHI Recieved'
									)) .
						'<h3>ePHI Received</h3>' .
						'</div>' .
						'<div class="dashSum">ePHI Received</div>' . $noAuth .
						'</div>',
						array('controller' => 'dashboard', 'action' => 'track_and_document'),
						array('escape' => false)
				);
				
			} else {
						echo $this->Html->link( 
						'<div class="dashBox">' . 
						'<div class="dashHead">' .
						$this->Html->image('ephirec_tile.png', array(
									'class' => 'dashTile', 
									'alt' => 'ePHI Recieved'
									)) .
						'<h3>ePHI Received</h3>' .
						'</div>' .
						'<div class="dashSum">ePHI Received</div>' . $approved .
						'</div>',
						array('controller' => 'ephi_received', 'action' => 'index'),
						array('escape' => false)
				);
			}
		}
		
	?>

	
</div>
<div class="actions newsFeed">
	<?php echo $this->element('quickLinks'); ?>
</div>
