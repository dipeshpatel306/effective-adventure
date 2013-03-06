<?php
$this->Html->addCrumb('Education Center', '/education_center/admin_index');
$this->Html->addCrumb('Education Center View' . ' ' . $educationCenter['EducationCenter']['name']);
?>

<div class="educationCenter view">
<h2><?php  echo __('Education Center'); ?></h2>

	<div id="videooverlay"></div>
		<div id="videocontainer">
		<div class='closeVideo'>Close [x]</div>

		<div id="mediaplayer"></div>
		<p class='imgsub'>Click on <img title="Fullscreen" src="http://www.hipaasecurenow.com/wp-content/uploads/2011/05/Fullscreen.png"
		alt="" width="30" height="21" /> above to view in fullscreen mode!</p>
	
		</div>	

	<dl>
		<dt><?php echo __('Header'); ?></dt>
		<dd>
			<?php echo h($educationCenter['EducationCenter']['header']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($educationCenter['EducationCenter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media Type'); ?></dt>
		<dd>
			<?php echo h($educationCenter['EducationCenter']['video_link']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Video'); ?></dt>
		<dd class='eduVideo'>
			<a id='<?php echo $educationCenter['EducationCenter']['video']; ?>'><?php echo $educationCenter['EducationCenter']['video']; ?></a>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo $this->Html->link($educationCenter['EducationCenter']['link'], null ,array('target' => '_blank')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', ($educationCenter['EducationCenter']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a', ($educationCenter['EducationCenter']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Education Center'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Education Center'), array('action' => 'add')); ?> </li>		
		<li><?php echo $this->Html->link(__('Edit Education Center'), array('action' => 'edit', $educationCenter['EducationCenter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Education Center'), array('action' => 'delete', $educationCenter['EducationCenter']['id']), null, __('Are you sure you want to delete # %s?', $educationCenter['EducationCenter']['id'])); ?> </li>

	</ul>
</div>
