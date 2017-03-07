<?php
/*
 * Plugin Name: WP-UserAgent
 * Plugin URI: https://www.kyleabaker.com/goodies/coding/wp-useragent/
 * Description: A simple User-Agent detection plugin that lets you easily insert icons and/or textual web browser and operating system details with each comment.
 * Version: 1.1.6
 * Author: Kyle Baker
 * Author URI: https://www.kyleabaker.com/
 * Text Domain: wp-useragent
 * Domain Path: /languages/
 * //Author: Fernando Briano
 * //Author URI: http://picandocodigo.net
 */

/* Copyright 2008-2017  Kyle Baker  (email: kyleabaker@gmail.com)
	//Copyright 2008  Fernando Briano  (email : transformers.es@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Security measure
defined( 'ABSPATH' ) or die( 'Cannot access pages directly.' );

// Pre-2.6 compatibility
if (!defined('WP_CONTENT_URL'))
	define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
	define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
	define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
	define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

// Include our main UA detection functions
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-device.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-os.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-platform.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-trackback.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-webbrowser.php');
include(WP_PLUGIN_DIR.'/wp-useragent/wp-useragent-detect-webbrowser-version.php');

// Plugin Options
$wpua_img_url = WP_PLUGIN_URL.'/wp-useragent/img/';

$wpua_doctype          = get_option('wpua_doctype');
$wpua_icon_size        = get_option('wpua_icon_size');
$wpua_show_text_icons  = get_option('wpua_show_text_icons');
$wpua_icon_style       = get_option('wpua_icon_style');
$wpua_icon_style_input = get_option('wpua_icon_style_input');
$wpua_text_using       = get_option('wpua_text_using');
$wpua_text_on          = get_option('wpua_text_on');
$wpua_text_via         = get_option('wpua_text_via');
$wpua_show_version     = get_option('wpua_show_version');
$wpua_text_links       = get_option('wpua_text_links');
$wpua_show_full_ua     = get_option('wpua_show_full_ua');
$wpua_hide_unknown_ua  = get_option('wpua_hide_unknown_ua');
$wpua_admin_only       = get_option('wpua_admin_only');
$wpua_output_location  = get_option('wpua_output_location');

// Migrate settings from previous database schema if necessary
$wpua_old_output_location = get_option('ua_output_location');
if (empty($wpua_output_location) && !empty($wpua_old_output_location))
{
	// Attempt to retrieve settings stored using previous schema (transform where needed)
	$wpua_doctype          = get_option('ua_doctype');
	$wpua_icon_size        = get_option('ua_comment_size');
	$wpua_show_text_icons  = (get_option('ua_show_text') === '2') ? 'icons' : ((get_option('ua_show_text') === '3') ? 'text' : 'icons_and_text');
	$wpua_icon_style       = (get_option('ua_image_style') === '2') ? 'inline' : ((get_option('ua_image_style') === '3') ? 'css' : 'default');
	$wpua_icon_style_input = get_option('ua_image_css');
	$wpua_text_using       = get_option('ua_text_surfing');
	$wpua_text_on          = get_option('ua_text_on');
	$wpua_text_via         = get_option('ua_text_via');
	$wpua_text_links       = (get_option('ua_text_links') === '1') ? 'true' : 'false';
	$wpua_show_full_ua     = get_option('ua_show_ua_bool');
	$wpua_hide_unknown_ua  = get_option('ua_hide_unknown_bool');
	$wpua_admin_only       = get_option('ua_admin_only_bool');
	$wpua_output_location  = get_option('ua_output_location');

	// Add new options and attempt to specify no autoload
	if ( ! add_option( 'wpua_doctype', $wpua_doctype, '', 'no' ) ) update_option( 'wpua_doctype', $wpua_doctype );
	if ( ! add_option( 'wpua_icon_size', $wpua_icon_size, '', 'no' ) ) update_option( 'wpua_icon_size', $wpua_icon_size );
	if ( ! add_option( 'wpua_show_text_icons', $wpua_show_text_icons, '', 'no' ) ) update_option( 'wpua_show_text_icons', $wpua_show_text_icons );
	if ( ! add_option( 'wpua_icon_style', $wpua_icon_style, '', 'no' ) ) update_option( 'wpua_icon_style', $wpua_icon_style );
	if ( ! add_option( 'wpua_icon_style_input', $wpua_icon_style_input, '', 'no' ) ) update_option( 'wpua_icon_style_input', $wpua_icon_style_input );
	if ( ! add_option( 'wpua_text_using', $wpua_text_using, '', 'no' ) ) update_option( 'wpua_text_using', $wpua_text_using );
	if ( ! add_option( 'wpua_text_on', $wpua_text_on, '', 'no' ) ) update_option( 'wpua_text_on', $wpua_text_on );
	if ( ! add_option( 'wpua_text_via', $wpua_text_via, '', 'no' ) ) update_option( 'wpua_text_via', $wpua_text_via );
	if ( ! add_option( 'wpua_text_links', $wpua_text_links, '', 'no' ) ) update_option( 'wpua_text_links', $wpua_text_links );
	if ( ! add_option( 'wpua_show_full_ua', $wpua_show_full_ua, '', 'no' ) ) update_option( 'wpua_show_full_ua', $wpua_show_full_ua );
	if ( ! add_option( 'wpua_hide_unknown_ua', $wpua_hide_unknown_ua, '', 'no' ) ) update_option( 'wpua_hide_unknown_ua', $wpua_hide_unknown_ua );
	if ( ! add_option( 'wpua_admin_only', $wpua_admin_only, '', 'no' ) ) update_option( 'wpua_admin_only', $wpua_admin_only );
	if ( ! add_option( 'wpua_output_location', $wpua_output_location, '', 'no' ) ) update_option( 'wpua_output_location', $wpua_output_location );

	// New schema is initialized, ready to purge old schema...
	delete_option('ua_doctype');
	delete_option('ua_comment_size');
	delete_option('ua_track_size');
	delete_option('ua_show_text');
	delete_option('ua_image_style');
	delete_option('ua_image_css');
	delete_option('ua_text_surfing');
	delete_option('ua_text_on');
	delete_option('ua_text_via');
	delete_option('ua_text_links');
	delete_option('ua_show_ua_bool');
	delete_option('ua_hide_unknown_bool');
	delete_option('ua_admin_only_bool');
	delete_option('ua_output_location');
}
// Add new feature option for showing version to db if it didn't previously exist
if (empty($wpua_show_version))
{
	$wpua_show_version = 'full';
	if ( ! add_option( 'wpua_show_version', $wpua_show_version, '', 'no' ) ) update_option( 'wpua_show_version', $wpua_show_version );
}

// Set defaults
if (empty($wpua_doctype)) $wpua_doctype = 'html';
if (empty($wpua_icon_size)) $wpua_icon_size = '16';
if (empty($wpua_show_text_icons)) $wpua_show_text_icons = 'icons_and_text';
if (empty($wpua_icon_style)) $wpua_icon_style = 'default';
if (empty($wpua_icon_style_input) && (is_null($wpua_icon_style_input) || $wpua_icon_style === 'default')) $wpua_icon_style_input = 'border:0px;vertical-align:middle;';
if (empty($wpua_text_using) && is_null($wpua_text_using)) $wpua_text_using = '';
if (empty($wpua_text_on) && is_null($wpua_text_on)) $wpua_text_on = '';
if (empty($wpua_text_via) && is_null($wpua_text_via)) $wpua_text_via = '';
if (empty($wpua_show_version)) $wpua_show_version = 'full';
if (empty($wpua_text_links)) $wpua_text_links = 'false';
if (empty($wpua_show_full_ua)) $wpua_show_full_ua = 'true';
if (empty($wpua_hide_unknown_ua)) $wpua_hide_unknown_ua = 'false';
if (empty($wpua_admin_only)) $wpua_admin_only = 'false';
if (empty($wpua_output_location)) $wpua_output_location = 'before';

// Safe escape user entered input
$wpua_icon_style_input = wpua_str_escape($wpua_icon_style_input);
$wpua_text_using = wpua_str_escape($wpua_text_using);
$wpua_text_on = wpua_str_escape($wpua_text_on);
$wpua_text_via = wpua_str_escape($wpua_text_via);

/**
 * Escape quotes from user input so options are displayed correctly
 */
function wpua_str_escape($str)
{
	return esc_attr(htmlspecialchars(wp_strip_all_tags($str, false)));
}

/**
 * Initialized by comment_text hook for each comment.
 */
function wpua_useragent()
{
	global $comment, $useragent, $wpua_output_location;

	// Retrieve user agent string from comment metadata
	$useragent = wpua_str_escape($comment->comment_agent);

	// Display user agent (before, after, custom), render comment if
	// needed and re-apply filter for next comment
	if ($wpua_output_location === 'before')
	{
		wpua_display_useragent(true);
		wpua_display_comment();
		add_filter('comment_text', 'wpua_useragent');
	}
	elseif ($wpua_output_location === 'after')
	{
		wpua_display_comment();
		wpua_display_useragent(true);
		add_filter('comment_text', 'wpua_useragent');
	}
	elseif ($wpua_output_location === 'custom')
	{
		wpua_display_useragent();
	}
}

/**
 * Print user comment now
 */
function wpua_display_comment()
{
	global $comment;

	remove_filter('comment_text', 'wpua_useragent');
	apply_filters('get_comment_text', $comment->comment_content);

	// The following conditional will hopefully prevent a problem where
	// the echo statement will interrupt redirects from the comment page.
	if (empty($_POST['comment_post_ID']) || is_admin())
	{
		echo apply_filters('comment_text', $comment->comment_content);
	}
}

/**
 * DEPRECATED: Please use wpua_custom_output() instead
 * Deprecated in v1.0.9. Will be removed in a future release.
 */
function useragent_output_custom()
{
	wpua_custom_output();
}

/**
 * Custom function for displaying the output in non-standard locations. Can
 * be used to display user agent in a custom area of user's template.
 */
function wpua_custom_output()
{
	global $wpua_output_location, $useragent, $comment;

	if ($wpua_output_location === 'custom')
	{
		$useragent = wpua_str_escape($comment->comment_agent);
		wpua_display_useragent();
	}
}

/**
 * Generates html markup for final user agent output
 */
function wpua_display_useragent($wpua_wrapper_div = false)
{
	global $comment, $wpua_show_text_icons, $wpua_text_using, $wpua_text_on, $wpua_text_via, $wpua_show_full_ua, $wpua_hide_unknown_ua, $wpua_doctype;

	// Check if the comment is a trackback or a comment
	$wpua_useragent = '';
	if ($comment->comment_type === 'trackback' || $comment->comment_type === 'pingback')
	{
		// We've got a trackback...
		$trackback = wpua_detect_trackback();

		// Should unknown trackbacks be filtered? Display text, icons, or both?
		if ($wpua_hide_unknown_ua !== 'true' || !strpos($trackback,'Unknown'))
		{
			$wpua_useragent = ($wpua_show_text_icons === 'icons_and_text' || $wpua_show_text_icons === 'text') ? "$wpua_text_via $trackback" : $trackback;
		}
	}
	else
	{
		// We've got a comment...
		$webbrowser = wpua_detect_webbrowser();
		$platform = wpua_detect_platform();

		// Should unknown browsers/platforms be filtered? Display text, icons, or both?
		if ($wpua_hide_unknown_ua === 'true' && strpos($webbrowser,'Unknown') && strpos($platform,'Unknown'))
		{
			// Leave the useragent empty since web browser and platform were unknown and option to hide unknowns is enabled.
		}
		elseif ($wpua_hide_unknown_ua === 'true' && strpos($webbrowser,'Unknown'))
		{
			// Web browser was unknown and option to hide unknowns is enabled, only return the platform.
			$wpua_useragent = ($wpua_show_text_icons === 'icons_and_text' || $wpua_show_text_icons === 'text') ? "$wpua_text_on $platform" : $platform;
		}
		elseif ($wpua_hide_unknown_ua === 'true' && strpos($platform,'Unknown'))
		{
			// Platform was unknown and option to hide unknowns is enabled, only return the web browser.
			$wpua_useragent = ($wpua_show_text_icons === 'icons_and_text' || $wpua_show_text_icons === 'text') ? "$wpua_text_using $webbrowser" : $webbrowser;
		}
		else
		{
			$wpua_useragent = ($wpua_show_text_icons === 'icons_and_text' || $wpua_show_text_icons === 'text') ? "$wpua_text_using $webbrowser $wpua_text_on $platform" : $webbrowser.$platform;
		}
	}

	// Does the user want to display the full useragent string?
	if ($wpua_show_full_ua === 'true')
	{
		// Attach the full ua string to the output.
		$br = (strlen($wpua_useragent) > 0) ? (($wpua_doctype === 'html') ? '<br>' : '<br />') : '';
		$wpua_useragent .= "$br<small>".wpua_str_escape($comment->comment_agent)."</small>";
	}

	if ($wpua_wrapper_div === true)
	{
		// Wrap WP-UserAgent output in div
		$wpua_useragent = "<div class='wp-useragent'>$wpua_useragent</div>";
	}

	// The following conditional will hopefully prevent a problem where
	// the echo statement will interrupt redirects from the comment page.
	if (empty($_POST['comment_post_ID']) || is_admin()) echo $wpua_useragent;
}

/**
 * Return icon and/or text
 */
function wpua_get_icon_text($link, $title, $code, $type)
{
	$icon = wpua_get_icon($title, $code, $type);
	$text = wpua_get_text($link, $title);

	return "$icon $text";
}

/**
 * Generates html markup for <img> tags
 */
function wpua_get_icon($title, $code, $type)
{
	global $wpua_show_text_icons, $wpua_icon_size, $wpua_icon_style, $wpua_icon_style_input, $wpua_img_url, $wpua_doctype;

	if ($wpua_show_text_icons === 'icons_and_text' || $wpua_show_text_icons === 'icons')
	{
		// Generate image class or style (most commonly using default style)
		$img_style = ($wpua_icon_style === 'css') ? 'class="'.$wpua_icon_style_input.'"' : 'style="'.$wpua_icon_style_input.'"';

		// Set the img to display browser/os/device. Ex. http://blogurl/plugins/plugin-name/size/net-os-device/code.png
		$img_src = $wpua_img_url.$wpua_icon_size.$type.$code.'.png';

		// Select the correct closing tag based on doctype
		$img_close = ($wpua_doctype === 'html') ? '' : ' /';

		return "<img src='$img_src' title='$title' $img_style alt='$title' height='$wpua_icon_size' width='$wpua_icon_size'$img_close>";
	}

	return '';
}

/**
 * Generates html markup for link <a> tags or returns title if links are disabled
 */
function wpua_get_text($link, $title)
{
	global $wpua_show_text_icons, $wpua_text_links;

	if ( ($wpua_show_text_icons === 'icons_and_text' || $wpua_show_text_icons === 'text') && $wpua_text_links === 'true' && $title !== 'Unknown')
	{
		return "<a href='$link' title='$title' rel='nofollow'>$title</a>";
	}
	elseif ($wpua_show_text_icons === 'icons_and_text' || $wpua_show_text_icons === 'text')
	{
		return $title;
	}

	return '';
}

/**
 * Add a link to our Options page for Admin users.
 */
add_action('admin_menu', 'wpua_add_option_page');
function wpua_add_option_page()
{
	add_options_page('WP-UserAgent', 'WP-UserAgent', 'manage_options', 'wp-useragent/wp-useragent-options.php');
}

/**
 * Add quick links to plugins page
 */
$plugin_basename = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin_basename", 'wpua_add_action_links' );
function wpua_add_action_links( $links )
{
	// Add a link to this plugin's 'Settings' page
	$settings_link = '<a href="options-general.php?page=wp-useragent/wp-useragent-options.php">Settings</a>';
	array_unshift($links, $settings_link);
	return $links;
}

// If the user selected to display output in a standard location
// and not a custom location then lets add a filter here.
if ($wpua_admin_only === 'true' && is_admin())
{
	if ($wpua_output_location !== 'custom')
	{
		add_filter('comment_text', 'wpua_useragent');
	}
}
elseif ($wpua_admin_only !== 'true' && $wpua_output_location !== 'custom')
{
	add_filter('comment_text', 'wpua_useragent');
}

/**
 * Add activation hook to create necessary db options with autoload disabled
 */
register_activation_hook( __FILE__, 'wpua_activation' );
function wpua_activation()
{
	// Add new options and attempt to specify no autoload
	if ( ! add_option( 'wpua_doctype', '', '', 'no' ) ) update_option( 'wpua_doctype', '' );
	if ( ! add_option( 'wpua_icon_size', '', '', 'no' ) ) update_option( 'wpua_icon_size', '' );
	if ( ! add_option( 'wpua_show_text_icons', '', '', 'no' ) ) update_option( 'wpua_show_text_icons', '' );
	if ( ! add_option( 'wpua_icon_style', '', '', 'no' ) ) update_option( 'wpua_icon_style', '' );
	if ( ! add_option( 'wpua_icon_style_input', '', '', 'no' ) ) update_option( 'wpua_icon_style_input', '' );
	if ( ! add_option( 'wpua_text_using', '', '', 'no' ) ) update_option( 'wpua_text_using', '' );
	if ( ! add_option( 'wpua_text_on', '', '', 'no' ) ) update_option( 'wpua_text_on', '' );
	if ( ! add_option( 'wpua_text_via', '', '', 'no' ) ) update_option( 'wpua_text_via', '' );
	if ( ! add_option( 'wpua_show_version', '', '', 'no' ) ) update_option( 'wpua_show_version', '' );
	if ( ! add_option( 'wpua_text_links', '', '', 'no' ) ) update_option( 'wpua_text_links', '' );
	if ( ! add_option( 'wpua_show_full_ua', '', '', 'no' ) ) update_option( 'wpua_show_full_ua', '' );
	if ( ! add_option( 'wpua_hide_unknown_ua', '', '', 'no' ) ) update_option( 'wpua_hide_unknown_ua', '' );
	if ( ! add_option( 'wpua_admin_only', '', '', 'no' ) ) update_option( 'wpua_admin_only', '' );
	if ( ! add_option( 'wpua_output_location', '', '', 'no' ) ) update_option( 'wpua_output_location', '' );
}

/**
 * Load plugin textdomain: wp-useragent
 */
add_action( 'plugins_loaded', 'wpua_load_textdomain' );
function wpua_load_textdomain()
{
	load_plugin_textdomain( 'wp-useragent', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}

?>
