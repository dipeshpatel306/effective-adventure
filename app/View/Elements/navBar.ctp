<div class='navBar'>
<div class="breadcrumbs">
<?php 
	// Breadcrumbs
	if($this->here != ('/hipaa/users/login') ){ // TODO fix link for production
		echo $this-> Html->image('home.gif', array(
			'class' => 'homeIcon',
			'alt' => 'HIPAA Secure Compliance Portal Home',
			'url' => array('controller' => 'dashboard', 'action' => 'index')
		));
		echo $this->Html->getCrumbs(' > ', 'Home');
	}
?>

</div>
<div class='subMenu'>
<?php 
	// If Admin load Admin Tools
	if(($this->Session->read('Auth.User.group_id') == 1)){
		echo $this->Html->link('About', array('controller' => 'dashboard', 'action' => 'edit', 1)) . ' | ';	
		echo $this->Html->link('Policies', array('controller' => 'policies_and_procedures', 'action' => 'index')) . ' | ';			
		echo $this->Html->link('Partners', array('controller' => 'partners', 'action' => 'index')) . ' | ';		
		echo $this->Html->link('Clients', array('controller' => 'clients', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Org Profiles', array('controller' => 'organization_profiles', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' | ';
		
		echo $this->Html->link('Risk Assessments', array('controller' => 'risk_assessments', 'action' => 'index')) . ' | ';
        echo $this->Html->link('Risk Assessment Questions', array('controller' => 'risk_assessment_questions', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Education Center', array('controller' => 'education_center', 'action' => 'admin_index')) . ' | ';
		echo $this->Html->link('Messages', array('controller' => 'contact_us', 'action' => 'index'));

	}	
	// Client Manager Load links
	if($this->Session->read('Auth.User.group_id') == 2){
		$userId = $this->Session->read('Auth.User.id');
		echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'edit', $userId)) . ' | ';		
		echo $this->Html->link('About HIPAA Secure Now!', array('controller' => 'dashboard', 'action' => 'about_hipaa')) . ' | ';	
		echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Contact Us', array('controller' => 'contact_us', 'action' => 'contact' ));
	}
		
	// If Client User or Initial load link
	if($this->Session->read('Auth.User.group_id') == 3 || $this->Session->read('Auth.User.group_id') == 4){
		$userId = $this->Session->read('Auth.User.id');
		echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'edit', $userId)) . ' | ';
		echo $this->Html->link('About HIPAA Secure Now!', array('controller' => 'dashboard', 'action' => 'about_hipaa')) . ' | ';
		echo $this->Html->link('Contact Us', array('controller' => 'contact_us', 'action' => 'contact' ));		
	}	
?>	
</div>
</div>

