<?php
$this->Html->addCrumb(Configure::read('Theme.about_title'));
?>
<div class="dashboard index">
	<h2><?php echo $about['Dashboard']['title']; ?></h2>

<?php echo $about['Dashboard']['body']; ?>
	
</div>
<?php echo $this->element('newsFeed'); ?>