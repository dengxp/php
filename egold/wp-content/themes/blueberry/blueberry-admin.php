<?php 
if ( !function_exists('get_option') ) { 
	die('No no no.... :)');
}
if ( $saved ) {
?> 
<div class="updated fade">
<p>
You have changed your color to <?php  blueberry_color_tag(); ?>!
Would you like to
<a href="<?php  bloginfo('wpurl'); ?>" target="_blank">view your site</a> 
in a new window?
</p>
</div>
<?php 
} /* if ( $saved ) */

/* create active/deactivate sidebar link */

$href = wp_nonce_url( 'themes.php?page=functions.php&amp;toggle=true', 'bb_sidebar_nonce');

if ( $this->opts->sidebar ) { 

	$title = 'disable sidebar on posts';

} else {

	$title = 'enable sidebar on posts';

}

?>
<style type="text/css">
	@import url('<?php  bloginfo('template_url'); ?>/berries.css');
</style> 
<div class="wrap">
<h2><?php  _e('Blueberry Options'); ?><span style="font-size: .8em;">

 (<a href="<?php  echo $href; ?>" title="<?php  _e('Click to ' . $title); ?>"><?php  _e($title); ?></a>)</h2>
</span>
 
<div align="center">
<strong>Just click on the color you want to activate :)</strong><br /><br />
Your current color &raquo; <?php  blueberry_color_tag(); ?>.
</div>
<table class="form-table" style="text-align: center">
<tr>
	<td>
		<?php  blueberry_change_theme_link('blackberry', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/blackberry.png" alt="Blackberry" /><br />
		Blackberry	
		</a>
	</td>
	<td>
		<?php  blueberry_change_theme_link('blueberry', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/blueberry.png" alt="Blueberry" /><br />
		Blueberry	
		</a>	
	</td>
	<td>
		<?php  blueberry_change_theme_link('elderberry', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/elderberry.png" alt="Elderberry" /><br />
		Elderberry	
		</a>
	</td>
</tr>
<tr>
	<td>
		<?php  blueberry_change_theme_link('grape', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/grape.png" alt="Grape" /><br />
		Grape	
		</a>
	</td>
	<td>
		<?php  blueberry_change_theme_link('lime', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/lime.png" alt="Lime" /><br />
		Lime
		</a>
	</td>
	<td>
		<?php  blueberry_change_theme_link('lemon', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/lemon.png" alt="Lemon" /><br />
		Lemon	
		</a>
	</td>
</tr>
<tr>
	<td>
		<?php  blueberry_change_theme_link('orange', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/orange.png" alt="Orange" /><br />
		Orange	
		</a>
	</td>
	<td>
		<?php  blueberry_change_theme_link('raspberry', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/raspberry.png" alt="Raspberry" /><br />
		Raspberry	
		</a>
	</td>
	<td colspan="2">
		<?php  blueberry_change_theme_link('strawberry', '/wp-admin/themes.php?page=functions.php'); ?>
        <img src="<?php  bloginfo('template_url') ?>/images/screenshots/strawberry.png" alt="Strawberry" /><br />
		Strawberry	 
		</a>
	</td>
</tr>  
</table>
</div>