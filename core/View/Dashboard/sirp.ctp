<?php
$this->Html->addCrumb('SIRP');
?>
<div class="dashboard index">
	<h2><?php echo __('SIRP'); ?></h2>



	
</div>
<div class="actions newsFeed">
	<h3><?php echo __('Latest News'); ?></h3>
	<?php echo $this->element('feeds'); ?>
</div>
