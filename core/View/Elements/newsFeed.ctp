<?php
if (isset($class)) {
	$classname = $class . ' newsFeed';
} else {
	$classname = 'newsFeed';
}
if (Configure::read('Theme.display_news')): ?>
<div class=<?php echo $classname; ?>>
    <h3><?php echo __('Latest News'); ?></h3>
    <?php echo $this->element('feeds'); ?>
</div>
<?php endif; ?>