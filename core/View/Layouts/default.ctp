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
		echo $this->Html->meta('favicon.ico', '/img/favicon.ico', array('type' => 'icon'));
		echo $this->Html->css(array(
			'base',
			'styles',
			Configure::read('App.brand'),
			'/js/lib/jquery-social-stream/css/dcsns_light.css',
			'https://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css'
		));
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
			<?php echo $this->Html->image(Configure::read('Theme.logo'), array(
					'alt' => Configure::read('Theme.copyright'),
					'url' => array('controller' => '/'),
					'class' => 'logo floatLeft'
					));
				  if (isset($partner)) {
				  	$img = '../files/partner/logo/' . $partner['Partner']['logo_dir'] . '/' . $partner['Partner']['logo'];
				  	echo $this->Html->image($img, array(
				        'alt' => $partner['Partner']['name'],
				        'url' => $partner['Partner']['link'],
				  		'class' => 'logo partnerLogo'
				  	));
				  }
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
				<?php echo Configure::read('Theme.copyright'); ?> Copyright &copy; <?php echo $year; ?>
			</div>
		</div>

	</div>
	<?php echo $this->Html->script("require.js"); ?>
	<script>
		require(['/js/bootstrap.js'], function(){
			require(['app/<?php echo $javascriptModule; ?>', 'app/social']);
		});
	</script>
	<?php
	//echo Configure::version();
	//echo $this->element('sql_dump');
	?>
</body>
</html>
