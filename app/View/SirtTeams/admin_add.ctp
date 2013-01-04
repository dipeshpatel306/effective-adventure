<div class="sirtTeams form">
<?php echo $this->Form->create('SirtTeam'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Sirt Team'); ?></legend>
	<?php
		echo $this->Form->input('company_name');
		echo $this->Form->input('address_1');
		echo $this->Form->input('address_2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('phone');
		echo $this->Form->input('website');
		echo $this->Form->input('client_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sirt Teams'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sirt Members'), array('controller' => 'sirt_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sirt Member'), array('controller' => 'sirt_members', 'action' => 'add')); ?> </li>
	</ul>
</div>
