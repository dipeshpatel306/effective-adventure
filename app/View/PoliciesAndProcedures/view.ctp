<?php
$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
$this->Html->addCrumb($policiesAndProcedure['PoliciesAndProcedure']['name']);

	$group = $this->Session->read('Auth.User.group_id'); 
?>

<div class="policiesAndProcedures view">
<h2><?php  echo __('Policies And Procedures'); ?></h2>

	<div id="videooverlay"></div>
		<div id="videocontainer">
		<div class='closeVideo'>Close [x]</div>
	
		<center>
		<div id="mediaplayer"></div>
		<p class='imgsub'>Click on <img title="Fullscreen" src="http://www.hipaasecurenow.com/wp-content/uploads/2011/05/Fullscreen.png"
		alt="" width="30" height="21" /> above to view in fullscreen mode!</p>
		</center>
		</div>	

	<dl>
		<dt><?php echo __('Policy'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($policiesAndProcedure['PoliciesAndProcedure']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$policiesAndProcedure['PoliciesAndProcedure']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('m/d/y g:i a',$policiesAndProcedure['PoliciesAndProcedure']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	
	<h2><?php echo __('Description'); ?></h2>
	<?php echo $policiesAndProcedure['PoliciesAndProcedure']['description']; ?>
	
	<?php if(!empty($policiesAndProcedure['PoliciesAndProcedure']['details'])): ?>	
	<h2><?php echo __('Details'); ?></h2>
	<?php echo $policiesAndProcedure['PoliciesAndProcedure']['details']; ?>
	<?php endif; ?>
	
<div class="related">
	<h2><?php echo __('Policies And Procedures Documents'); ?></h2>
	<?php  if (!empty($policiesAndProcedure['PoliciesAndProceduresDocument'])): ?>
	<table>
	<tr>
	
		<th><?php echo __('Client'); ?></th>
		<th><?php echo __('Document'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	//debug ($policiesAndProcedure['PoliciesAndProceduresDocument']);
		$i = 0;
		/*foreach ($policiesAndProcedure['PoliciesAndProceduresDocument'] as $policiesAndProceduresDocument): ?>*/
		foreach ($documents as $policiesAndProceduresDocument): ?>
		<?php //debug($policiesAndProceduresDocument['PoliciesAndProceduresDocument']);?>
		<tr>
			<td><?php echo $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['client_id']; ?></td>
			<td>
			<?php 
				$docLink =  preg_replace('/\/.*\//', '', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document']);
				echo $this->Html->link($docLink, $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document']);
			?>	
			</td>
			<td><?php echo $this->Time->format('m/d/y g:i a', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['created']); ?></td>
			<td><?php echo $this->Time->format('m/d/y g:i a',$policiesAndProceduresDocument['PoliciesAndProceduresDocument']['modified']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['document']); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'policies_and_procedures_documents', 'action' => 'edit',$policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'policies_and_procedures_documents', 'action' => 'delete', $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id']), null, __('Are you sure you want to delete # %s?',  $policiesAndProceduresDocument['PoliciesAndProceduresDocument']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php  endif; ?>

	<?php  if(!empty($policiesAndProcedure['PoliciesAndProcedure']['video_summary'])): ?>
		<div class='papVideo' >		
		<h2><?php echo __('Video Summary'); ?></h2>

			<?php echo $this->Html->image('movie2.png')?>
			 Watch a short interactive movie that summarizes this policy or procedure. <br />
			 
			<a class="policyName">View Movie for
				<span class='videoName'><?php echo ucwords(trim($policiesAndProcedure['PoliciesAndProcedure']['video_summary'])); ?></span>
			</a>
		</div>
		
		
	<?php  endif; ?>
	<br /><br />
</div>		
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php if($group == 1): ?>	
	<ul>
		<li><?php echo $this->Html->link(__('List Policies And Procedures'), array('action' => 'index')); ?> </li>
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('New Policies and Procedures'), array('action' => 'add')); ?> </li>			
		<li><?php echo $this->Html->link(__('Edit Policies And Procedures'), array('action' => 'edit', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Policies And Procedure'), array('action' => 'delete', $policiesAndProcedure['PoliciesAndProcedure']['id']), null, __('Are you sure you want to delete # %s?', $policiesAndProcedure['PoliciesAndProcedure']['id'])); ?> </li>
<br />	<?php endif; ?>

		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'policies_and_procedures_documents', 'action' => 'index')); ?> </li>

		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'policies_and_procedures_documents', 'action' => 'add')); ?> </li>
	</ul>
	<?php endif; ?>
</div>

