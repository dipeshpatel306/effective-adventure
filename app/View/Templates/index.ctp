<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Templates', '/templates');
$this->Html->addCrumb('Templates');

// Conditionally load buttons based upon user role
	$group = $this->Session->read('Auth.User.group_id');
	$acct = $this->Session->read('Auth.User.Client.account_type');
?>

<div class="templates index">
	<h2><?php echo __('Templates'); ?></h2>
	<?php foreach ($categories as $category) : ?>
	    <?php 
	    	$txt = $category['TemplateCategory']['name'];
	    	if ($group == Group::ADMIN) {
	    		$txt = $this->Html->link($txt, array('controller' => 'template_categories', 'action' => 'view', $category['TemplateCategory']['id']));
			}
	    	echo "<hr><h3>$txt</h3>"; 
	    ?>
        <table>
        <tr>
            <th class='templateName'><?php echo __('Name'); ?></th>
			<th class='templateDescription'><?php echo __('Description'); ?></th>
			<th class='templateAttachment'><?php echo __('Attachment'); ?></th>
			<th class='templateCreated'><?php echo __('Created'); ?></th>
			<th class='templateModified'><?php echo __('Modified'); ?></th>
			<th class="actions templateActions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($category['Template'] as $template) : ?>
            <tr>
                <td><?php echo $template['name']; ?></td>
				<td><?php echo $template['description']; ?></td>
				<td>
				<?php
		
					if(!empty($template['attachment'])){
						$dir = $template['attachment_dir'];
						$file = $template['attachment'];
						echo $this->Html->link($template['attachment'], array('action' => 'sendFile', $dir, $file));
					}
		
				?>
				&nbsp;</td>
				<td><?php echo $this->Time->format('m/d/y g:i a', $template['created']); ?></td>
				<td><?php echo $this->Time->format('m/d/y g:i a', $template['modified']); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'templates', 'action' => 'view', $template['id'])); ?>
					<?php 
						if ($group == Group::ADMIN) {
							echo $this->Html->link(__('Edit'), array('controller' => 'templates', 'action' => 'edit', $template['id']));
							echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Template', 'id' => $template['id']));
						}
					 ?>
				</td>
            </tr>
        <?php endforeach; ?>
        </table><br />
	    <?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if($group == 1): ?>
		<li><?php echo $this->Html->link(__('List Template Categories'), array('controller' => 'template_categories', 'action' => 'index')); ?></li>
		<lI><?php echo $this->Html->link(__('New Template Category'), array('controller' => 'template_categories', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?></li>
		<?php endif; ?>
	</ul>
</div>
