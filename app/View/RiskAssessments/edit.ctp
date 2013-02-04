<div class="riskAssessments form">
<?php echo $this->Form->create('RiskAssessment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Risk Assessment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('client_id');
		echo $this->Form->input('question_1');
		echo $this->Form->input('question_2');
		echo $this->Form->input('question_3');
		echo $this->Form->input('question_4');
		echo $this->Form->input('question_5');
		echo $this->Form->input('question_6');
		echo $this->Form->input('question_7');
		echo $this->Form->input('question_8');
		echo $this->Form->input('question_9');
		echo $this->Form->input('question_10');
		echo $this->Form->input('question_11');
		echo $this->Form->input('question_12');
		echo $this->Form->input('question_13');
		echo $this->Form->input('question_14');
		echo $this->Form->input('question_15');
		echo $this->Form->input('question_16');
		echo $this->Form->input('question_17');
		echo $this->Form->input('question_18');
		echo $this->Form->input('question_19');
		echo $this->Form->input('question_20');
		echo $this->Form->input('question_21');
		echo $this->Form->input('question_22');
		echo $this->Form->input('question_23');
		echo $this->Form->input('question_24');
		echo $this->Form->input('question_25');
		echo $this->Form->input('question_26');
		echo $this->Form->input('question_27');
		echo $this->Form->input('question_28');
		echo $this->Form->input('question_29');
		echo $this->Form->input('question_30');
		echo $this->Form->input('question_31');
		echo $this->Form->input('question_32');
		echo $this->Form->input('question_33');
		echo $this->Form->input('question_34');
		echo $this->Form->input('question_35');
		echo $this->Form->input('question_36');
		echo $this->Form->input('question_37');
		echo $this->Form->input('question_38');
		echo $this->Form->input('question_39');
		echo $this->Form->input('question_40');
		echo $this->Form->input('question_41');
		echo $this->Form->input('question_42');
		echo $this->Form->input('question_43');
		echo $this->Form->input('question_44');
		echo $this->Form->input('question_45');
		echo $this->Form->input('question_46');
		echo $this->Form->input('question_47');
		echo $this->Form->input('question_48');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RiskAssessment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RiskAssessment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Risk Assessments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
