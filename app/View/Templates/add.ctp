<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Templates', '/templates');
$this->Html->addCrumb('Add Template');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
	
	if(isset($clientId)){
		$selected = $clientId;
	} else{
		$selected = '';
		$clientId = '';
	}
?>
<div class="templates form">
<?php echo $this->Form->create('Template', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Template'); ?></legend>
	<?php

		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
		echo $this->Form->input('client_id',array('selected' => $selected, 'empty' => 'Please Select'));
		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Attachment'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
    <div class='submit'>
        <?php 
             echo $this->Form->submit('Save', array('div' => false));
             echo $this->Form->submit('Save and next', array('div' => false, 'class' => 'savenext', 'name' => 'next'));
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?></li>

	</ul>
</div>
