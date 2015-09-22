<?php 
if (!isset($wrap)) {
	$wrap = ($approved ? 'btnWrapNarrow' : 'btnWrapWide');
}
?>
<div class="dashBtn <?php echo ($approved ? 'approved' : 'denied'); ?>">
  <div class="<?php echo $wrap ?>">
    <div class="btnText"><?php echo $text; ?></div>
    <div class="triangle"></div>
  </div>
</div>
