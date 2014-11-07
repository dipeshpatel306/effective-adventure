<?php 
$options = array('action' => 'delete', $id);
if (isset($controller)) {
	$options['controller'] = $controller;
}
echo $this->Form->postLink(__("$title"), $options, null, __("Are you sure you would like to delete this $name?")); 
?>