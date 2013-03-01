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
		//echo '<b>Admin Tools: </b> ';
		echo $this->Html->link('Partners', array('controller' => 'partners', 'action' => 'index')) . ' | ';		
		echo $this->Html->link('Clients', array('controller' => 'clients', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Org Profiles', array('controller' => 'organization_profiles', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' | ';
		
		echo $this->Html->link('Risk Assessments', array('controller' => 'riskassessments', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Messages', array('controller' => 'contact_us', 'action' => 'index'));

	}	
	// Client Manager Load Users link
	if($this->Session->read('Auth.User.group_id') == 2){
		echo $this->Html->link('About HIPAA Secure Now!', array('controller' => 'dashboard', 'action' => 'about_hipaa')) . ' | ';		
		echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Contact Us', array('controller' => 'contact_us', 'action' => 'contact' ));
	}
		
	// If Client or Initial load Contact
	if($this->Session->read('Auth.User.group_id') == 3 || $this->Session->read('Auth.User.group_id') == 4){
		echo $this->Html->link('About HIPAA Secure Now!', array('controller' => 'dashboard', 'action' => 'about_hipaa')) . ' | ';
		echo $this->Html->link('Contact Us', array('controller' => 'contact_us', 'action' => 'contact' ));		
	}	
?>	
</div>
</div>
