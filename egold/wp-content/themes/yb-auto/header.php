<!-- begin header -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  bloginfo('name'); ?><?php  wp_title(); ?></title>
<meta name="generator" content="WordPress <?php  bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php  bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php  bloginfo('name'); ?> RSS Feed" href="<?php  bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php  bloginfo('pingback_url'); ?>" />

<?php  wp_head(); ?>
</head>
<body>

<div id="page">
<div id="header">
	<div id="headerimg">
		<h1><a href="<?php  echo get_settings('home'); ?>/" ><?php  bloginfo('name'); ?></a></h1>
								<h2><?php  bloginfo('description'); ?></h2>
	</div>
	
	
</div>
<div id="quick">
	<form id="searchform" method="get" action="">
		<div>
		<input style="color:#7c0101;" type="text" name="s" class="i" value="Search..." onClick="this.style.color='#7c0101';this.value='';" onBlur="if(this.value==''){ this.value='Search...'; this.style.color='#7c0101'; }" />
		<input type="submit" class="b" name="submit" value="OK" />
		</div>
	</form>
</div>
<!-- end header -->
<div id="main">
	<div id="right">
		

