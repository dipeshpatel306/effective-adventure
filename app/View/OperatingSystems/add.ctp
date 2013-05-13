<div class="operatingSystems form">
<?php echo $this->Form->create('OperatingSystem'); ?>
	<fieldset>
		<legend><?php echo __('Add Operating System'); ?></legend>
	<?php
		echo $this->Form->input('os_name');
		echo $this->Form->input('OrganizationProfile');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Operating Systems'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Organization Profiles'), array('controller' => 'organization_profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Profile'), array('controller' => 'organization_profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
