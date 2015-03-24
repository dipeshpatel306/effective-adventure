<?php
$this->Html->addCrumb('Education Center');

	$acct = $this->Session->read('Auth.User.Client.account_type');
	$training_name = Configure::read('Theme.training_name');
?>
<div class="educationCenter index">
	<h2><?php echo __('Education Center'); ?></h2>

    <?php echo $this->element('video_overlay'); ?>
	
	<?php if($acct != 'Meaningful Use'): // allow if not meaningful?>
		
	<a href='/education_center/training'>
	<div class='dashBox'>
		<div class='dashHead'>
			<?php 
				echo $this->Html->image('training_tile.jpg', array(
						'class' => 'dashTile',
						'alt' => $training_name
				));
			?>
			<h3><?php echo $training_name; ?></h3>		
		</div>
		<div class="dashSum"><?php echo $training_name; ?></div>
		
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
						'alt' => $training_name
				));
			?>
			<h3><?php echo $training_name; ?></h3>		
		</div>
		<div class="dashSum"><?php echo $training_name; ?></div>
		
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
				$name_mapping = array(
					'What is HIPAA? Part 1' => 'PII Security Part 1',
					'What is HIPAA? Part 2' => 'PII Security Part 2',
					'10 Things you can do to protect patient data' => '10 things you can do to protect PII',
					'HIPAA Security Tips and Reminders' => 'Security Tips and Reminders',
					'Service Overview' => 'Service Overview'
				);
				if($educationCenter['EducationCenter']['name'] == 'HIPAA Security Training'){
					echo $this->Html->image('training_tile.jpg', array(
							'class' => 'dashTile',
							'alt' => $training_name
					));
				} else {
					echo  $this->Html->image('movie.png', array('class' => 'dashTile'));
				}

			 ?>
			<h3>
			<?php 
				$header = $educationCenter['EducationCenter']['header'];
				if ($header == 'HIPAA Secure Now! Video') {
					$header = 'PII Protect Video';
				}
				echo $header;
			?>
			</h3>
		</div>
		<div class="dashSum"><?php echo $name_mapping[$educationCenter['EducationCenter']['name']]; ?></div>
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
