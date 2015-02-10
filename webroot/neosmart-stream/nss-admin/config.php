<?php
	$current_page = 'config';
	include "header.inc.php";	
?>

	<h2 id="marker-config">Configuration</h2>
	<form class="nss-admin-form" method="post">
		<input type="hidden" name="action" value="update_config">
		<input type='hidden' name='nss_root' value='<?php echo getNssRoot(); ?>'>
		<div class='row'>
			<label>Debug mode</label>
			<div class="field-area">
				<input type="radio" value="1" name="debug_mode" <?php if($nss->get('debug_mode')===true) echo "checked='checked'"; ?>/> On
				<input type="radio" value="0" name="debug_mode" <?php if($nss->get('debug_mode')===false) echo "checked='checked'"; ?>/> Off
				<div class="field-info">If debug mode is on, you see warnings and errors on top of your stream.</div>
			</div>
		</div>
		<div class='row hl'>
			<label>Date format</label>
			<div class="field-area">
				<input name='date_time_format' type='text' class='text' value='<?php echo $date_time_format; ?>'>
				<div class="field-info">Here you can change the date/time format. Check out the <a href="http://php.net/manual/de/function.date.php" target="_blank">PHP date manual</a>.</div>
			</div>
		</div>
		<div class='row hl'>
			<label>Admin Link</label>
			<div class="field-area">
				<input type="radio" value="1" name="show_admin_link" <?php if($nss->get('show_admin_link')===true) echo "checked='checked'"; ?>/> Show
				<input type="radio" value="0" name="show_admin_link" <?php if($nss->get('show_admin_link')===false) echo "checked='checked'"; ?>/> Hide
				<div class="field-info">Would you like to display an admin link at the bottom of your stream?</div>
			</div>
		</div>
		<h3>Cache time</h3>
		<div class='row'>
			<label>Channel</label>
			<div class="field-area">
				<input name='cache_time' type='number' class='text' min="10" value='<?php echo $cache_time; ?>'>
				<div class="field-info">Time to wait in seconds, before neosmart STREAM trys to refresh the cache.<br /><b>Default: 60</b> (once a minute)</div>
			</div>
		</div>
		<div class='row'>
			<label>Profile</label>
			<div class="field-area">
				<input name='cache_time_profile' type='number' class='text' min="30" value='<?php echo $nss->get('cache_time_profile'); ?>'>
				<div class="field-info">Time to wait in seconds, before neosmart STREAM trys to refresh the profile cache.<br /><b>Default: 86400</b> (once a day)</div>
			</div>
		</div>
		<h3>Animation time</h3>
		<div class='row'>
			<label>Intro</label>
			<div class="field-area">
				<input name='intro_fadein' type='number' class='text' min="0" value='<?php echo $nss->get('intro_fadein'); ?>'>
				<div class="field-info">Animation time in milliseconds for fadeIn your stream.<br /><b>Default: 700</b></div>
			</div>
		</div>
		
		
		<div class='row hl'>
			<a id='cancel-1' href='<?php echo $_SERVER['PHP_SELF']; ?>' class='cancel button'>Cancel changes</a>
			<input class='submit' type='submit' value='Save Configuration'>
		</div>
	</form>
	
	<h2 id="marker-reset">Total reset</h2>	
	<form  class="nss-admin-form" method="post">
		<input type="hidden" name="action" value="total_reset">
		<div class='row'>
			Deactivate license key for this site, delete all configuration files, all channels and all cache files (delivery status)
			<div class="field-info">CAUTION: Process can not be undone!</div>
		</div>
		<div id="pre-reset" class='row hl'>
			<a href='javascript://' onclick="$('#total-reset').show();$('#pre-reset').hide();" class='cancel button'>Total Reset</a>
		</div>
		<div id="total-reset" class='row hl' style="display:none;">
			<div class="warning inline-status">Do you really want to do this? CAUTION: Process can not be undone!</div>
			<a href='javascript://' onclick="$('#pre-reset').show();$('#total-reset').hide();" class='cancel button'>Cancel</a>
			<input class='submit' type='submit' value='Total Reset'>
		</div>
	</form>
	
<?php
	include "footer.inc.php";
?>