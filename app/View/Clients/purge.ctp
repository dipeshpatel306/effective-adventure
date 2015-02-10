<?php
$this->Html->addCrumb('Clients', '/clients');
$this->Html->addCrumb('Purge');
?>
<div class="clients form">
<?php 
  foreach ($clients as $client) {
  	echo "<p>" . $client['Client']['name'] . "</p>";
  }
  echo $this->Form->create('Client');
  echo $this->Form->end(__('Submit')); 
?>
<p>CLIENTS WILL BE DELETED. PROCEED WITH CAUTION.</p>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
    </ul>
</div>
