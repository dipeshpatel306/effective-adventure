<?php
    $this->Html->addCrumb("Let's Get Started");

	if(isset($risk) && !empty($risk)){  // if already filled out then give edit link
		$riskAss = array('controller' => 'risk_assessments', 'action' => 'edit', $risk['RiskAssessment']['id']);
	} else {
		$riskAss = array('controller' => 'risk_assessments', 'action' => 'take_risk_assessment');
	}

	if(isset($org) && !empty($org)){ // if already filled out then give edit link
		$orgPro = array('controller' => 'Organization_profiles', 'action' => 'edit', $org['OrganizationProfile']['id']);
	} else {
		$orgPro = array('controller' => 'Organization_profiles', 'action' => 'add');
	}

?>

<div class="dashboard index getStarted">
	<h2><?php echo __("Let's Get Started"); ?></h2>

<b>The Risk Assessment is a four step process:</b><br /><br />

	<b><span class='important'>1)</span> <?php echo $this->Html->link('Fill out the Organization Profile', $orgPro); ?></b>
	<p>By clicking on the above link you will be brought to a page that will allow you to describe your organization.
	This information along with below Security Risk Assessment questions, will help us perform the Security Risk Assessment.</p>

	<b><span class='important'>2)</span> <?php echo $this->Html->link('Answer the Security Risk Assessment Questions', $riskAss) ?> </b>
	<p>By clicking on the above link you will be brought to a page that has security questions to be answered. The questions will provide an insight into how you are currently protecting Personally Identifiable Information (PII) and sensitive data. We will use this information to help perform the Security Risk Assessment.
	</p>

	<b><span class='important'>3)</span> <?php echo $this->Html->link('Upload any existing Policy or Procedure that you already have in place.', array('controller' => 'other_policies_and_procedures')) ?> </b>
	<p>The next step after you answer the Risk Assessment Questions is to upload any existing policies and procedures (P&Ps) you have in place. This will provide insight into how your existing policy and procedures address protecting PII and sensitive data. Examples of the existing P&Ps include:
	</p>
	<ul>
		<li>Employee Termination Procedures</li>
		<li>Data Backup Procedures</li>
		<li>Disaster Recovery Procedures</li>
	</ul>
<br />

	<b><span class='important'>4)</span> Mark the Security Risk Assessment Complete <span class='important'>**Important**</span></b>
	<p>The last step is to Mark the Security Risk Assessment Complete so that you will know you are done and can perform the Security Risk Assessment and produce the Risk Assessment Reports. We will not be able to complete the Security Risk Assessment until you tell us you are done.</p>
	<p><b>Begin your Risk Assessment with the Organization Profile button on the previous page</b></p>


</div>
<div class="actions">
	<div class='sidebarContent'>
	<h3>Quick Links: </h3>
	<ul>
	<li><?php echo $this->Html->link('Back to Dashboard', array('controller' => 'dashboard', 'action' => 'index')); ?></li>
	</ul>
	</div>
</div>

<?php echo $this->element('newsFeed'); ?>