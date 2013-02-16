<?php
$this->Html->addCrumb('Information Center');

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
	<h2><?php echo __('Information Center'); ?></h2>
<?php
		echo $this->Html->link( // Policies & Procedures
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('blog.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Information'
								)) .
					'<h3>HIPAA Information</h3>' .
					'</div>' .
					'<div class="dashSum">Policies and Procedures</div>'  . $dashBtn .
					'</div>', 'http://www.hipaasecurenow.com/?cat=10', 
					array('escape' => false, 'target'=>'_blank')
			);

		echo $this->Html->link( // Risk Assessments
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('blog.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Information'
								)) .
					'<h3>HIPAA Information</h3>' .
					'</div>' .
					'<div class="dashSum">Risk Assessments</div>' . $dashBtn .
					'</div>', 'http://www.hipaasecurenow.com/?cat=8', 
					array('escape' => false, 'target'=>'_blank')
			);

		echo $this->Html->link( // Security Training
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('blog.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Information'
								)) .
					'<h3>HIPAA Information</h3>' .
					'</div>' .
					'<div class="dashSum">Security Training</div>' . $dashBtn .
					'</div>', 'http://www.hipaasecurenow.com/?cat=9', 
					array('escape' => false, 'target'=>'_blank')
			);
			
		echo $this->Html->link( // HIPAA Audits
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('blog.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Information'
								)) .
					'<h3>HIPAA Information</h3>' .
					'</div>' .
					'<div class="dashSum">HIPAA Audits</div>' . $dashBtn .
					'</div>', 'http://www.hipaasecurenow.com/?s=HIPAA+Audits', 
					array('escape' => false, 'target'=>'_blank')
			);

		echo $this->Html->link( // What to do if you get Audited
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('blog.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Information'
								)) .
					'<h3>HIPAA Information</h3>' .
					'</div>' .
					'<div class="dashSum">What to do if you get audited</div>'  . $dashBtn .
					'</div>', 'http://www.hipaasecurenow.com/index.php/you-received-a-hipaa-audit-notification-now-what/', 
					array('escape' => false, 'target'=>'_blank')
			);
			
		echo $this->Html->link( // Practice Administrators Role w/ HIPAA
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('blog.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Information'
								)) .
					'<h3>HIPAA Information</h3>' .
					'</div>' .
					'<div class="dashSum">Practice Administrators Role w/ HIPAA</div>' . $dashBtn .
					'</div>', 'http://www.hipaasecurenow.com/index.php/practice-administrators-are-the-key-to-hipaa-security/', 
					array('escape' => false, 'target'=>'_blank')
			);
			
		echo $this->Html->link( // Practice Administrators Role w/ HIPAA
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('hhs.png', array(
								'class' => 'dashTile', 
								'alt' => 'HHS Information'
								)) .
					'<h3>HHS Information</h3>' .
					'</div>' .
					'<div class="dashSum">Breach Notification</div>' . $dashBtn .
					'</div>', 'http://www.hhs.gov/ocr/privacy/hipaa/administrative/breachnotificationrule/index.html', 
					array('escape' => false, 'target'=>'_blank')
			);
			
		echo $this->Html->link( // HIPAA Secure Now!
					'<div class="dashBox">' . 
					'<div class="dashHead">' .
					$this->Html->image('hsn60x60.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Secure Now!'
								)) .
					'<h3>HIPAA Secure Now!</h3>' .
					'</div>' .
					'<div class="dashSum">Service Overview</div>' . $dashBtn .
					'</div>', 'http://www.hipaasecurenow.com/index.php/service/', 
					array('escape' => false, 'target'=>'_blank')
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
