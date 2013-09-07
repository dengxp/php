<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php  language_attributes(); ?>>

<head>

<meta http-equiv="Content-Type" content="<?php  bloginfo('html_type'); ?>; charset=<?php  bloginfo('charset'); ?>" />



<title><?php  bloginfo('name'); ?> <?php  if ( is_single() ) { ?> &raquo; Blog Archive <?php  } ?> <?php  wp_title(); ?></title>



<link rel="stylesheet" href="<?php  bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php  bloginfo('template_url'); ?>/berries.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php  bloginfo('name'); ?> RSS Feed" href="<?php  bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="<?php  bloginfo('name'); ?> Atom Feed" href="<?php  bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php  bloginfo('pingback_url'); ?>" />



<?php  wp_head(); ?>

</head>

<body class="<?php  blueberry_class(); ?>">

<div id="page">



<div id="header" class="center">

	<div id="headertxt">

		<h1><a href="<?php  bloginfo('wpurl'); ?>/" rel="home"><?php  bloginfo('name'); ?></a></h1>

		<h2><?php  bloginfo('description'); ?></h2>

	</div><!-- #headertxt -->

</div><!-- #header -->

<hr /> 

<?php  blueberry_alerts(); ?>

