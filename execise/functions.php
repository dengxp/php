do_action('setup_theme');
tag = setup_theme

function do_action($tag, $arg = '')
{
	global $wp_filter, $wp_actions, $merged_filters, $wp_current_filter;
	
	if(!isset($wp_actions))
		$wp_actions = array();
	
	// wp_actions��¼ÿ��action�ĵ��ô���
	if(!isset($wp_actions[$tag]))
		$wp_actions[$tag] = 1;	// $wp_actions['setup_theme'] = 1
	else
		++$wp_actions[$tag];
		
	// Do 'all' actions first
	if(isset($wp_filter['all']))
	{
		$wp_current_filter[] = $tag;
		$all_args = func_get_args();
		_wp_call_all_hook(all_args);
	}
		
function _wp_call_all_hook(all_args)
{
	global $wp_filter;
	
	reset($wp_filter['all'];
	do 
	{
		foreach ((array) current(
	} while (next($wp_filter['all'] !== false);
	
}


function get_header( $name = null)
{
	do_action('get_header', $name);
	
	$templates = array();
	
}