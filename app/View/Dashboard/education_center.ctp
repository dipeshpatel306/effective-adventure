<?php
$this->Html->addCrumb('Education Center');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id'); 
	$acct = $this->Session->read('Auth.User.Client.account_type');

	$watch = '<div class="dashBtn approved">
						<div class="btnWrapMed">
						<div class="btnText">Watch Now</div> 
						<div class="triangle"></div>
						</div>
					</div>';
		
	
?>
<div class="dashboard index">
	<h2><?php echo __('Education Center'); ?></h2>
	
	<div id="videooverlay"></div>
		<div id="videocontainer">
	<div class='closeVideo'>Close [x]</div>
	
	<center>
	<div id="mediaplayer"></div>
	<p class='imgsub'>Click on <img title="Fullscreen" src=
	"http://www.hipaasecurenow.com/wp-content/uploads/2011/05/Fullscreen.png"
	alt="" width="30" height="21" /> above to view in fullscreen
	mode!</p>
	</center>
	</div>
	
	<!--<div class='trainingLink'>
	<?php echo $this->Html->link('Click here to access the HIPAA Security Training ', 'http://training.hipaasecurenow.com/login/index.php'); ?>
	</div>-->
	
<?php		
	echo $this->Html->link( 
		'<div class="dashBox">' . 
		'<div class="dashHead">' .
			$this->Html->image('training_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Security Training'
								)) .
			'<h3>Education Video</h3>' .
			'</div>' .
			'<div class="dashSum">HIPAA Security Training</div>' . $watch .
			'</div>', 'http://training.hipaasecurenow.com/login/index.php',
			//array('controller' => 'dashboard', 'action' => 'education_center', '#'),
			array('escape' => false, 'target' => '_blank')
			);
?>	

	<div class="dashBox whatIsHipaa1">
	<div class="dashHead">
	<?php echo  $this->Html->image('movie.png', array('class' => 'dashTile', 'alt' => 'What is Hipaa? Pt. 1')); ?>
	<h3>Education Video</h3>
	</div>
	<div class="dashSum">What is HIPAA? Part 1</div><?php echo $watch; ?>
	</div>
	
	<div class="dashBox whatIsHipaa2">
	<div class="dashHead">
	<?php echo  $this->Html->image('movie.png', array('class' => 'dashTile', 'alt' => 'What is Hipaa? Pt. 2')); ?>
	<h3>Education Video</h3>
	</div>
	<div class="dashSum">What is HIPAA? Part 2</div><?php echo $watch; ?>
	</div>	
	
	<div class="dashBox 10things">
	<div class="dashHead">
	<?php echo  $this->Html->image('movie.png', array('class' => 'dashTile', 'alt' => '10 Things you can do to protect patient data')); ?>
	<h3>Education Video</h3>
	</div>
	<div class="dashSum">10 things you can do to protect patient data</div><?php echo $watch; ?>
	</div>	
	
<?php		
	echo $this->Html->link( 
		'<div class="dashBox">' . 
		'<div class="dashHead">' .
			$this->Html->image('movie.png', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Security Tips and Reminders'
								)) .
			'<h3>Education Video</h3>' .
			'</div>' .
			'<div class="dashSum">HIPAA Security Tips and Reminders</div>' . $watch .
			'</div>', 'http://www.hipaasecurenow.com/index.php/security-tips-and-reminders',
			//array('controller' => 'dashboard', 'action' => 'education_center', '#'),
			array('escape' => false, 'target' => '_blank')
			);
?>

	<div class="dashBox overview">
	<div class="dashHead">
	<?php echo  $this->Html->image('movie.png', array('class' => 'dashTile', 'alt' => 'Service Overview')); ?>
	<h3>Education Video</h3>
	</div>
	<div class="dashSum">Service Overview</div><?php echo $watch; ?>
	</div>	
	


	<!--<div class="whatIsHipaa1">What is hipaa1</div>
	<div class="whatIsHipaa2">What is Hipaa2</div>
	<div class="bestPractices">Best Practices</div>	
	<?php echo $this->Html->link('http://www.hipaasecurenow.com/index.php/security-tips-and-reminders', array('target' => '_blank')); ?>
	<div class="overview">Overview</div>-->	

</div>
<div class="actions newsFeed">
	<h3><?php echo __('Latest News'); ?></h3>
	<!--<ul>
		<li><?php echo $this->Html->link(__('New Dashboard'), array('action' => 'add')); ?></li>
	</ul>-->
	<?php echo $this->element('feeds'); ?>
</div>
