<?php 

if ( function_exists('register_sidebar') )	register_sidebar(array('name'=>'Left Navigation',		'before_widget' => '',		'after_widget' => '', 		'before_title' => '<h2>',		'after_title' => '</h2>',	)
);if ( function_exists('register_sidebar') )	register_sidebar(array('name'=>'Right Sidebar',		'before_widget' => '',		'after_widget' => '',		'before_title' => '<h2>',		'after_title' => '</h2>',	)
);
   
