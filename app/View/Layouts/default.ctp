<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('styles');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
	
		<div id="header">
			<?php echo $this->Html->image('hsn_logo.gif', array(
					'alt' => 'HIPAA',
					'url' => array('controller' => '/'),
					'class' => 'logo'
					))
			?>
			<?php // Show Admin Nav if Administrator 
				if(($this->Session->read('Auth.User.group_id') == 1)){
					echo $this->element('admin_nav');	
				}
			?>
				
			<?php echo $this->element('userBox'); ?>
		</div>
		<div class='navWrap'>
			<?php echo $this->element('navigation'); ?>
		</div>
		
	
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			
			<!--<?php // Temp debug code
				$auth = $this->Session->read('Auth.User');
				print "<pre>";
				print_r($auth);
				print "</pre>";
			?>-->
			
			<?php echo $this->fetch('content'); ?>
		</div>
		
		<div id="footer">
		<?php 
			ini_set('date.timezone', 'America/New_York');
			$year = date('Y');
		?>
		Copyright &copy; <?php echo $year; ?> HIPAA Secure Now! All Rights Reserved
		</div>
	
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="../js/jquery-1.8.3.min.js"><\/script>')</script>
	
	<?php  echo $this->element('sql_dump'); ?>
</body>
</html>
