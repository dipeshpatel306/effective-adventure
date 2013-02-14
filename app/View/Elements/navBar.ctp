<div class='navBar'>
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

<div class='subMenu'>
<?php 
	// If Admin load Admin Tools
	if(($this->Session->read('Auth.User.group_id') == 1)){
		echo '<b>Administrator Tools: </b>';
		echo $this->Html->link('Clients', array('controller' => 'clients', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Risk Assessments', array('controller' => 'riskassessments', 'action' => 'index'));
	}	
	// Client Manager Load Users link
	if($this->Session->read('Auth.User.group_id') == 2){
		echo $this->Html->link('About HIPAA Secure Now!', array('controller' => 'dashboard', 'action' => 'about_hipaa')) . ' | ';		
		echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' | ';
		echo $this->Html->link('Contact Us', array('controller' => 'contact_us', 'action' => 'contact' ));
	}
		
	// If Client load Contact
	if($this->Session->read('Auth.User.group_id') == 3){
		echo $this->Html->link('About HIPAA Secure Now!', array('controller' => 'dashboard', 'action' => 'about_hipaa')) . ' | ';
		echo $this->Html->link('Contact Us', array('controller' => 'contact_us', 'action' => 'contact' ));		
	}	
?>	
</div>

</div>

