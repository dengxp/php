<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php  language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php  bloginfo('html_type'); ?>; charset=<?php  bloginfo('charset'); ?>" />

<title><?php  if ( is_home() ) { bloginfo('name') ?> | <?php  bloginfo('description'); } else { wp_title(''); ?> | <?php  bloginfo('name'); } ?></title>

 <!--[if IE]><link rel="stylesheet" href="<?php  bloginfo('template_directory'); ?>/ie.css" type="text/css" media="screen, projection">
	<![endif]-->
 <link rel="stylesheet" href="<?php  bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
 <link rel="stylesheet" href="<?php  bloginfo('template_directory'); ?>/print.css" type="text/css" media="print" />
 <link rel="alternate" type="application/rss+xml" title="<?php  bloginfo('name'); ?> RSS Feed" href="<?php  bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php  bloginfo('pingback_url'); ?>" />
	
<?php  wp_head(); ?>

</head>

<body>

	<div class="container"> 

<div class="header">

<!--

<div class="logo">

<a class="logo" href="<?php  echo get_option('home'); ?>/"></a>

</div>

-->

<div class="blogname">

<a href="<?php  echo get_option('home'); ?>/"><?php  bloginfo('name'); ?></a>

</div>

<div class="description">

<?php  bloginfo('description'); ?>

</div>

</div>

<div class="header_right last">


<div id= "feed">

<ul>

<li><a href="<?php  bloginfo('rss2_url'); ?>">RSS Feed</a></li>

<li><a href="<?php  bloginfo('comments_rss2_url'); ?>">Comments Feed</a></li>

</ul>

</div>

<div class="search">

<?php  include (TEMPLATEPATH . "/searchform.php"); ?>

</div>

</div>

<br clear="all"/>

<div id="navmenu">
<ul>
 <li><a href="<?php  echo get_settings('home'); ?>">HOME</a></li>
<?php  list_cats(); ?>
<?php  wp_list_pages('title_li=' ); ?>
</ul>
</div>