<?php 
	ini_set('date.timezone', 'America/New_York');
	$year = date('Y');
?>
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
		echo '<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />';
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="wrapper">
		<div id="header">
			<?php echo $this->Html->image('hsn_logo.gif', array(
					'alt' => 'HIPAA',
					'url' => array('controller' => '/'),
					'class' => 'logo'
					))
			?>

			<?php // Load User Box if logged in
			if ($logged_in){
				echo $this->element('userBox');
			}
			?>
		</div>
		<div class='navWrap'>
			<?php // echo $this->element('navigation'); ?>
			
			<?php // Breadcrumbs
				if($this->here != ('/hipaa/users/login') ){ // TODO fix link for production
					echo $this->Html->getCrumbs(' > ', 'Home'); 
				}
			?>
			
		</div>
		
	
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			
			<?php // Temp debug code
			/*	$auth = $this->Session->read('Auth');
				echo "<pre>";
				print_r($auth);
				echo "</pre>";*/
				//echo Configure::version();
			?>
			<?php echo $this->fetch('content'); ?>
		</div>
		</div><!--wrapper -->
		<div id="footer">
			<div class='footerContent'>
				HIPAA Secure Now! Copyright &copy; <?php echo $year; ?>
			</div>
		</div>
	
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="../js/jquery-1.9.0.min.js"><\/script>')</script>
	<?php echo $this->Html->script(array('ckeditor/ckeditor.js', 
										 '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js',
										 'jquery-navigator/jquery.sectionnavigator.js',
										 'scripts')); ?>
	<?php  echo $this->element('sql_dump'); ?>
</body>
</html>
