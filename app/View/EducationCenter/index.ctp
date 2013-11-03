<?php
$this->Html->addCrumb('Education Center');

	$acct = $this->Session->read('Auth.User.Client.account_type');
?>
<div class="educationCenter index">
	<h2><?php echo __('Education Center'); ?></h2>

	<div id="videooverlay"></div>
		<div id="videocontainer">
		<div class='closeVideo'>Close [x]</div>

		<div id="mediaplayer"></div>
		<p class='imgsub'>Click on <img title="Fullscreen" src="http://www.hipaasecurenow.com/wp-content/uploads/2011/05/Fullscreen.png"
		alt="" width="30" height="21" /> above to view in fullscreen mode!</p>

		</div>
	
	
	<?php if($acct != 'Meaningful Use'): // allow if not meaningful?>
		
	<a target='blank' href='http://training.hipaasecurenow.com/login/index.php'>
	<div class='dashBox'>
		<div class='dashHead'>
			<?php 
				echo $this->Html->image('training_tile.jpg', array(
						'class' => 'dashTile',
						'alt' => 'HIPAA Security Training'
				));
			?>
			<h3>HIPAA Security Training</h3>		
		</div>
		<div class="dashSum">HIPAA Security Training</div>
		<div class="dashBtn approved">
			<div class="btnWrapMed">
			<div class="btnText">Learn More</div>
			<div class="triangle"></div>
			</div>
		</div>		
		
	</div>	
	</a>

	<?php else: // deny ?>

	<div class='dashBox'>
		<div class='dashHead'>
			<?php 
				echo $this->Html->image('training_tile.jpg', array(
						'class' => 'dashTile',
						'alt' => 'HIPAA Security Training'
				));
			?>
			<h3>HIPAA Security Training</h3>		
		</div>
		<div class="dashSum">HIPAA Security Training</div>
		<div class="dashBtn denied">
			<div class="btnWrapWide">
			<div class="btnText">Subscribers Only!</div>
			<div class="triangle"></div>
			</div>
		</div>		
		
	</div>			
		
	<?php endif; ?>	
	
	
	
	
	<?php foreach ($educationCenter as $educationCenter): ?>

	<?php if($educationCenter['EducationCenter']['video_link'] == 'Link'):?><!-- If link wrap in link -->
		<a target="_blank" href="<?php echo $educationCenter['EducationCenter']['link']; ?>">

	<?php endif; ?>

		<div class="dashBox <?php if($educationCenter['EducationCenter']['video_link'] == 'Video'){ echo 'eduVideo';} ?>"
			<?php if($educationCenter['EducationCenter']['video_link'] == 'Video'){ // sets id for jquery video player
				echo 'id="' . $educationCenter['EducationCenter']['video'] . '"';
				$watchLearn = 'Watch Now';
			} else {
				$watchLearn = 'Learn More';
			}
			?>>


		<div class="dashHead">
			<?php
				if($educationCenter['EducationCenter']['name'] == 'HIPAA Security Training'){
					echo $this->Html->image('training_tile.jpg', array(
							'class' => 'dashTile',
							'alt' => 'HIPAA Security Training'
					));
				} else {
					echo  $this->Html->image('movie.png', array('class' => 'dashTile'));
				}

			 ?>
			<h3><?php echo $educationCenter['EducationCenter']['header']; ?></h3>
		</div>
		<div class="dashSum"><?php echo $educationCenter['EducationCenter']['name']; ?></div>
		<div class="dashBtn approved">
			<div class="btnWrapMed">
			<div class="btnText"><?php echo $watchLearn; ?></div>
			<div class="triangle"></div>
			</div>
		</div>
		</div>
	<?php if($educationCenter['EducationCenter']['video_link'] == 'Link'):?>
		</a>
	<?php endif; ?>


	<?php endforeach; ?>


</div>
<div class="actions">
	<?php echo $this->element('quickLinks'); ?>
</div>
