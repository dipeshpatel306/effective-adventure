<?php
$this->Html->addCrumb('Policies & Procedures');

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

	/*if($acct == 'Meaningful Use'){
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
	}*/
?>

<div class="dashboard index">
	<h2><?php echo __('HIPAA Policies & Procedures'); ?></h2>

	<?php
		// policies & procedures . If Manager allow, If employee read only. MU hidden
		if($acct == 'Meaningful Use'){ // Ban Meaningful USe
				echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('pnp_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Policies & Procedures'
								)) .
					'<h3>HIPAA Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">HIPAA Policies and Procedures</div>'  . $banned .
					'</div>',
					array('controller' => 'dashboard', 'action' => 'policies_and_procedures'),
					array('escape' => false)
			);
		} else {
				 // allow subscribers. Users are read only(see controller)
			echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('pnp_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Policies & Procedures'
								)) .
					'<h3>Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">HIPAA and other Policies and Procedures</div>'  . $approved .
					'</div>',
					array('controller' => 'policies_and_procedures', 'action' => 'index'),
					array('escape' => false)
				);

		}
		// Other policies & procedures. Subscribers and MU are allowed. Users are read only
		echo $this->Html->link(
					'<div class="dashBox">' .
					'<div class="dashHead">' .
					$this->Html->image('opnp_tile.jpg', array(
								'class' => 'dashTile',
								'alt' => 'HIPAA Other Policies & Procedures'
								)) .
					'<h3>Other Policies & Procedures</h3>' .
					'</div>' .
					'<div class="dashSum">Other Policies & Procedures</div>' . $approved .
					'</div>',
					array('controller' => 'other_policies_and_procedures', 'action' => 'index'),
					array('escape' => false)
			);

	?>


</div>
<div class="actions newsFeed">

	<?php echo $this->element('quickLinks'); ?>
</div>