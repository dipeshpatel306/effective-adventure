<?php
if (!isset($button)) {
	$button = 'approved';
}

$link_props = array('escape' => false);
if (isset($target)) {
	$link_props['target'] = $target;
}

$button_text = null;
$approved = true;
if ($button == 'approved') {
	$button_text = 'Click Here';
	$approved = true;
} elseif ($button == 'no_auth') {
	$button_text = 'Not Authorized!';
	$approved = false;
} elseif ($button == 'subscribers') {
	$button_text = 'Subscribers Only!';
	$approved = false;
}

if ($button_text != null) {
	$button = $this->element('button', array('approved' => $approved, 'text' => $button_text));
}

if (isset($img) && !isset($img['class'])) {
	$img['class'] = 'dashTile';
}

echo $this->Html->link(
		'<div class="dashBox' . (isset($class) ? ' ' . $class : '') . '"' . (isset($id) ? ' id="' . $id . '"' : '') . '>' .
		'<div class="dashHead">' .
		(isset($img) ? $this->Html->image(
			$img['file'], array(
				'class' => $img['class'],
				'alt' => $img['alt']
			)
		) : '') . 
		(isset($heading) ? '<h3>' . $heading . '</h3>' : '') .
		'</div>' .
		'<div class="dashSum">' . $text . '</div>' . $button .
		'</div>', $link, array('escape' => false)
);
?>