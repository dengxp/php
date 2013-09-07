<?php 

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
} 

class blueberry
{
    /* class vars */
    var $themes = array(
        'blackberry',
        'blueberry',
        'elderberry',
        'grape',
        'lime',
        'lemon',
        'orange',
        'raspberry',
        'strawberry',
    );

    function blueberry() {
        $opts = new stdClass();
        $opts->theme = 'blueberry';
        $opts->sidebar = true;
        $opts->toolbox_top = true;
        $opts->toolbox_newwindow = true;
        $opts->alerts = array();
        add_option('blueberry', $opts);
        //update_option('blueberry', $opts);
        $this->opts = get_option('blueberry');
        $this->_hook();
        return $this;    
    }

    /* public functions */
    function get_alerts() {
        $this->opts->alerts = apply_filters('blueberry_alerts', $this->opts->alerts); 
        foreach ( $this->opts->alerts as $msg => $class ) { 
            $out .= $this->_get_alert($msg, $class);    
        }
        return $out;
    }

    function footer() {
        $wplogin = apply_filters('blueberry_footer', 
                   '<div class="center">'
                 . '<a href="' . admin_url() . '" title="Login to WordPress" rel="nofollow">'
                 . '<img src="' . get_bloginfo('template_url') . '/images/wp-'
                 . $this->opts->theme . '.jpg" alt="WP Login" /></a></div>');
        echo $wplogin;    
    }
 
    function alternate_theme($theme) {
        if ( !$this->_valid_theme($theme) ) {
            return;
        }
        $this->opts->theme = $theme;      
    }

    function set_theme($theme) {
        if ( !$this->_valid_theme($theme) ) {
            return $this->_get_alert('That is not a valid theme choice.', 'emergency');
        }
        $this->opts->theme = $theme;
        $this->_save();    
    }
    
    function toolbox($content) {
        global $post;
        if ( !$this->_check_auth() ) {
            return $content;
        } else if ( !is_single() && !is_page() ) {
            return $content;
        }
        $link = 'Edit This ' . ucfirst($post->post_type);
        $tools = array(
            'Add Post' => admin_url('post-new.php'),
            'Add Page' => admin_url('page-new.php'),
            'Quick Edit' => '#TB_inline?height=380&width=610&inlineId=quickedit',
            $link => get_edit_post_link($post->ID),
        );
        $glue = ' | ';
        $tools = apply_filters('blueberry_tools', $tools, $glue);
        $toollinks = array();
        foreach ( $tools as $text => $href ) {
            $toollink = '<a href="' . $href . '" title="' . $text . '"';
            if ( $this->opts->toolbox_newwindow && (strpos($href, '#TB_inline') === false) ) {
                $toollink .= ' target="_blank"';    
            } else if ( strpos($href, '#TB_inline') === 0 ) {
                $toollink .= ' class="thickbox"';    
            }
            $toollink .= '>' . $text . '</a>';
            $toollinks[] = $toollink;    
        }
        $content .= $this->_quick_edit_form();
        $toolbox = '<p id="toolbox">' . implode($glue, $toollinks) . '</p>';
        if ( $this->opts->toolbox_top ) {
            return $toolbox . $content;
        } else {
            return $content . $toolbox;
        }    
    } 

    /* private functions */

    function _save() {
        update_option('blueberry', $this->opts);    
    }
    
    function _save_quick_edit() {
        if ( empty($_POST['quick_postid']) ) {
              return;
        }
        check_admin_referer('blueberry_quickedit');
        $update->post_content = $_POST['quick_content'];
        $update->ID = $_POST['quick_postid'];
        if ( wp_update_post($update) ) {      
            $alert = '$alerts["<strong>You have updated your ' . wp_specialchars($_POST['quick_type']) . '</strong>"] = "warning"';
        } else {
            $alert = '$alerts["<strong>Saving has failed, please try through the admin</strong>"] = "emergency"';
        } 
        add_filter('blueberry_alerts', 
            create_function('$alerts', $alert . '; return $alerts;')
        );    
    }
 
    function _quick_edit_form() {
        global $post;
        $form = '<div class="hidden" id="quickedit"><form action="#" method="post">'
              . '<textarea name="quick_content" id="quick_content">' 
              . wp_specialchars($post->post_content) 
              . '</textarea><br /><input type="submit" id="quick_save" name="quick_save" value="Save" />'
              . '<input type="hidden" name="quick_postid" id="quick_postid" value="' . $post->ID . '" />'
              . '<input type="hidden" name="quick_type" id="quick_type" value="' . $post->post_type . '" />'
              . wp_nonce_field('blueberry_quickedit')
              . '</form></div>';
        return $form;
    }
   
    function _hook() {
    	add_action('admin_menu', array($this, '_theme_page_link'));
        add_action('pre_get_posts', array($this, '_save_quick_edit'));
        add_action('wp_footer', array($this, 'footer'));
        add_action('wp_print_scripts', array($this, '_js'));
        add_action('wp_print_styles', array($this, '_css'));
        add_filter('the_content', array($this, 'toolbox'));
        add_shortcode('blueberry', array($this, 'alternate_theme'));    
    }

    function _valid_theme($theme) {
        if ( array_search($theme, $this->themes) === false ) {
            return false;
        }
        return true;
    }
    
    function _get_alert($msg, $class) {
        return '<div class="center ' . $class . '"><p>' . $msg . '</p></div>';    
    }
    
    function _js() {
        $jspath = get_bloginfo('template_url') . '/js/';
        wp_enqueue_script('thickbox');
        wp_enqueue_script('blueberrycomments', $jspath . 'comments.js' , array('jquery'), '1.0');
        wp_enqueue_script('blueberrytoolbox', $jspath . 'toolbox.js', array('jquery'), '1.0');        
    }
    
    function _css() {
        wp_enqueue_style('thickbox');
    }
    
    function _theme_page_link() {
		add_theme_page(__('Customize Theme'), 
					   __('Blueberry Options'), 
					   'edit_themes', 
					   basename(__FILE__), 
					   array($this, '_theme_page'));
	}
	
	function _theme_page() {
		$saved = blueberry_save_theme();
		if ( !empty($_REQUEST['toggle']) ) {
			check_admin_referer('bb_sidebar_nonce');
			$this->opts->sidebar = !$this->opts->sidebar;
			$this->_save();
		}
		require TEMPLATEPATH . '/blueberry-admin.php';
	}
     
    function _check_auth() {
        global $post;
        return current_user_can('edit_' . $post->post_type, $post->ID);
    }
}
  
/* create global instance of $blueberry at init */
add_action('init', create_function(null, 'global $blueberry; $blueberry = new blueberry();'));

/* template tags */
function blueberry_alerts() {
    global $blueberry;
    echo $blueberry->get_alerts();
}

function blueberry_alert($msg, $class) {
    global $blueberry;
    echo $blueberry->_get_alert($msg, $class);    
}

function blueberry_class() {
    global $blueberry;
    echo (empty($blueberry->opts->theme)) ? 'blueberry' : $blueberry->opts->theme;    
}

function blueberry_color_tag() { 
    global $blueberry; 
    echo '<span class="' . $blueberry->opts->theme . 'color">' 
         . $blueberry->opts->theme . '</span>';    
}

function blueberry_alt_theme($theme) {
    global $blueberry;
    $blueberry->alternate_theme($theme);    
}

function blueberry_sidebar() {
    global $blueberry;
    echo ( $blueberry->opts->sidebar ) ? 'narrowcolumn' : 'widecolumn';    
}

function blueberry_response() {
    global $post;
    if ( ($post->comment_status == 'open') && ($post->ping_status == 'open') ) {
        echo '<a href="#respond">Leave a comment</a>, or ' .
             '<a href="' . get_trackback_url() . '" rel="trackback">trackback</a> from your own site.';
    } else if ( !($post->comment_status == 'open') && ($post->ping_status == 'open') ) {
        echo 'Comments are closed, but you can ' .
             '<a href="' . get_trackback_url() . '" rel="trackback">trackback</a> from your own site.';
    } else if ( ($post->comment_status == 'open') && !($post->ping_status == 'open') ) {
        echo 'Pings are closed but you can <a href="#respond">Leave a comment</a>!';   
    } else if ( ($post->comment_status == 'open') && ($post->ping_status == 'open') ) {
        echo 'Both comments and pings are closed for this entry.';    
    }   
}

function blueberry_comment_name($name, $len) {
    preg_match('/<a([^>]+)>([^<]+)<\/a>/', $name, $match);
    if ( strlen($match[2]) > $len ) {
        echo '<a ' . $match[1] . '>' . substr($match[2], 0, $len-1) . '...</a>';
        return;    
    }
    echo $name;    
}

function blueberry_change_theme_link($theme, $uri) {
    $link = '<a style="text-decoration: none;" href="' 
          . wp_nonce_url( get_bloginfo('wpurl') 
          . $uri . '&amp;blueberry_theme=' . $theme, 'blueberry_theme') 
          . '" rel="nofollow">';
    echo $link;    
}

/* admin functions */
function blueberry_save_theme($echo = false, $nonce = 'blueberry_theme') {
    global $blueberry;
    if ( empty($_REQUEST['blueberry_theme']) ) {
        return;
    }
    check_admin_referer($nonce);
    $save = $blueberry->set_theme($_REQUEST['blueberry_theme']);
    if ( $echo ) {
        echo $save;
    }
    return $save;
}
