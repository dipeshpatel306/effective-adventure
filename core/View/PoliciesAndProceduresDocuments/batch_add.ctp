<?php
//$this->Html->addCrumb('Policies & Procedures', '/dashboard/policies_and_procedures');
//$this->Html->addCrumb('Policies & Procedures', '/policies_and_procedures');
//$this->Html->addCrumb('Add Policy & Procedure Document');

	//$group = $this->Session->read('Auth.User.group_id');
	
	/*if(!isset($policy)){
		$policy = 1;
	} elseif($policy > 18 || $policy < 1) {
		$this->redirect(array('controller' => 'clients', 'action' => 'view', $clientId));
		$this->Session->setFlash('Policies and Procedures Batch Upload completed for ' . $clientName, 'default', array('class' => 'success message'));
	} else {
		$policy += 1;  // add one
	}*/
	
	
	/*		if(!isset($this->request->data['PoliciesAndProceduresDocument']['policy'])){
			$policy = $this->request->data['PoliciesAndProceduresDocument']['policy'];  
			if($policy > 18 || $policy < 1){  
				$this->redirect(array('controller' => 'clients', 'action' => 'view', $clientId));
				$this->Session->setFlash('Policies and Procedures Batch Upload completed for ' . $clientName, 'default', array('class' => 'success message'));
			} else { 
				$policy += 1; 
			}
		} else {
			$policy = 1;
		}*/
		if(!isset($policy)){
			$policy = 1;
		}


?>


<div class="policiesAndProceduresDocuments form">
<?php echo $this->Form->create('PoliciesAndProceduresDocument', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Batch Add Policies and Procedures Documents <br />' . $clientName['Client']['name'] ); ?></legend>
	<?php
		echo $this->Form->input('policies_and_procedure_id', array('label' => 'Policies And Procedures ' . $policy, 'selected' => $policy));
		echo $this->Form->input('client_id', array( 'selected' => $clientId, 'disabled' => true));
		echo $this->Form->input('attachment', array('type' => 'file'));
		echo $this->Form->input('attachment_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	
	<ul>
		<?php echo $this->Html->link(__('Back to Client'), array('controller' => 'clients', 'action' => 'view', $clientId )); ?>
	</ul>


</div>
