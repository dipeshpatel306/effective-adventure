<?php
$this->Html->addCrumb('What can you do with the HIPAA Secure Now! Compliance Portal');
?>
<div class="dashboard index">
	<h2><?php echo __('What can you do with the HIPAA Secure Now! Compliance Portal'); ?></h2>



	
</div>
<div class="actions newsFeed">
	<h3><?php echo __('Latest News'); ?></h3>
	<!--<ul>
		<li><?php echo $this->Html->link(__('New Dashboard'), array('action' => 'add')); ?></li>
	</ul>-->
	<?php echo $this->element('feeds'); ?>
</div>