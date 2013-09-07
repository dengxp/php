<?php 
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name'=>'LeftSidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="sidebars">',
        'after_title' => '</h2>',
    ));

	register_sidebar(array(
		'name'=>'RightSidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
    	'before_title' => '<h2 class="sidebars">',
    	'after_title' => '</h2>',
));
?>