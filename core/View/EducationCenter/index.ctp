<?php
$this->Html->addCrumb('Education Center');
$acct = $this->Session->read('Auth.User.Client.account_type');
$training_name = Configure::read('Theme.training_name');
?>
<div class="educationCenter index">
	<h2><?php echo __('Education Center'); ?></h2>
	<?php
		echo $this->element('video_overlay');
		if ($acct != 'Meaningful Use') {
			$mu_btn = 'approved';
			$mu_link = array('action' => 'training');
		} else {
			$mu_btn = 'subscribers';
			$mu_link = array('action' => 'index');
		}
	
		echo $this->element('tile', array(
			'img' => array('file' => 'training_tile.jpg', 'alt' => $training_name),
			'heading' => $training_name,
			'text' => $training_name,
			'button' => $mu_btn,
			'link' => $mu_link
		));
		
		if ($acct == 'AYCE Training') {
			echo $this->element('tile', array(
				'img' => array('file' => 'training_tile.jpg', 'alt' => 'Security Tips'),
				'heading' => 'Security Tips',
				'text' => 'Security Tips',
				'link' => 'http://security.pii-protect.com/security-tips-and-reminders/'
			));
		}
		
		foreach ($educationCenter as $ed) {
			$props = array(
				'img' => array('file' => 'training_tile.jpg', 'alt' => $training_name),
				'heading' => $ed['EducationCenter']['header'],
				'text' => $ed['EducationCenter']['name'],
				'link' => '#'
			);
			
			$button_text = 'Learn More';
			if ($ed['EducationCenter']['video_link'] == 'Link') {
				$props['link'] = $ed['EducationCenter']['link'];
			} elseif ($ed['EducationCenter']['video_link'] == 'Video') {
				$props['class'] = 'eduVideo';
				$props['id'] = $ed['EducationCenter']['video'];
				$button_text = 'Watch Now';
 			}
			$props['button'] = $this->element('button', array('approved' => true, 'text' => $button_text, 'wrap' => 'btnWrapMed'));
			echo $this->element('tile', $props);
		}
	?>
</div>
<div class="actions">
	<?php echo $this->element('quickLinks'); ?>
</div>
