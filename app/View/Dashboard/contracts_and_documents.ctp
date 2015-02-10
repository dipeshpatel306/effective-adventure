<?php
$this->Html->addCrumb('Contracts & Documents');

// Conditionally load buttons based upon user role
//	$group = $this->Session->read('Auth.User.group_id'); 
	
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
	<h2><?php echo __('Contracts & Documents'); ?></h2>

	<?php 
	
		// Risk Assessment Documents. If user deny
		if ($acct == 'Training') {
		    echo $this->Html->link( 
                    '<div class="dashBox">' . 
                    '<div class="dashHead">' .
                    $this->Html->image('ra_tile.jpg', array(
                                'class' => 'dashTile', 
                                'alt' => 'Risk Assessment Documents'
                                )) .
                    '<h3>Risk Assessment Documents</h3>' .
                    '</div>' .
                    '<div class="dashSum">Risk Assessment Documents</div>' . $banned .
                    '</div>',
                    array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
                    array('escape' => false)
            );
		} elseif($group == 3){
			echo $this->Html->link( 
                    '<div class="dashBox">' . 
                    '<div class="dashHead">' .
                    $this->Html->image('ra_tile.jpg', array(
                                'class' => 'dashTile', 
                                'alt' => 'Risk Assessment Documents'
                                )) .
                    '<h3>Risk Assessment Documents</h3>' .
                    '</div>' .
                    '<div class="dashSum">Risk Assessment Documents</div>' . $noAuth .
                    '</div>',
                    array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
                    array('escape' => false)
            );
		} else {
		echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ra_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Risk Assessment Documents'
								)) .
					'<h3>Risk Assessment Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessment Documents</div>' . $approved .
					'</div>',
					array('controller' => 'risk_assessment_documents', 'action' => 'index'),
					array('escape' => false)
			);			
		}
		
		// Business Associate Agreements Users are banned
		if($group == 3){
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ba_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Business Associate Agreements'
								)) .
					'<h3>Business Associate Agreements</h3>' .
					'</div>' .
					'<div class="dashSum">Business Associate Agreements</div>' . $noAuth .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);			
			
		} else if ($acct == 'Training') {
		    echo $this->Html->link( 
                    '<div class="dashBox">' . 
                    '<div class="dashHead">' .
                    $this->Html->image('ba_tile.jpg', array(
                                'class' => 'dashTile', 
                                'alt' => 'Business Associate Agreements'
                                )) .
                    '<h3>Business Associate Agreements</h3>' .
                    '</div>' .
                    '<div class="dashSum">Business Associate Agreements</div>' . $banned .
                    '</div>',
                    array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
                    array('escape' => false)
            );
		} else {
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ba_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Business Associate Agreements'
								)) .
					'<h3>Business Associate Agreements</h3>' .
					'</div>' .
					'<div class="dashSum">Business Associate Agreements</div>' . $approved .
					'</div>',
					array('controller' => 'business_associate_agreements', 'action' => 'index'),
					array('escape' => false)
			);
			
		}
		
		// Disaster Recovery Plans. Only Sub Manager can use. Sub User is not authorized. MU is banned
		if($acct == 'Meaningful Use' || $acct == 'Training'){ // ban if MU
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('dr_tile.bmp', array(
								'class' => 'dashTile', 
								'alt' => 'Disaster Recovery Plans'
								)) .
					'<h3>Disaster Recovery Plans</h3>' .
					'</div>' .
					'<div class="dashSum">Disaster Recovery Plans</div>' . $banned .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);			
			
		} elseif($group == 3 ){ // if sub user
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('dr_tile.bmp', array(
								'class' => 'dashTile', 
								'alt' => 'Disaster Recovery Plans'
								)) .
					'<h3>Disaster Recovery Plans</h3>' .
					'</div>' .
					'<div class="dashSum">Disaster Recovery Plans</div>' . $noAuth .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);			
		} else {
			echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('dr_tile.bmp', array(
								'class' => 'dashTile', 
								'alt' => 'Disaster Recovery Plans'
								)) .
					'<h3>Disaster Recovery Plans</h3>' .
					'</div>' .
					'<div class="dashSum">Disaster Recovery Plans</div>' . $approved .
					'</div>',
					array('controller' => 'disaster_recovery_plans', 'action' => 'index'),
					array('escape' => false)
			);
		}
			
		// Other Contracts & Documents . Only SUB Managers can use. Employees is noauth. MU is banned
			
		if($acct == 'Meaningful Use' || $acct == 'Training'){
		echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ocnd_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Other Contracts & Documents'
								)) .
					'<h3>Other Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Other Contracts & Documents</div>' . $banned .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);			
			
		} elseif($group == 3){
		echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ocnd_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Other Contracts & Documents'
								)) .
					'<h3>Other Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Other Contracts & Documents</div>' . $noAuth .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'contracts_and_documents'),
					array('escape' => false)
			);			
			
		} else {
		echo $this->Html->link( 
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('ocnd_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'Other Contracts & Documents'
								)) .
					'<h3>Other Contracts & Documents</h3>' .
					'</div>' .
					'<div class="dashSum">Other Contracts & Documents</div>' . $approved .
					'</div>',
					array('controller' => 'other_contracts_and_documents', 'action' => 'index'),
					array('escape' => false)
			);			
		}

        if (($group == Group::ADMIN) || (($acct == 'Meaningful Use' || $acct == 'Subscription') && $group == Group::MANAGER)) {
            echo $this->Html->link(
                '<div class="dashBox">' . 
                '<div class="dashHead">' .
                $this->Html->image('templates_tile.png', array(
                            'class' => 'dashTile', 
                            'alt' => 'Templates'
                            )) .
                '<h3>Templates</h3>' .
                '</div>' .
                '<div class="dashSum">Templates</div>' . $approved .
                '</div>',
                array('controller' => 'templates', 'action' => 'index'),
                array('escape' => false)
            );
        }



	?>

	
</div>
<div class="actions newsFeed">

	<?php echo $this->element('quickLinks'); ?>
</div>
