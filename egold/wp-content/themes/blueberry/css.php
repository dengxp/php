<?php 
if ( !function_exists('get_option') ) { 
	die('No no no.... :)');
}
$berry = get_option('blueberry');
$colors = call_blueberry_theme_function($berry);
?>

a, h2 a:hover, h3 a:hover{ 
	color: #<?php  echo $colors['entry']; ?>; 
}

a:hover{ 
	color: #<?php  echo $colors['hover']; ?>; 
}

.entry p a:visited{ 
	color: #<?php  echo $colors['visit']; ?>; 
}

#header { 
	background-image: url("<?php  bloginfo('template_url') ?>/images/<?php  echo $berry ?>-header.jpg");
	color: #<?php  echo $colors['header']; ?>;
}

#header .description {
	color: #<?php  echo $colors['header']; ?>
}

#header a {
	color: #<?php  echo $colors['header']; ?>;
}

#header a:hover {
	color: #<?php  echo $colors['headlink']; ?>;
}

#footer { 
	background-image: url("<?php  bloginfo('template_url') ?>/images/<?php  echo $berry ?>-footer.jpg");
	color: #<?php  echo $colors['footer']; ?>;
}
