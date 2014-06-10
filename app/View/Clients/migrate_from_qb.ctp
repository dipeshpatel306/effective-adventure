<?php
$this->Html->addCrumb('Clients', '/clients');
$this->Html->addCrumb('Migrate QB Client');
?>
<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
    <fieldset>
        <legend><?php echo __('Migrate QB Client'); ?></legend>
    <?php 
        echo $this->Form->select('rid', $qb_clients);
    ?>
   </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
    </ul>
</div>
