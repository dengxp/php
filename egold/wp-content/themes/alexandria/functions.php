<?php 
if ( ! isset( $content_width ) )
	$content_width = 640;

$alexandria_themename = "alexandria";
$alexandria_textdomain = "alexandria";

function alexandria_setup(){
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'mainmenu' => __( 'Main Navigation', 'alexandria' )
  ) );

  // This theme uses post thumbnails
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'alexandriathumb', 450, 300, true );
  add_image_size( 'alexandriasingle', 1200, 500, true );   
  
  // Add default posts and comments RSS feed links to head
  add_theme_support( 'automatic-feed-links' );
  
  // Add translation support
  load_theme_textdomain('alexandria', get_template_directory() . '/languages');
  
  // Delete default WordPress gallery css
  add_filter( 'use_default_gallery_style', '__return_false' );

  // Add Custom header feature  
  $customhargs = array(
	'flex-width'    => true,
	'width'         => 1200,
	'flex-height'    => true,
	'height'        => 500,
	'header-text'   => false,
  );
  add_theme_support( 'custom-header', $customhargs );  
  
  // Add Custom background feature
  if ( of_get_option('skin_style') ) {
  	$custombgargsskin = of_get_option('skin_style');
  }else {
  	$custombgargsskin = 'alexandria';
  }
  
  if ( get_stylesheet_directory() == get_template_directory() ) {
	  $custombgargs = array(
		'default-color' => 'ebeef1',
		'default-image' => get_template_directory_uri() . '/skins/images/'.$custombgargsskin.'/page_bg.png',
		);
		
  }else {
	  $custombgargs = array(
		'default-image' => get_stylesheet_directory_uri() . '/images/page_bg.png',
		);	  
  }
  add_theme_support( 'custom-background', $custombgargs );  
}
add_action( 'after_setup_theme', 'alexandria_setup' );

/* 
 * Loads the Options Panel
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {

	/* Set the file path based on whether we're in a child theme or parent theme */


		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');


	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>

<?php 
}













/**
 * Get ID of the page, if this is current page
 */
function alexandria_get_page_id() {
	global $wp_query;

	$page_obj = $wp_query->get_queried_object();

	if ( isset( $page_obj->ID ) && $page_obj->ID >= 0 )
		return $page_obj->ID;

	return -1;
}

/**
 * Get custom field of the current page
 * $type = string|int
 */
function alexandria_get_custom_field($filedname, $id = NULL, $single=true)
{
	global $post;
	
	if($id==NULL)
		$id = get_the_ID();
	
	if($id==NULL)
		$id = alexandria_get_page_id();

	$value = get_post_meta($id, $filedname, $single);
	
	if($single)
		return stripslashes($value);
	else
		return $value;
}

/**
 * Get Limited String
 * $output = string
 * $max_char = int
 */
function alexandria_get_limited_string($output, $max_char=100, $end='...')
{
    $output = str_replace(']]>', ']]&gt;', $output);
    $output = strip_tags($output);
    $output = strip_shortcodes($output);

  	if ((strlen($output)>$max_char) && ($espacio = strpos($output, " ", $max_char )))
	{
        $output = substr($output, 0, $espacio).$end;
		return $output;
   }
   else
   {
      return $output;
   }
}

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param mixed $cats The target categories. Integer ID or array of integer IDs
 * @param mixed $_post The post
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Gets descendants of target category
 * @uses in_category() Tests against descendant categories
 * @version 2.7
 */
function alexandria_post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

/**
 * Custom comments for single or page templates
 */
function alexandria_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php  comment_class(); ?> id="li-comment-<?php  comment_ID() ?>">
   
   <div id="comment-<?php  comment_ID(); ?>">
		<div class="comment-author vcard">  <?php  echo get_avatar($comment,'82'); ?> <cite class="fn"><?php  echo get_comment_author_link(); ?></cite></div>
		<div class="comment-meta commentmetadata"><a href="<?php  echo esc_html( get_comment_link( $comment->comment_ID ) ) ?>"><?php  printf(__('%1$s at %2$s','alexandria'), get_comment_date(),  get_comment_time()) ?></a><?php  edit_comment_link(__('(Edit)','alexandria'),'  ','') ?></div>
      <?php  if ($comment->comment_approved == '0') : ?>
         <p><em><?php  _e('Your comment is awaiting moderation.','alexandria') ?></em></p>
      <?php  endif; ?>
		<div class="entry">
		<?php  comment_text() ?>
		</div>
		<div class="reply"><?php  comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
	</div>
<?php 
}

/**
 * Browser detection body_class() output
 */
function alexandria_browser_body_class($classes) {
	global $is_alexandria, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_alexandria) $classes[] = 'alexandria';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
/**
 * Add StyleSheets
 */
function alexandria_add_stylesheets( ) {
	
	if( !is_admin() ) {

								wp_enqueue_style('alexandria_dropdowncss', get_template_directory_uri().'/css/dropdown.css');
								wp_enqueue_style('alexandria_rtldropdown', get_template_directory_uri().'/css/dropdown.vertical.rtl.css');
								wp_enqueue_style('alexandria_advanced_dropdown', get_template_directory_uri().'/css/default.advanced.css');

								
								echo '<!--[if lte IE 7]>
<style type="text/css">
html .jquerycssmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]--> ';

									
								if( of_get_option('skin_style') == 'alexandria' ) {
									wp_enqueue_style('alexandria_bluestyle', get_template_directory_uri().'/skins/alexandria.css');	
								}elseif( of_get_option('skin_style') == 'radi' ) {
									wp_enqueue_style('alexandria_redstyle', get_template_directory_uri().'/skins/radi.css');
								}elseif( of_get_option('skin_style') == 'child' ) {
									wp_enqueue_style('alexandria_childtstyle', get_stylesheet_directory_uri().'/lite.css');
								}else {
									wp_enqueue_style('alexandria_bluestyle', get_template_directory_uri().'/skins/alexandria.css');
								}									
										

	}
}
/**
 * Add JS scripts
 */
function alexandria_add_javascript( ) {

	if (is_singular() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');
		
	wp_enqueue_script('jquery');
	
	if( !is_admin() ) {

		wp_enqueue_script('alexandria_respond', get_template_directory_uri().'/js/respond.min.js' );
		wp_enqueue_script('alexandria_respmenu', get_template_directory_uri().'/js/tinynav.min.js' );	
		wp_enqueue_script('alexandria_general', get_template_directory_uri().'/js/general.js' );		

	}

}

function alexandria_backupmenu() {
	 	if ( current_user_can('edit_theme_options') ) {
				echo '	<ul id="Main_nav" class="dropdown dropdown-horizontal">
							<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
								<a href="'.get_admin_url().'nav-menus.php">'.__("Select a Menu to appear here in Dashboard->Appearance->Menus ", "alexandria").'</a>
							</li>
		
						</ul>	';
		} else {
				echo '	<ul id="Main_nav" class="dropdown dropdown-horizontal">
							<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
								<a href="'.esc_url( get_home_url() ).'">'.__("Home", "alexandria").'</a>
							</li>
		
						</ul>	';			
		}
}

/**
 * Register widgetized areas
 */
function alexandria_the_widgets_init() {
	

    
    $before_widget = '<div id="%1$s" class="sidebar_widget %2$s">
																			
																			<div class="widget">';
    $after_widget = '</div>
																			
																		</div>';
    $before_title = '<h3 class="widgettitle">';
    $after_title = '</h3>';

	
	

    register_sidebar(array('name' => __('Default','alexandria'),'id' => 'default','before_widget' => $before_widget,'after_widget' => $after_widget,'before_title' => $before_title,'after_title' => $after_title));
    register_sidebar(array('name' => __('Footer Left','alexandria'),'id' => 'footer-left','before_widget' => $before_widget,'after_widget' => $after_widget,'before_title' => $before_title,'after_title' => $after_title));
        if( !of_get_option('footer_layout') || of_get_option('footer_layout') == 'one' ) { 	
    register_sidebar(array('name' => __('Footer Center','alexandria'),'id' => 'footer-center','before_widget' => $before_widget,'after_widget' => $after_widget,'before_title' => $before_title,'after_title' => $after_title)); 
		}
    register_sidebar(array('name' => __('Footer Right','alexandria'),'id' => 'footer-right','before_widget' => $before_widget,'after_widget' => $after_widget,'before_title' => $before_title,'after_title' => $after_title)); 	 
}

/**
 * Filter for get_the_excerpt
 */
 
function alexandria_get_the_excerpt($content){
	return str_replace(' [...]','',$content);
}

/**
 * Get the sidebar ID
 */
 
function alexandria_get_sidebar_id(){
	global $post;
	$sidebar_id = 'sidebar-default';
	if(isset($post->ID))
		if(is_active_sidebar('sidebar-'.$post->ID))
			$sidebar_id = 'sidebar-'.$post->ID;
	return $sidebar_id;
}


/* Wp Title */
function alexandria_wp_title( $title, $sep ) {
		
		global $page, $paged;
	
		if ( is_feed() )
			return $title;
	
		// Add the blog name
		$title .= get_bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " $sep $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			$title .= " $sep " . sprintf( __( 'Page %s', 'responsivitis' ), max( $paged, $page ) );
	
		return $title;		
}
add_filter( 'wp_title', 'alexandria_wp_title', 10, 2 );

add_filter( 'the_content_more_link', 'alexandria_more_link', 10, 2 );

function alexandria_more_link( $more_link, $more_link_text ) {
	return '<br /><br />'.$more_link;
}

add_filter('the_title','alexandria_has_title');
function alexandria_has_title($title){
	global $post;
	if($title == ''){
		return get_the_time(get_option( 'date_format' ));
	}else{
		return $title;
	}
}




if (!is_admin()){
	add_action( 'wp_enqueue_scripts', 'alexandria_add_stylesheets' );	
	add_action( 'wp_enqueue_scripts', 'alexandria_add_javascript' );
}

add_filter('body_class','alexandria_browser_body_class');
add_filter('the_excerpt', 'alexandria_get_the_excerpt');
add_filter('get_the_excerpt', 'alexandria_get_the_excerpt');
add_action( 'widgets_init', 'alexandria_the_widgets_init' );

// Allow Shortcodes in Sidebar Widgets
add_filter('widget_text', 'do_shortcode');

/**
 * Add default options and show Options Panel after activate
 */
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	
	//Do redirect

	wp_redirect( admin_url( 'admin.php?page=options-framework' ) ); exit;
	
}

?>