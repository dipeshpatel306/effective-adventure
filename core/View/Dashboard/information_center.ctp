<?php $this->Html->addCrumb('Information Center'); ?>

<div class="dashboard index">
	<h2><?php echo __('Information Center'); ?></h2>
	<?php
		echo $this->element('tile', array(
			'img' => array('file' => 'blog.png', 'alt' => 'HIPAA Information'),
			'heading' => 'HIPAA Information',
			'text' => 'Policies and Procedures',
			'link' => 'http://www.hipaasecurenow.com/?cat=10',
			'target' => '_blank'
		));
		
		echo $this->element('tile', array(
			'img' => array('file' => 'blog.png', 'alt' => 'HIPAA Information'),
			'heading' => 'HIPAA Information',
			'text' => 'Risk Assessments',
			'link' => 'http://www.hipaasecurenow.com/?cat=8',
			'target' => '_blank'
		));

		echo $this->element('tile', array(
			'img' => array('file' => 'blog.png', 'alt' => 'HIPAA Information'),
			'heading' => 'HIPAA Information',
			'text' => 'Security Training',
			'link' => 'http://www.hipaasecurenow.com/?cat=9',
			'target' => '_blank'
		));
		
		echo $this->element('tile', array(
			'img' => array('file' => 'blog.png', 'alt' => 'HIPAA Information'),
			'heading' => 'HIPAA Information',
			'text' => 'HIPAA Audits',
			'link' => 'http://www.hipaasecurenow.com/?s=HIPAA+Audits',
			'target' => '_blank'
		));

		echo $this->element('tile', array(
			'img' => array('file' => 'blog.png', 'alt' => 'HIPAA Information'),
			'heading' => 'HIPAA Information',
			'text' => 'What to do if you get audited',
			'link' => 'http://www.hipaasecurenow.com/index.php/you-received-a-hipaa-audit-notification-now-what/',
			'target' => '_blank'
		));

		echo $this->element('tile', array(
			'img' => array('file' => 'blog.png', 'alt' => 'HIPAA Information'),
			'heading' => 'HIPAA Information',
			'text' => 'Practice Administrators Role w/ HIPAA',
			'link' => 'http://www.hipaasecurenow.com/index.php/practice-administrators-are-the-key-to-hipaa-security/',
			'target' => '_blank'
		));

		echo $this->element('tile', array(
			'img' => array('file' => 'hhs.png', 'alt' => 'HHS Information'),
			'heading' => 'HIPAA Information',
			'text' => 'Breach Notification',
			'link' => 'http://www.hhs.gov/ocr/privacy/hipaa/administrative/breachnotificationrule/index.html',
			'target' => '_blank'
		));
		
		echo $this->element('tile', array(
			'img' => array('file' => 'hsn60x60.png', 'alt' => 'HIPAA Secure Now!'),
			'heading' => 'HIPAA Secure Now!',
			'text' => 'Service Overview',
			'link' => 'http://www.hipaasecurenow.com/index.php/service/',
			'target' => '_blank'
		));
?>	
</div>
<div class="actions newsFeed">
	<?php echo $this->element('quickLinks'); ?>
</div>
