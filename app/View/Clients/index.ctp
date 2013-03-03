<?php
$this->Html->addCrumb('Clients');
?>
<div class="clients index">
	<h2><?php echo __('Clients'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('account_type'); ?></th>			
			<th><?php echo $this->Paginator->sort('admin_account'); ?></th>	
			<th><?php echo $this->Paginator->sort('user_account'); ?></th>	
			<!--<th><?php echo $this->Paginator->sort('body'); ?></th>-->
			<th><?php echo $this->Paginator->sort('Partner'); ?></th>
			<th><?php echo $this->Paginator->sort('risk_assessment_status', 'Risk Assessment Completed'); ?></th>
			<th><?php echo $this->Paginator->sort('last_login'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($clients as $client): ?>
	<tr>
		<td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['account_type']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['admin_account']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['user_account']); ?>&nbsp;</td>
		<td><?php echo h($client['Partner']['name']); ?>&nbsp;</td>
		<!--<td><?php echo h($client['Client']['details']); ?>&nbsp;</td>-->
		<?php
			if(!empty($client['Client']['risk_assessment_status'])){
				$completed = 'class="completed"';
			} else {
				$completed = '';
			}		
		?>
		<td <?php echo $completed; ?> >
		<?php 
			if(!empty($client['Client']['risk_assessment_status'])){
				echo $this->Time->format('m/d/y', $client['Client']['risk_assessment_status']); 
			}		
		?>
		&nbsp;</td>
		<td><?php 
		if($client['Client']['last_login'] == '0000-00-00 00:00:00'){
			echo ''; 
		} else {
			echo $this->Time->format('m/d/y g:i a', $client['Client']['last_login']);
		}
		 ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $client['Client']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $client['Client']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $client['Client']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
