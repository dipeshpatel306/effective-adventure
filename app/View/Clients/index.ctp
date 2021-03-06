<?php
$this->Html->addCrumb('Clients');
?>
<div class="clients index">
	<h2 class='floatLeft'><?php echo __('Clients'); ?></h2>
	<div class='floatRight indexSearch'>
		<?php 
			echo $this->Form->create();
			echo $this->Form->input('search', array('label' => false, 'div' => false)); 
			echo $this->Form->end(array(
				'label' => 'Search',
				'div' => 'floatRight submit'
				// 'class' => 'submit'
			));
		?>
	</div>
	<div class='clear'></div>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('account_type'); ?></th>

			<th><?php echo $this->Paginator->sort('admin_account', 'Admin Code'); ?></th>
			<th><?php echo $this->Paginator->sort('user_account', 'User Code'); ?></th>
			<th><?php echo $this->Paginator->sort('risk_assessment_status', 'RA Completed'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active', 'Active?'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($clients as $client): ?>
	<tr>
		<td><?php echo ($client['Client']['name']); ?>&nbsp;</td>
		<td><?php echo ($client['Client']['account_type']); ?>&nbsp;</td>


		<td><?php echo ($client['Client']['admin_account']); ?>&nbsp;</td>
		<td><?php echo ($client['Client']['user_account']); ?>&nbsp;</td>
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
		<td><?php echo $this->Time->format('m/d/y g:i a', $client['Client']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('m/d/y g:i a', $client['Client']['modified']); ?>&nbsp;</td>

		<?php if(!$client['Client']['active']){
			$active = 'class="inactive"';
		} else {
			$active = 'class="active"';
		}
		?>
		<td <?php echo $active; ?>>
			<?php echo ($client['Client']['active'] ? 'Yes' : 'No'); ?>&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $client['Client']['id'])); ?>
			<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Client', 'id' => $client['Client']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Migrate QB Client'), array('action' => 'migrate_from_qb')); ?></li>
	</ul><ul>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
