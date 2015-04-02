<?php
$pnp_name = Configure::read('Theme.pnp_name');

$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb($pnp_name, '/policies_and_procedures');
$this->Html->addCrumb($policiesAndProcedure['PoliciesAndProcedure']['name']);

	$group = $this->Session->read('Auth.User.group_id');
?>

<div class="policiesAndProcedures view">
<h2><?php  echo __($pnp_name); ?></h2>

	<?php echo $this->element('video_overlay'); ?>
	
	<dl>
		<dt><?php echo __('Policy'); ?></dt>
		<dd>
			<?php echo ($policiesAndProcedure['PoliciesAndProcedure']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo ($policiesAndProcedure['PoliciesAndProcedure']['name']); ?>
			&nbsp;
		</dd>
	</dl>

	<h2><?php echo __('Description'); ?></h2>
	<?php echo $policiesAndProcedure['PoliciesAndProcedure']['description']; ?>

	<h2><?php echo __('Details'); ?></h2>
	<?php echo $policiesAndProcedure['PoliciesAndProcedure']['details']; ?>

<div class="related">
	<h2><?php echo __('Policies And Procedures Documents'); ?></h2>
	<?php  if (!empty($policiesAndProcedure['PoliciesAndProceduresDocument'])): ?>
	<table>
	<tr>

		<th><?php echo __('Document'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<?php if($group != 3): ?>
		<th class="actions"><?php echo __('Actions'); ?></th>
		<?php endif; ;?>
	</tr>
	<?php
		$i = 0;
		foreach ($documents as $policiesAndProceduresDocument): ?>
		<tr>
			<td>
		<?php
			if(!empty($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment'])){
				$dir = $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment_dir'];
				$file = $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment'];

				$opnpLink =  preg_replace('/\/.*\//', '', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment']);
				echo $this->Html->link($policiesAndProceduresDocument['PoliciesAndProceduresDocument']['attachment'], array(
					'controller' => 'policies_and_procedures_documents',
					'action' => 'sendFile', $dir, $file));
			}
		?>
			</td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['created']); ?></td>
			<td><?php echo $this->Time->format('m/d/y g:i a',$policiesAndProceduresDocument['PoliciesAndProceduresDocument']['modified']); ?></td>
		<?php if($group != 3): ?>
			<td class="actions">
				
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'policies_and_procedures_documents', 'action' => 'edit',$policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?>
				<?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Policy & Procedure Document', 'id' => $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?>
			</td>
		<?php endif ?>
		</tr>
	<?php endforeach; ?>
	</table>
<?php  endif; ?>
<?php if (Configure::read('Theme.pnp_show_videos')) : ?>
		<div class='papVideo' >
		<h2><?php echo __('Video Summary'); ?></h2>

			<?php echo $this->Html->image('movie2.png')?>
			 Watch a short interactive movie that summarizes this policy or procedure. <br />

			<a class="policyName" id='<?php echo $policiesAndProcedure['PoliciesAndProcedure']['id']; ?>'>View Movie for Policy <?php echo $policiesAndProcedure['PoliciesAndProcedure']['id']; ?></a>
		</div>
<?php endif; ?>
	<br /><br />
</div>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('action' => 'index')); ?> </li>
	</ul>
	
	<?php if($group == 1): ?>
	<ul>
		
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('Edit Policies And Procedures'), array('action' => 'edit', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?> </li>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete Policy & Procedure', 'name' => 'Policy & Procedure', 'id' => $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?></li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
</div>

