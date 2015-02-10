<?php
$this->Html->addCrumb('Information Center');

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
					'<div class="dashSum">Policies and Procedures</div>'  . $approved .
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
					'<div class="dashSum">Risk Assessments</div>' . $approved .
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
					'<div class="dashSum">Security Training</div>' . $approved .
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
					'<div class="dashSum">HIPAA Audits</div>' . $approved .
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
					'<div class="dashSum">What to do if you get audited</div>'  . $approved .
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
					'<div class="dashSum">Practice Administrators Role w/ HIPAA</div>' . $approved .
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
					'<div class="dashSum">Breach Notification</div>' . $approved .
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
					'<div class="dashSum">Service Overview</div>' . $approved .
					'</div>', 'http://www.hipaasecurenow.com/index.php/service/', 
					array('escape' => false, 'target'=>'_blank')
			);
?>



	
</div>
<div class="actions newsFeed">
	<?php echo $this->element('quickLinks'); ?>
</div>
