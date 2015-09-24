<?php
App::uses('Group', 'Model');
$this->Html->addCrumb('Policies & Procedures');
$group = $this->Session->read('Auth.User.group_id');
$acct = $this->Session->read('Auth.User.Client.account_type');
$pnp_name = Configure::read('Theme.pnp_name');
?>

<div class="dashboard index">
	<h2><?php echo __($pnp_name); ?></h2>
	<?php
		echo $this->element('video_overlay');
		if ($group != Group::USER && $acct == 'AYCE Training') {
			echo $this->element('tile', array(
				'img' => array('file' => 'opnp_tile.jpg', 'alt' => 'Learn More About Policies'),
				'heading' => 'Security Policies Overview Video',
				'text' => 'Learn More About Policies',
				'link' => array('video' => 'policiesOverview')
			));
		}
	
		// policies & procedures . If Manager allow, If employee read only. MU hidden
		if ($acct == 'Meaningful Use' || $acct == 'Training' || ($group == Group::USER && $acct == 'AYCE Training')) { // Ban Meaningful USe
			$pnp_btn = 'subscribers';
		} else {
			$pnp_btn = 'approved';
		}
		
		$nolink = ($acct == 'AYCE Training') ? array('video' => 'pnpUserOverview') : array('controller' => 'policies_and_procedures');
		echo $this->element('tile', array(
			'img' => array('file' => 'pnp_tile.jpg', 'alt' => $pnp_name),
			'heading' => $pnp_name,
			'text' => $pnp_name,
			'button' => $pnp_btn,
			'link' => ($pnp_btn == 'approved' ? array('controller' => 'policies_and_procedures', 'action' => 'index') : $nolink)
		));

		// Other policies & procedures. Subscribers and MU are allowed. Users are read only
		if ($acct == 'Training' || ($group == Group::USER && $acct == 'AYCE Training')) {
			$opnp_btn = 'subscribers';
		} else {
			$opnp_btn = 'approved';	
		}

		$nolink = ($acct == 'AYCE Training') ? array('video' => 'opnpUserOverview') : array('controller' => 'policies_and_procedures');
		echo $this->element('tile', array(
			'img' => array('file' => 'opnp_tile.jpg', 'alt' => 'Other Policies & Procedures'),
			'heading' => 'Other Policies & Procedures',
			'text' => 'Other Policies & Procedures',
			'button' => $opnp_btn,
			'link' => ($opnp_btn == 'approved' ? array('controller' => 'other_policies_and_procedures', 'action' => 'index') : $nolink)
		));
	?>

</div>
<div class="actions newsFeed">

	<?php echo $this->element('quickLinks'); ?>
</div>