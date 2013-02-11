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
		/*echo $this->Html->getCrumbs(' > ', array(
			'text' => $this->Html->image('home.gif'),
			'url' => array('controller' =>  'dashboard', 'action' => 'index', 'home'),
			'escape' => false
		));*/ 
	}
?>

<div class='subMenu'>
	<?php 
		if($this->Session->read('Auth.User.group_id') == 2){
			echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index')) . ' / ';
		}
		echo $this->Html->link('Contact Us', array('controller' => 'contact_us', 'action' => 'contact' ))	;
	?>
</div>

</div>

