<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php  language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php  bloginfo('name'); ?> <?php  if ( is_single() ) { ?> &raquo; Blog Archive <?php  } ?> <?php  wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php  bloginfo('html_type'); ?>; charset=<?php  bloginfo('charset'); ?>" />
<link rel="stylesheet" href="<?php  bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /><link rel="alternate" type="application/rss+xml" title="<?php  bloginfo('name'); ?> RSS Feed" href="<?php  bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php  bloginfo('pingback_url'); ?>" />
<script src="<?php  bloginfo('stylesheet_directory') ?>/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="<?php  bloginfo('stylesheet_directory') ?>/js/jquery.corner.js" type="text/javascript"></script>
<script src="<?php  bloginfo('stylesheet_directory') ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php  bloginfo('stylesheet_directory') ?>/js/jquery.lavalamp.1.3.2-min.js" type="text/javascript"></script>
<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function(){					
	$('#header, #sidebar ul , #left ul, #footer').corner();
	$("#left ul li a:hover, #sidebar li a:hover").css("background", "transparent");//remove css hover if jquery is active
	$("#left ul").lavaLamp({
			fx: 'easeInExpo',
			speed: 800,
			homeTop:15,
			homeLeft:0,
			autoReturn: true
	});
	$("#sidebar ul").lavaLamp({
			fx: 'easeInExpo',
			speed: 600,
			homeTop:15,
			homeLeft:0,
			autoReturn: true
	});
	
	$('#left ul li.backLava, #sidebar li.backLava').corner();// this needs to come after the LavaLamp item is created
});	
/* ]]> */
</script>
<?php  if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php  wp_head(); ?>
</head>
<body>
<div id="sizer">
	<div id="expander">
		<a class="skiplink" href="#startcontent">Go to content</a>
		<div id="header">
			<h1><a href="<?php  echo get_settings('home'); ?>"><?php  bloginfo('name'); ?> <?php  bloginfo('description'); ?></a></h1>
		</div>
		<div id="wrapper1">
			<div id="wrapper2">
				<div class="outer">
					<div class="float-wrap">		
						<div id="center">
							<div class="centerbox"> <!-- optional extra styling div -->
								<div class="boxpadder">
								<!-- This class is used to pad text content in the cols, so that the cols don't 
need side padding that would then require box model hacking for IE5.x/win -->

									<a id="startcontent" class="skiplink">Content</a>
			