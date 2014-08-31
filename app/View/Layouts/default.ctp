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
		echo $this->Html->meta('favicon.ico', $this->webroot . '/img/favicon.ico', array('type' => 'icon'));
		echo $this->Html->css(array('base', '/js/lib/jquery-social-stream/css/dcsns_light.css', 'styles', 'http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css'));
    	if(($this->params['controller']=='risk_assessments'||$this->params['controller']=='organization_profiles')&&$this->params['action']=='view'){
      		echo $this->Html->css(array('print'), 'stylesheet', array('media' => 'print'));
    	}		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
	    document.documentElement.className = 'js';
	</script>
</head>
<body>
	<div id="container">
		<div id="wrapper">
		<div id="header">
			<?php echo $this->Html->image('hipaa_logo.png', array(
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
			<?php  //echo $this->element('navigation'); ?>
			<?php echo $this->element('navBar'); ?>

		</div>

		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>

		</div>
		</div><!--wrapper -->
		<div id="footer">
			<div class='footerContent'>
				HIPAA Secure Now! Copyright &copy; <?php echo $year; ?>
			</div>
		</div>

	</div>
	<?php echo $this->Html->script("require.js"); ?>
	<script>
		require(['/js/bootstrap.js'], function(){
			require(['app/<?php echo $javascriptModule; ?>', 'app/social']);
		});
	</script>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="../js/jquery-1.9.0.min.js"><\/script>')</script>
	<?php echo $this->Html->script(array(
										 '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js',
										 //'jquery-ui-1.10.0.custom/js/jquery-ui-1.10.0.custom.min.js',
										 'ckeditor/ckeditor.js',
										 'jwplayer/jwplayer.js',
										 'slides.min.jquery.js',
										 'jquery-social-stream/js/jquery.social.stream.1.5.min.js',
										 'jquery.maskedinput.min.js',
										 'ui.tabs.paging.js',
										 'scripts',
	)); ?>
	<script type='text/javascript'>
	    $(document).ready(function() {
	        $('.fouc').show();
	        $('.raTabs.tabsInner').tabs('paging', {followOnActive : true, follow: true});
	        $('.orgProfTabs').tabs('paging', {followOnActive : true, follow: true});
	    });
	</script> -->
	<?php
	//echo Configure::version();
	//echo $this->element('sql_dump');
	?>
</body>
</html>
