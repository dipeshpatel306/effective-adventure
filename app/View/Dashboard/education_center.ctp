<?php
$this->Html->addCrumb('Education Center');
?>
<div class="dashboard index">
	<h2><?php echo __('Education Center'); ?></h2>



	
</div>
<div class="actions newsFeed">
	<h3><?php echo __('Latest News'); ?></h3>
	<!--<ul>
		<li><?php echo $this->Html->link(__('New Dashboard'), array('action' => 'add')); ?></li>
	</ul>-->
	<?php echo $this->element('feeds'); ?>
</div>
