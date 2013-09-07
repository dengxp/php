<?php  
global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php  language_attributes(); ?>> 
  <head profile="http://gmpg.org/xfn/11">
 	<meta http-equiv="Content-Type" content="text/html; charset=<?php  bloginfo('charset'); ?>" />
	<title><?php  bloginfo('name'); ?><?php  wp_title('-'); ?><?php  if(is_home()){echo ' - '; bloginfo('description');} ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=7" />  	
  <link rel="stylesheet" href="<?php  bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen"/>
  <link href="<?php  bloginfo('template_directory'); ?>/favicon.ico" rel="icon" type="image/x-icon" />
    <script type="text/javascript" language="JavaScript">
    TargetDate = "<?php  echo $rdy_date; ?>";
    FinishMessage = "<span class='finish-mss'><?php  echo $rdy_finish_mssg; ?></span>";
    </script>
<style type="text/css">
body{font-family:<?php  echo $rdy_font_type;?>;background-color:<?php  if($rdy_theme == "elegant-blue" or $rdy_theme == "elegant-green" or $rdy_theme == "elegant-violet") echo "#362f2d";elseif($rdy_theme == "cloud-no_rocket" or $rdy_theme == "cloud2" or $rdy_theme == "cloud") echo "#8dc73f;";else echo "white;";?><?php  if($rdy_theme == "elegant-blue" or $rdy_theme == "elegant-green" or $rdy_theme == "elegant-violet") echo ";";else{echo "background-image:url('";bloginfo('template_directory');echo"/images/";echo $rdy_theme;?>-bg.<?php  if($rdy_theme == "glass") echo "jpg');";else echo "gif');";} ?>}
#block{left:<?php  if($rdy_theme == "cloud" or $rdy_theme == "cloud2" or $rdy_theme == "cloud-no_rocket") echo "4%";else echo ";margin:0 auto !important";?>;background-image:url('<?php  bloginfo('template_directory');?>/images/<?php  echo $rdy_theme;?>-block.<?php  if($rdy_theme == "cloud") echo "gif";elseif($rdy_theme == "cloud-no_rocket") echo "gif";elseif($rdy_theme == "cloud2") echo "gif";else echo "jpg";?>');}
#access {background-color: #<?php  echo $rdy_color_topmenu ?>; opacity: 0.7;}
h1{color:#<?php  echo $rdy_color_head ?>;}
h2 {color:<?php  if ($rdy_color_count == "Default") echo "#414141";elseif ($rdy_color_count == "White") echo "#fff";elseif ($rdy_color_count == "Light Grey") echo "#F3F3F3";elseif ($rdy_color_count == "Black") echo "#000";?>;}
.alt-heading{color:#<?php  echo $rdy_color_alt_head ?>;}
.text {color:#<?php  echo $rdy_color_text ?>;}
.second-head  {color:#<?php  echo $rdy_color_second ?>;}
#cntdwn {color:#<?php  echo $rdy_color_cntdwn ?>;}
#rocket{background-image:url('<?php  bloginfo('template_directory');?>/images/<?php  echo $rdy_theme;?>-rocket.gif');background-repeat:no-repeat;}
#footer, #footer a:visited, #footer a{color:<?php  if($rdy_theme == "cloud" or $rdy_theme == "cloud-no_rocket" or $rdy_theme == "cloud2") echo "#646464";else echo "#b4b4b4";?>;}
.twitter{visibility:<?php  echo $rdy_twitter;?>}
.mail{visibility:<?php  echo $rdy_mail;?>}
<?php  if($rdy_theme == "stripe-grey") { ?>
body {background:#626262;}
#access {background:#3F3F3F}
#block {background-color:#fff;width:100%;padding-top:55px!important;top:100px;}
.alt-heading {top:135px}
.second-head {top:70px;left:30px}
#cntdwn {position:absolute;top:70px;width:420px;left:-40px}
#contact-left, #contact-right {margin-top:20px}
#footer a:visited, #footer a {color:#ccc}
#mail {width:500px;position:relative; top:-100px;}
#mail p {clear:both;position:relative; top:120px;}
<?php  }; ?>
<?php  if($rdy_theme == "stripe-vicious") { ?>
body {background:#154a4c;}
#access {background:#092E2F;}
#block {background-color:#fff;width:100%;padding-top:55px!important;top:100px;}
.alt-heading {top:135px}
.second-head {top:70px;left:30px}
#cntdwn {position:absolute;top:70px;width:420px;left:-40px}
#contact-left, #contact-right {margin-top:20px}
#footer a:visited, #footer a {color:#ccc}
#mail {width:500px;position:relative; top:-100px;}
#mail p {clear:both;position:relative; top:120px;}
<?php  }; ?>
<?php  if($rdy_theme == "stripe-red") { ?>
body {background:#3a1114;}
#access {background:#2c0a0d;}
#block {background-color:#fff;width:100%;padding-top:55px!important;top:100px;}
.alt-heading {top:135px}
.second-head {top:70px;left:30px}
#cntdwn {position:absolute;top:70px;width:420px;left:-40px}
#contact-left, #contact-right {margin-top:20px}
#footer a:visited, #footer a {color:#ccc}
#mail {width:500px;position:relative; top:-100px;}
#mail p {clear:both;position:relative; top:120px;}
<?php  }; ?>
</style>
<?php  wp_head(); ?>
</head>
<body>
<?php  if($rdy_topmenu == "Visible") { ?>
<div id="access">
<?php  wp_nav_menu( array('container_class' => 'menu-header' )); ?>
</div>
<?php  }; ?>