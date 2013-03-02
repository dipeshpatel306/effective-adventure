<?php
$this->Html->addCrumb('Education Center', '/dashboard/education_center');
$this->Html->addCrumb('Education Center Videos & Links');
?>
<div class="educationCenter index">
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
	
	<?php // Load Hipaa security training		
	echo $this->Html->link( 
		'<div class="dashBox">' . 
		'<div class="dashHead">' .
			$this->Html->image('training_tile.jpg', array(
								'class' => 'dashTile', 
								'alt' => 'HIPAA Security Training'
								)) .
			'<h3>Education Video</h3>' .
			'</div>' .
			'<div class="dashSum">HIPAA Security Training</div>
			<div class="dashBtn approved">
						<div class="btnWrapMed">
						<div class="btnText">Watch Now</div> 
						<div class="triangle"></div>
						</div>
					</div>' .
			'</div>', 'http://training.hipaasecurenow.com/login/index.php',
			//array('controller' => 'dashboard', 'action' => 'education_center', '#'),
			array('escape' => false, 'target' => '_blank')
			);
	?>		
	
	<?php foreach ($educationCenter as $educationCenter): ?>
	
	<?php if($educationCenter['EducationCenter']['video_link'] == 'Link'):?><!-- If link load link -->
		<a target="_blank" href="<?php echo $educationCenter['EducationCenter']['link']; ?>">
	<?php endif; ?>
		
		<div class="dashBox <?php echo $educationCenter['EducationCenter']['video']; ?>">
		<div class="dashHead">
			<?php echo  $this->Html->image('movie.png', array('class' => 'dashTile')); ?>
			<h3><?php echo $educationCenter['EducationCenter']['header']; ?></h3>
		</div>
		<div class="dashSum"><?php echo $educationCenter['EducationCenter']['name']; ?></div>
		<div class="dashBtn approved">
			<div class="btnWrapMed">
			<div class="btnText">Watch Now</div> 
			<div class="triangle"></div>
			</div>
		</div>	
		</div>			
	<?php if($educationCenter['EducationCenter']['video_link'] == 'Video'):?>
		</a>
	<?php endif; ?>

	
	<?php endforeach; ?>


</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>

</div>
