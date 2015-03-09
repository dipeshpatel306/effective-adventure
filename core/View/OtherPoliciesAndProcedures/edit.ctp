<?php
App::uses('Group', 'Model');
// Conditionally load buttons based upon user role
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');

if ($group == Group::PARTNER_ADMIN) {
	$this->Html->addCrumb('Other Policies & Procedures');
} else {
	if ($acct != 'Initial') {
		$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
	}
	$this->Html->addCrumb('Other Policies & Procedures', '/other_policies_and_procedures');
}
$this->Html->addCrumb('Edit Other Policy & Procedure');
?>
<div class="otherPoliciesAndProcedures form">
<?php echo $this->Form->create('OtherPoliciesAndProcedure', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Other Policies And Procedure'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description', array('type' => 'text', 'rows' => '5', 'cols' => '40'));
		echo $this->Form->input('details', array('type' => 'text', 'rows' => '5', 'cols' => '40'));

		$client = $this->Session->read('Auth.User.client_id');  // Test Client.
		if($group == Group::ADMIN || $group == Group::PARTNER_ADMIN){  // if admin allow to choose
			echo $this->Form->input('client_id', array('empty' => 'Please Select'));
		} else {
			echo $this->Form->input('client_id', array( 'default' => $client, 'type' => 'hidden'));
		}
?>
		<label for='currentDoc' class='labelNew'>Current Document</label>
		<div class='currentDoc'><?php echo $doc ?></div>
<?php 
		echo $this->Form->input('attachment', array('type' => 'file', 'label' => 'Replace Document'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
		// /echo $this->Form->input('media');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ($group == Group::PARTNER_ADMIN): ?>
		<li><?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $this->request->data['OtherPoliciesAndProcedure']['client_id'])); ?></li>
		<?php else: ?>
		<li><?php echo $this->Html->link(__('List Other Policies And Procedures'), array('action' => 'index')); ?></li>

		<?php if($group == 1 || $group == 2): ?>
		<li><?php echo $this->element('delete_link', array('title' => 'Delete', 'name' => 'Other Policy & Procedure', 'id' => $this->Form->value('OtherPoliciesAndProcedure.id'))); ?></li>
		<?php endif; ?>
		<?php endif; ?>

	</ul>
</div>
