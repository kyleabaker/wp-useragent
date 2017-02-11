<?php
/* Copyright 2008-2016  Kyle Baker  (email: kyleabaker@gmail.com)

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

?>
<!--Begin: Options file for WP-UserAgent-->
<style>
	.wp-useragent .hndle {
		cursor: auto !important;
		-webkit-user-select: auto !important;
		-moz-user-select: auto !important;
		-ms-user-select: auto !important;
		user-select: auto !important;
	}
	.wp-useragent .postbox .inside > p {
		padding-left: 10px;
		padding-right: 10px;
	}
	/* comment preview styling */
	.wp-useragent #wpua_preview {
		position: relative;
		background-color: #eee;
		padding: 10px;
		text-align: left;
		width: 450px;
	}
	.wp-useragent #wpua_preview img {
		vertical-align: middle;
	}
	.wp-useragent #wpua_preview .wpua_user {
		color: #777;
		font-size: 10px;
		margin-bottom: 1em;
	}
	.wp-useragent #wpua_preview .avatar {
		float: right;
		border: none;
		height: 32px;
		width: 32px;
	}
	.wp-useragent #wpua_preview .wpua_user a {
		font-size: 16px;
		font-weight: bold;
		text-decoration: none;
	}
	.wp-useragent #wpua_preview #wpua_content_bottom {
		padding-top: 10px;
	}
	.wp-useragent #wpua_preview #wpua_string_top {
		padding-bottom: 5px;
	}
	.wp-useragent #wpua_preview #wpua_string_top,
	.wp-useragent #wpua_preview #wpua_string_bottom {
		color: #777;
		font-size: 10px;
	}
	/* custom reset button style */
	.wp-core-ui .button-primary.reset {
		background: #ff4c4c;
		border-color: #ff3232 #ff0000 #ff0000;
		-webkit-box-shadow: 0 1px 0 #ff0000;
		box-shadow: 0 1px 0 #ff0000;
		color: #fff;
		text-decoration: none;
		text-shadow: 0 -1px 1px #ff0000,1px 0 1px #ff0000,0 1px 1px #ff0000,-1px 0 1px #ff0000;
		margin-right: 5px;
	}
	.wp-core-ui .button-primary.reset:hover {
		background: #ff6666;
	}
</style>
<div class="wrap wp-useragent" id="sm_div">
	<form method="post" action="options.php">
		<?php
			wp_nonce_field('update-options');
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

			// Cleanup or migrate settings from previous database schema if necessary
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
			if (empty($wpua_icon_style_input) && is_null($wpua_icon_style_input)) $wpua_icon_style_input = '';
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
		?>
		<h2>WP-UserAgent</h2>
		<p>
			<a href="https://www.kyleabaker.com/goodies/coding/wp-useragent/" target="_blank" class="button"><?php _e('Plugin Homepage', 'wp-useragent'); ?></a>
			<a href="https://wordpress.org/support/plugin/wp-useragent" target="_blank" class="button"><?php _e('Support', 'wp-useragent'); ?></a>
			<a href="https://wordpress.org/plugins/wp-useragent/changelog/" target="_blank" class="button"><?php _e('Changelog', 'wp-useragent'); ?></a>
			<a href="https://translate.wordpress.org/projects/wp-plugins/wp-useragent" target="_blank" class="button"><?php _e('Translate', 'wp-useragent'); ?></a>
			<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=3S4Q4FH7BH9EG&item_name=Wordpress%20Plugin%20(WP-UserAgent)&no_shipping=1&no_note=1&tax=0&currency_code=USD&bn=PP%2dDonationsBF&charset=UTF%2d8&lc=US" target="_blank" class="button" title="<?php _e('Donate to Kyle Baker (kyleabaker.com) for this plugin via PayPal', 'wp-useragent'); ?>"><?php _e('Donate', 'wp-useragent'); ?></a>
		</p>
		<div id="poststuff" class="metabox-holder">
			<div id="post-body-content">
				<div class="meta-box-sortables">
					<!-- Markup Document Type -->
					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="true">
							<span class="screen-reader-text"><?php _e('Toggle panel', 'wp-useragent'); ?>: <?php _e('Markup Document Type', 'wp-useragent'); ?></span><span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h3 class="hndle"><span><?php _e('Markup Document Type', 'wp-useragent'); ?></span></h3>
						<div class="inside">
							<p class="description"><?php _e('This option will not affect the way this plugin appears on your site. However, you may use this setting to control the markup that this plugin generates to match the DocType your template is using. Learn more', 'wp-useragent'); ?>: <a href="http://www.w3schools.com/tags/tag_DOCTYPE.asp" target="_blank"><?php _e('DocType', 'wp-useragent'); ?></a>.
							<?php _e('This is useful when you need to ensure your site contains only valid HTML/XHTML. To verify the markup, you may validate any page on your site using W3.org\'s Markup Validation Service. When you\'re done just specify the DocType here. Use the validation service', 'wp-useragent'); ?>: <a href="https://validator.w3.org/" target="_blank"><?php _e('W3.org Markup Validation Service', 'wp-useragent'); ?></a>.</p>

							<table class="form-table">
								<tbody>
									<tr>
										<th><?php _e('DocType', 'wp-useragent'); ?></th>
										<td>
											<select id="wpua_doctype" name="wpua_doctype">
												<option value="html" <?php if ($wpua_doctype === 'html') echo 'selected="selected"'; ?>><?php _e('html', 'wp-useragent'); ?></option>
												<option value="xhtml" <?php if ($wpua_doctype === 'xhtml') echo 'selected="selected"'; ?>><?php _e('xhtml', 'wp-useragent'); ?></option>
											</select>
											<p class="description"><?php _e('The default and most common document type is', 'wp-useragent'); ?>: <code><?php _e('html', 'wp-useragent'); ?></code>.</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<!-- User Agent icons -->
					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="true">
							<span class="screen-reader-text"><?php _e('Toggle panel', 'wp-useragent'); ?>: <?php _e('User Agent icons', 'wp-useragent'); ?></span><span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h3 class="hndle"><span><?php _e('User Agent icons', 'wp-useragent'); ?></span></h3>
						<div class="inside">
							<p class="description"><?php _e('Change the size of the icons as well as whether or not you wish to display text with the icons.', 'wp-useragent'); ?></p>

							<table class="form-table">
								<tbody>
									<tr>
										<th><?php _e('Icon size', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_icon_size" name="wpua_icon_size">
												<option value="16" <?php if ($wpua_icon_size === '16') echo 'selected="selected"'; ?>><?php _e('16', 'wp-useragent'); ?></option>
												<option value="24" <?php if ($wpua_icon_size === '24') echo 'selected="selected"'; ?>><?php _e('24', 'wp-useragent'); ?></option>
											</select> <?php _e('pixels', 'wp-useragent'); ?>
										</td>
									</tr>
									<tr>
										<th><?php _e('Icons and/or text', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_show_text_icons" name="wpua_show_text_icons">
												<option value="icons_and_text" <?php if ($wpua_show_text_icons === 'icons_and_text') echo 'selected="selected"'; ?>><?php _e('Icons and text', 'wp-useragent'); ?></option>
												<option value="icons" <?php if ($wpua_show_text_icons === 'icons') echo 'selected="selected"'; ?>><?php _e('Icons only', 'wp-useragent'); ?></option>
												<option value="text" <?php if ($wpua_show_text_icons === 'text') echo 'selected="selected"'; ?>><?php _e('Text only', 'wp-useragent'); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<th><?php _e('Inline style or class for images', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_icon_style" name="wpua_icon_style">
												<option value="default" <?php if ($wpua_icon_style === 'default') echo 'selected="selected"'; ?>><?php _e('Default', 'wp-useragent'); ?></option>
												<option value="inline" <?php if ($wpua_icon_style === 'inline') echo 'selected="selected"'; ?>><?php _e('Inline Style', 'wp-useragent'); ?></option>
												<option value="css" <?php if ($wpua_icon_style === 'css') echo 'selected="selected"'; ?>><?php _e('Class', 'wp-useragent'); ?></option>
											</select>

											<p class="description"><?php _e('If you\'re not sure what this is, please leave it as &quot;Default&quot; which applies a no-border style.', 'wp-useragent'); ?><br />
												<?php _e('Comment Preview below does not reflect this change.', 'wp-useragent'); ?></p>

											<input type="text" id="wpua_icon_style_input" name="wpua_icon_style_input" value="<?php echo $wpua_icon_style_input; ?>" class="hidden" />
											<p id="wpua_icon_style_css" class="description hidden"><?php _e('CSS class name(s). Example', 'wp-useragent'); ?>: &lt;img src=&quot;...&quot; class=&quot;<code>wpua-img</code>&quot;&gt;</p>
											<p id="wpua_icon_style_inline" class="description hidden"><?php _e('Inline style(s). Example', 'wp-useragent'); ?>: &lt;img src=&quot;...&quot; style=&quot;<code>border: 1px solid #000;margin-left: 3px;</code>&quot;&gt;</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<!-- Display text -->
					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="true">
							<span class="screen-reader-text"><?php _e('Toggle panel', 'wp-useragent'); ?>: <?php _e('Display text', 'wp-useragent'); ?></span><span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h3 class="hndle"><span><?php _e('Display text', 'wp-useragent'); ?></span></h3>
						<div class="inside">
							<p class="description"><?php _e('You can set the text to be displayed between the Web Browser and the Operating System using the following options.', 'wp-useragent'); ?></p>

							<table class="form-table">
								<tbody>
									<tr>
										<th><?php _e('Word for', 'wp-useragent'); ?> <code><?php _e('Using', 'wp-useragent'); ?></code>:</th>
										<td>
											<input type="text" id="wpua_text_using" name="wpua_text_using" value="<?php echo $wpua_text_using; ?>" />
										</td>
									</tr>
									<tr>
										<th><?php _e('Word for', 'wp-useragent'); ?> <code><?php _e('on', 'wp-useragent'); ?></code>:</th>
										<td>
											<input type="text" id="wpua_text_on" name="wpua_text_on" value="<?php echo $wpua_text_on; ?>" />
										</td>
									</tr>
									<tr>
										<th><?php _e('Word for', 'wp-useragent'); ?> <code><?php _e('via', 'wp-useragent'); ?></code>:</th>
										<td>
											<input type="text" id="wpua_text_via" name="wpua_text_via" value="<?php echo $wpua_text_via; ?>" />
											<p class="description"><?php _e('Displayed for Trackbacks and Pingbacks. Default value is empty.', 'wp-useragent'); ?></p>
										</td>
									</tr>
									<tr>
										<th><?php _e('Show version numbers', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_show_version" name="wpua_show_version">
												<option value="full" <?php if ($wpua_show_version === 'full') echo 'selected="selected"'; ?>><?php _e('Full', 'wp-useragent'); ?></option>
												<option value="simple" <?php if ($wpua_show_version === 'simple') echo 'selected="selected"'; ?>><?php _e('Simple', 'wp-useragent'); ?></option>
												<option value="false" <?php if ($wpua_show_version === 'false') echo 'selected="selected"'; ?>><?php _e('No', 'wp-useragent'); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<th><?php _e('Use links on text', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_text_links" name="wpua_text_links">
												<option value="true" <?php if ($wpua_text_links !== 'false') echo 'selected="selected"'; ?>><?php _e('Yes', 'wp-useragent'); ?></option>
												<option value="false" <?php if ($wpua_text_links === 'false') echo 'selected="selected"'; ?>><?php _e('No', 'wp-useragent'); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<th><?php _e('Display complete User-Agent', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_show_full_ua" name="wpua_show_full_ua">
												<option value="true" <?php if ($wpua_show_full_ua === 'true') echo 'selected="selected"'; ?>><?php _e('Yes', 'wp-useragent'); ?></option>
												<option value="false" <?php if ($wpua_show_full_ua !== 'true') echo 'selected="selected"'; ?>><?php _e('No', 'wp-useragent'); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<th><?php _e('Hide Unknown Useragents', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_hide_unknown_ua" name="wpua_hide_unknown_ua">
												<option value="true" <?php if ($wpua_hide_unknown_ua === 'true') echo 'selected="selected"'; ?>><?php _e('Yes', 'wp-useragent'); ?></option>
												<option value="false" <?php if ($wpua_hide_unknown_ua !== 'true') echo 'selected="selected"'; ?>><?php _e('No', 'wp-useragent'); ?></option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<!-- Display location -->
					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="true">
							<span class="screen-reader-text"><?php _e('Toggle panel', 'wp-useragent'); ?>: <?php _e('Display location', 'wp-useragent'); ?></span><span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h3 class="hndle"><span><?php _e('Display location', 'wp-useragent'); ?></span></h3>
						<div class="inside">
							<p class="description"><?php _e('You can change the location that the User Agent output will appear (select \'Custom (Advanced)\' for further explanation).', 'wp-useragent'); ?></p>

							<table class="form-table">
								<tbody>
									<tr>
										<th><?php _e('Admin Section Only', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_admin_only" name="wpua_admin_only">
												<option value="true" <?php if ($wpua_admin_only === 'true') echo 'selected="selected"'; ?>><?php _e('Yes', 'wp-useragent'); ?></option>
												<option value="false" <?php if ($wpua_admin_only !== 'true') echo 'selected="selected"'; ?>><?php _e('No', 'wp-useragent'); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<th><?php _e('UserAgent Output Location', 'wp-useragent'); ?>:</th>
										<td>
											<select id="wpua_output_location" name="wpua_output_location">
												<option value="before" <?php if ($wpua_output_location === 'before') echo 'selected="selected"'; ?>><?php _e('Before comment text', 'wp-useragent'); ?></option>
												<option value="after" <?php if ($wpua_output_location === 'after') echo 'selected="selected"'; ?>><?php _e('After comment text', 'wp-useragent'); ?></option>
												<option value="custom" <?php if ($wpua_output_location === 'custom') echo 'selected="selected"'; ?>><?php _e('Custom (Advanced)', 'wp-useragent'); ?></option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<!-- Comment Preview Box -->
					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="true">
							<span class="screen-reader-text"><?php _e('Toggle panel', 'wp-useragent'); ?>: <?php _e('Comment Preview', 'wp-useragent'); ?></span><span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h3 class="hndle"><span><?php _e('Comment Preview', 'wp-useragent'); ?></span></h3>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<td>
											<div id="wpua_preview">
												<div class="wpua_user">
													<img class="avatar" src="data:image/png;base64,/9j/4AAQSkZJRgABAQAAAQABAAD//gA7Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBxdWFsaXR5ID0gOTAK/9sAQwADAgIDAgIDAwMDBAMDBAUIBQUEBAUKBwcGCAwKDAwLCgsLDQ4SEA0OEQ4LCxAWEBETFBUVFQwPFxgWFBgSFBUU/9sAQwEDBAQFBAUJBQUJFA0LDRQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQU/8AAEQgAIAAgAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A/VOuC8T6rquv2N/aabrlj4UguJZNLs9Ru4/MnmucMp8lS6AEMrAA7ixUkDGCe9r5g/aO+Nd78Fteg0jwwLPUtRv92oNZ6lB5sVlIxIV4yGUhnfc20kgcnIyBTSbdkcWMxdDA0XXxMuWK6+unTU6P9nfWfGHg+x13w58Qbu61S4tdZe3stWluluN8TLGq7suZQhkPBZeC4UngV75XwZ4a/aMj0jxFoX/CSKtzp09wW1HUVtFW+Uecs3+saNS0Il2sVABwvTgZ+74J47mGOaJ1kikUOjqchgRkEVzYev8AWaaqqLjfo1Z/cXQeHhfDUKqqclk2pc260u+unfXvqfOn7Wf7P3jr4syaXrPgHxbLoWq2EDwvYPdS28Vz825WDp0YHI+YEEEdMV8TfEI/E5PH17P8T9IfQfFqWluqXSyI8V2kaGLzUcbl+baM4/iycDoP1V1S+v7Z8WtiLhMff3/0r52+IXw68UfGPxzHH4o8MWT6LpN0sltM1uWWeE7WMZ5y+eQVPyggkdq3qYp0eRcrlrbRd+77Lz+R5ebZKs4w06MaihLR3d7aNdOra0+Z8GXsk3jK6GnpK7TXBS2gSWQu0cjsBvPyLgA4GcdjX69+FtEXw14Y0jSEcyJp9nDaBz1YIgXP6V86/Er4IPLrWj+JvCngfSLTVdKO4Q21iIfNIYMhKAhH2ndw2DzkHIAr3jwBf+I7/wAOWD+J7CGy1ZoFa4WBvlDn+HHqO/bIOKJYj2lR03Fq3Xo/R/pv8rHNkeQ/2NCpN1FLna20tZdvxP/Z" alt="gravatar" />
													<a href="#">kyleabaker</a><br />
													<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAANWSURBVHjaYvz//z8DJQAggFjQBQ6s7HZiZ/5Szc7xy4CZlZn375//DN+/fn/39QvDie9/ODv901qPI6sHCCBGZBccXt0+TUDgU7KgfAAbO58oAzuXIMP///8Yvnx4xvDuyTWGZzf2f/34mbUzrGByM0wPQADBDTi4sm2ijIpQnpC8F8Prb7wMl+9+ZHj1/hvDn7//GQR5ORi0lXkYBP/fY7h+aBHDy1d/yhKqZneD9AEEENiAXUs6bYQF3uxTMMtmvfaMneHNh58MeipCDAJ8TAz/GRgZ3n38y3DqxmsGHnYmBk2+mwxntiz89p1ZyCalcup5gABiApnC/O99Fb+MM+vr73wML979YAh0UGAQ4v3P8O7LFwYePm4GOVk+hgAXZYaXn/8xvGHSYhBXlOb6++19EUgvQACBDWBi/GbILSTDcPbmOwYdNWGGb8CAY2VlZdi9cwfDp48fGX7//Mmwa/d+Bi01EYbj1z4wSKiZMTD//2UD0gsQQGADgN4Q4OAWZHj25huDsDAnw0+gv9m4uBiePHrEsHvfQYbW9k4GXl5uBkExLobnQBfyiyowMDMwioP0AgQQ2IDfP38z/Pv3k+H7r39AzUD+PwaGVx8/M3Dz8DBcvniBwTsgkMHQ1Izh5x+gHFDy/78fQAwJfIAAAqeDr1++P//48pYiP7cUw/0X3xhUZfiB/uJgMDKxYNDQ1WHg4udj+PKTgeHxi68MfNxMDO+fXmT48efvG5BegAACu+Dzd4aDj68dZDBT52Q4fv4lAys7AwM3ByuDja0Vg4ggHwOQy8DDwcBw+vwrBjttJoaHl44x/P7PcgKkFyCAwAb8ZeKd+Ojm/e9Cv08wyPJ+YZi35ibDw6cfGBiBXmP8/pvh0eMPDLNW3WCQ43zFIPp9O8Pju19/MLLzgdMBQADBE9LspqQKHvYv7QYOjgwvmcwYjl/9w/Dh81+Gv0C/8nIxMFhq/WcQ+bmL4fSuUwzfGYQbCzqWNoD0AQQQSlKeVhtXy/rnc5m4PBePrJo2g4CkPDCK/jC8fXKb4cHlKwwvn/37+puFp6+gc1kdTA9AADGi58ZpdUlmf358KmT6+9uKhem/KEjszz/G13+ZWE4wsvH05bUuPImsHiCAGCnNzgABBgBEV02Y8mpPdAAAAABJRU5ErkJggg==" alt="Posted:" /> July 4, 2008 at 12:01 pm
												</div>

												<div id="wpua_content_top"></div><div id="wpua_string_top"></div>

												<div>
													<?php _e('This preview is intended to give you a general idea of how comments will appear with your current settings and is updated as you make changes.', 'wp-useragent'); ?>
													<br /><br />
													<?php _e('If you\'re happy with the changes that you\'ve made, then make sure that you click the &quot;Save Changes&quot; button below.', 'wp-useragent'); ?>
												</div>

												<div id="wpua_content_bottom"></div><div id="wpua_string_bottom"></div>
											</div>

											<div id="wpua_output_custom_location" style="display:none;">
												<strong><?php _e('Custom Output Usage', 'wp-useragent'); ?>:</strong> <?php _e('There are 3 options available to display the commenter\'s browser and operating system. The default option is', 'wp-useragent'); ?>: '<?php _e('Before comment text', 'wp-useragent'); ?>'<br /><br />
												<ol>
													<li>
														<p class="description">
															<strong><?php _e('Before comment text', 'wp-useragent'); ?></strong><br />
															<?php _e('Web browser and operating system details appear before comment text.', 'wp-useragent'); ?>
														</p>
													</li>
													<li>
														<p class="description">
															<strong><?php _e('After comment text', 'wp-useragent'); ?></strong><br />
															<?php _e('Web browser and operating system details appear after comment text.', 'wp-useragent'); ?>
														</p>
													</li>
													<li>
														<p class="description">
															<strong><?php _e('Custom (Advanced)', 'wp-useragent'); ?></strong><br />
															<?php _e('You can specify the location using the wpua_custom_output() function inside the comments loop in your template (generally in the \'comments.php\' template file).', 'wp-useragent'); ?><br /><br />
														</p>
														<em><?php _e('Example', 'wp-useragent'); ?>:</em><br />
														<p style="padding-left:20px;">
															<code style="display:block;">
																&lt;?php foreach ($comments as $comment) : ?&gt;<br />
																&lt;cite&gt;&lt;?php comment_author_link() ?&gt;&lt;/cite&gt; <span style="background-color:#fff;"><strong>&lt;?php wpua_custom_output(); ?&gt;</strong></span> <?php _e('says', 'wp-useragent'); ?>:&lt;br /&gt;<br />
																&lt;?php comment_text() ?&gt;
															</code><br />
															<p class="description"><?php _e('CAUTION: If you select \'Custom (Advanced)\' and don\'t use the custom function call in your template, the browser and operating system details will not be displayed. With this option, they are only displayed where and when this function is called.', 'wp-useragent'); ?></p>
														</p>
													</li>
												</ol>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<!-- Help Box -->
					<div class="postbox">
						<button type="button" class="handlediv button-link" aria-expanded="true">
							<span class="screen-reader-text"><?php _e('Toggle panel', 'wp-useragent'); ?>: <?php _e('Help', 'wp-useragent'); ?></span><span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h3 class="hndle"><span><?php _e('Help', 'wp-useragent'); ?></span></h3>
						<div class="inside">
							<p><?php _e('A simple User-Agent detection plugin that lets you easily insert icons and/or textual web browser and operating system details with each comment.', 'wp-useragent'); ?></p>

							<p>
								<a href="https://www.kyleabaker.com/goodies/coding/wp-useragent/" target="_blank" class="button"><?php _e('Plugin Homepage', 'wp-useragent'); ?></a>
								<a href="https://wordpress.org/support/plugin/wp-useragent" target="_blank" class="button"><?php _e('Support', 'wp-useragent'); ?></a>
								<a href="https://wordpress.org/plugins/wp-useragent/changelog/" target="_blank" class="button"><?php _e('Changelog', 'wp-useragent'); ?></a>
								<a href="https://translate.wordpress.org/projects/wp-plugins/wp-useragent" target="_blank" class="button"><?php _e('Translate', 'wp-useragent'); ?></a>
							</p>

							<table class="form-table">
								<tbody>
									<tr>
										<td>
											<p>
												<?php _e('If you have any problems, questions, comments or suggestions regarding WP-UserAgent please don\'t hesitate to contact me.', 'wp-useragent'); ?><br />
												<strong><?php _e('Author', 'wp-useragent'); ?>:</strong> Kyle Baker (kyleabaker) - <a href="http://twitter.com/kyleabaker">Twitter</a><br />
												<strong><?php _e('Plugin Homepage', 'wp-useragent'); ?>:</strong> <a href="https://www.kyleabaker.com/goodies/coding/wp-useragent/">https://www.kyleabaker.com/goodies/coding/wp-useragent/</a><br />
												<?php _e('Help me afford the cost of maintaining this plugin and the work that goes into it!', 'wp-useragent'); ?> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=3S4Q4FH7BH9EG&item_name=Wordpress%20Plugin%20(WP-UserAgent)&no_shipping=1&no_note=1&tax=0&currency_code=USD&bn=PP%2dDonationsBF&charset=UTF%2d8&lc=US" target="_new"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" name="submit" alt="<?php _e('Donate to Kyle Baker (kyleabaker.com) for this plugin via PayPal', 'wp-useragent'); ?>" title="<?php _e('Donate to Kyle Baker (kyleabaker.com) for this plugin via PayPal', 'wp-useragent'); ?>" style="float:right" /></a>
											</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="wpua_doctype, wpua_icon_size, wpua_show_text_icons, wpua_icon_style, wpua_icon_style_input, wpua_text_using, wpua_text_on, wpua_text_via, wpua_show_version, wpua_text_links, wpua_show_full_ua, wpua_hide_unknown_ua, wpua_admin_only, wpua_output_location" />

					<input type="button" name="Reset" class="button-primary reset" value="<?php _e('Reset Defaults', 'wp-useragent'); ?>" />
					<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'wp-useragent'); ?>" />
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript">
		;(function($){
			"use strict";

			$.fn.wpUserAgent = function() {
				// 16/24 pixel base64 encoded images
				var wpua_icon_net_16 = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9gHHRY3KJ/zsLwAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAADDElEQVQ4y62TTWhcVQCFz73v3vczbzKZTF9mJulvmv4wzYSorVKCJRGRgoui1I2uFVGkK9HoRnBlwepOpEjB/02pJmoQIoHaRCFtTWm1sZ3G2sRkmmQmvunMm3k/993rqi4au/NsD+dbHM4huI9Gd3ZjSzLlJCy7yBjLMNMUpuNUnWee/Z3Z7VXy5BMAAHY/QNbJH9ZN+1ik5MMl389I3xXbQ79a/+LjWWfHzpMAxgCA3Bs8Xixoj2/tOdpp2Z+LMGDznP95/Ldrr61VVpZfyaffHbD0g6adVJt37Xl5U1fuFL0XMDiwf/eOfX0jmzrzrM3JouFWv6IMX8/Vmz9dagWfKKXgew1SKS+/eqfR6t8AyA0eeqp96LEH7IEi7KwDv7I6OnH11yiKPPVtzR+vCQkAaNZqvQ0hn9sASBIyxDgnal8fokwaScu+cde73fCWXCkjQihkLBG3/Ec3lNicOV/0SyVomQzE8qKydWPlrheGnpAaX2fczGkaA9arBQYAp8cucKppBzlne1dOvO7QyioopWBEydZbHw6PSTV75HB/FQDMRLtv2QmAENBYJdmZ8UsvEtA3DYNvM019yXXXIpNIU8kYHbnNmsb0CUaImJy+8Y3B6WfGB+/QHICg6UHzmy1GCH1bKZWNhAAXhHsEXhQ025SSgGmACvFLIMlDKpZPE8WG08W+RFpJhAt/oXV7qUwZo9cBgjiWiCKZJY8M5cM4QhwLKBWjZ3r8mK7Tj8IYqlprdfCEZZD9B6Dv6QVsc5IyTXufUrJKAAShgNj1IOpWClAKgbuOnvL1rZZlvMEZm6iXF9HV9KAMHWEm43pKjmvPvzQyxzVMxbHqA5RD0g7/mzBY81cgvTo6+ge6u9ZuzVy5PHs+NXfxUEHTOpRGZXnh5nsXvx899e+UJ34sbYsiMSylfCEM/AP1H86Yqenv0JtKipSV/KNSXb+TSHcWuncXiNtmf3p5anLkyNlzLvmvI52bWWwPAn+wvHBzb+30ye32rVK6jRvcTDslP7/lyxNTZ0s/z19T+D/0DxVhV1WuGa7rAAAAAElFTkSuQmCC",
					wpua_icon_os_16 = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9gHHRY6HXzuCtIAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAB6ElEQVQ4y33TT2jPcRzH8cfn9/1uMxsbWmsi1jS05cJuyFr7g4t22QgnWg6Sw5aLGwdJymFFTZKk0JTFKIkLByItsvIvSi2HsZ/N2n77OuxbfrF51/vw+fR5vnt/3q/XO/hPjLUKIShHlMwY+3RfCy5hBNvr+RjPB2fbbEUHahHhJjZjaZotuPBPganT1qNq8oEq7MMiCBmhqMytye824SceQfgLLsFdrJge1pz77Bw2YgwVyYyBHx88jorFpcu9TxKDcR5chBPYAnGtXbkvOpIZ2UX3yLapChldZTXOYiHehaAzk9fAmvRf8A0DhY2zMJQO+oqT6MMMqrEjZNu0YGco8bywQZPIfhwv6HZinuGux0Wsw4sYvahJfnqT++JMtEonXv9H3fc4jCWYiDGOBJNiEWIsno/+OKgMe1J5P8c4iMZMueGoSicy2JkaZq7YgL2owO2Qp0IlLucNcneSuFbYM3sYmjVTLa6jDlkc+GOkxIigF80IEhPDPdqHKE190JB2VpcSj/AwzOHEo1j7tlsfrqbywkSI9C9r8nB6TDT6VH99YmSuXTiPIhzC6rz7Zyu7PC2udgy/Kts90T1HgYJu4xgf4hRupFZeECIvi6sdQU36dBtezbuN9eQwnCY5priCVoziDvwGNw6PMb/zL+4AAAAASUVORK5CYII=",
					wpua_icon_net_24 = "iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAFJ0lEQVR4Xt2VW2xU1R6Hf2vty8zsuXSGXmnpMC2tMG0pNW2Aogcsl3gCpEDBIM0BqRjBBBOMPkiIh+QkgvIgGPUByoPyAAQKyk0PF4lQICktESitkWs77diWaaft3Dv7stzTCcYgRXzwxW/v385a2Wv/v7X2elj4uyF4Ro7lZ/O5FtsKo1FaSTk6nef4LCrwEd5o8hgzs1oci5Yc480px8nCBcpfFpwqnlSR48jYJ4omt6oqGCEE53w+ML09y2yAiQCiaEB6cemdLJdrA7flv+efWXDk+anzpma7Tggcb5LjMYgOB3Z4frm7t7llIwBfVart3c3j7bUmkizlyMpR84qL1gk7dn2FP+PjEndu56r/+IfWvsm8r9SyB9XL2PlXVykLikqKkQSCYBb+V5h3t6m8iCVTzO4vWxxnW96bDh2KpzCnfMZHzmmlDsu4cTCbLbDlOuG7037mbPutNiSBLIflWzH5S1VjAMMo/V0dwlAg8tlTBRvLynOemzN3JZwucK4JsGZmQOQp5NjIaTxGc1S5EFQ1MDyCoL+zYzrbf6ByTEH1S3OX2svKOOZ2A5PdoIX5GCEMJpP5Oh7DGwi29SoaCABCiB6KQF8v5Hh86ZgCZ1rqC6T1JojHA2azgZWWQdYUSILwAI8Rj4f9AU0LEUpBCAdCOYBQhNvbZ/IYA/l+xxQ1EACVJBCbFUhPhzbgh8jxD/EENEIHCOUtlPKghCIhU3q8k8YU+Pt6Mn3hEDjKgeN5CAYDSDCkzLt0KYYnQDgxJAgmUMohuRICFo1m/CZoON5i0a2z9QEVosAVBLdvSh+Wf1+LwWoysVPn2t5XFLWZ44Uri+e7o0gCo2SNS1Z7cmTyASIrAt9wokWilN9GKX2D53mz0SDCYBCGekeiWjSmAIzptzYaq71A4Hhxu2gg0K9o49XOk4FA+PNF84supmfmwGGzJTYWqqpA01QQJR4jR7+9foSA1IARgAB2u4RIZORg/zsrprqNQjESxTUNGmNwlVTg2prN0DSCBDynwZ4igePoqejB+pLZknGi7PMjFgkjrovoUH83Tym3MPExiAaAIBiMwWYRl3dkTOhWB7rAwJKr0EMddqRQdWcA4iZFt2gaw/Cw3jMYFpG0NBCXE6K3C8LDAcjDQQQH++5QnqetSMAoEh5V0RIzFAyVVXmqpoLp0bTkL9IbcO76YI/FaniL55iqMCCu8QhFVJBgAKywEHDmgeSOh5iRikhw6Ao1GcWdFEkoCAhhGA5GkDZzLno0jM4cowHUgB8Oi61kzkzXbotFWsNTTmWMwOfrwQR5BCQUBstzAfp+RPV+j7/vMJ33YuEBSTLWJwoDDAwEjFBo1IyusqpRAUPyXbDfB/M46WXo6JL9ZotxA08pIvd/QjalgLcbIAQsOxu9926fmdF27waFjmAwrbdapK0cxyuJgoSpCQ0yltSh3ZKGR/i9HqipqbWqx+uCTlVl3l5BIF+ktDZBjMYBfz9Ibx8GfmwO3bjZ/PYfzoOLTZ2lkUh0WzwuL1RVjTAAg73dUHdvhTvsByEU6bkTUVD7eoe34fCHZ2+3e4KCWPvv3PzXnNkTYcrPxaDRFL309aGa6guN/x/zwGm86pkSjcbqZEWt0VS1IDg8iN6GeuTfuowMnofZZIZdsiASiYBJVphtqbBnZcOXYmttbGmqq/v+7DU8I7qsK//85XurT//w8yf1e46e/HT1uuu7Z1V27ZtWHDpUUa5986/Z3d9V1xw+unb98spJkzn84/gV88c3kvtVaNkAAAAASUVORK5CYII=",
					wpua_icon_os_24 = "iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9gHHQIYGcceg0cAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAAC5klEQVRIx63VT2hcVRQG8N+dzJ8ak1WtxCrWilK1A1YDrlSwQTuoRaTWohsVxNaFiwoTgiiCqGAGurJG6cr6h7RFxBplorbYLsQ/BcFOwdSiVFPUWkRMsE0myXMxN/IYJ8kUPfDgve+e9933zj3n+/gfosbNNcZqTNcYrtE5vxbOh2hig3wIrsYKzODHH6rGAydxWSr12SLPQbYd4smSXjyN23FhaukEenFp0yvXzN9kFiOuV6ysV3ThHO5uIodVq0sK+LQJf2/JDeoVRXyFp7qqjuGVFmk57Ogo2IxB7MMD2LPoGdQrLsERrMQU1k4d8DuOYy6WJofr4l8dwhBO4yasTRIPd4+ay7Ygh9ciORSwo6vqnsmS65PEz92jEpjcYJlgC17EcJonBF9gZ2ixwS043AS/kSQeyvc3iFs0QQ8+RjEF/4YrWp3BY03P3+DRhcihq+oX3IuzKXgFNoWJOwgZt+JaHCz0WYX3sSwm3pcre6fNdh7CthT0diZkPBMP6VUcnTpgBpWYMIPqeczintgcX8crEyZL/kR3KundQp+X8Dl+zZX1/BcZycYhSm9wDvl43z09qCPfb7ZNTVqDrSnoVBZl7Ip9fTq23OMxoTMEvfiyzQ/ehO2p5w8zXVWv40qsx1WFPsWmg9p+9vmlmY82FHRrE3w4G9tsHONQ79PZJCFbsgUf4M1FyEPgZVyegmcw/O85SLyF79NDiYHpwdayUqMnNDTokaal3UVOLqRF6/EROiJU+rbsk8AIfsJ3sRFuwJ24oIniFNYVOdPSD3JlB+sVT2An9s/NGg2N+pYWqNIhjRKdwo34rMiZJR2tXnE/joyV/YExXNQibd/qAdvyyw1EoxlJErvmpWVRR8uV7Y113izls6mYw5P55XbjrohtDEEmKkP7nlxrDONtWIeLMYsTayqGosilP3YkV7axbU/W0OEJ7I/XPzGVkAmOR/OZj2NteXI7UegHD0Zx+wt78cL8+t+YhsdFSTORbAAAAABJRU5ErkJggg==",

				// WP-UserAgent Options Wrapper
					$wpua_useragent = $(this),
					// Markup Document Type
					$wpua_doctype = $wpua_useragent.find('#wpua_doctype'),
					// User Agent icons
					$wpua_icon_size = $wpua_useragent.find('#wpua_icon_size'),
					$wpua_show_text_icons = $wpua_useragent.find('#wpua_show_text_icons'),
					$wpua_icon_style = $wpua_useragent.find('#wpua_icon_style'),
					$wpua_icon_style_input = $wpua_useragent.find('#wpua_icon_style_input'),
					$wpua_icon_style_css = $wpua_useragent.find('#wpua_icon_style_css'),
					$wpua_icon_style_inline = $wpua_useragent.find('#wpua_icon_style_inline'),
					// Display text
					$wpua_text_using = $wpua_useragent.find('#wpua_text_using'),
					$wpua_text_on = $wpua_useragent.find('#wpua_text_on'),
					$wpua_text_via = $wpua_useragent.find('#wpua_text_via'),
					$wpua_show_version = $wpua_useragent.find('#wpua_show_version'),
					$wpua_text_links = $wpua_useragent.find('#wpua_text_links'),
					$wpua_show_full_ua = $wpua_useragent.find('#wpua_show_full_ua'),
					$wpua_hide_unknown_ua = $wpua_useragent.find('#wpua_hide_unknown_ua'),
					// Display location
					$wpua_admin_only = $wpua_useragent.find('#wpua_admin_only'),
					$wpua_output_location = $wpua_useragent.find('#wpua_output_location'),
					$wpua_output_custom_location = $wpua_useragent.find('#wpua_output_custom_location'),
					// Comment Preview
					$wpua_preview = $wpua_useragent.find('#wpua_preview'),
					$wpua_content_bottom = $wpua_useragent.find('#wpua_content_bottom'),
					$wpua_string_bottom = $wpua_useragent.find('#wpua_string_bottom'),
					$wpua_content_top = $wpua_useragent.find('#wpua_content_top'),
					$wpua_string_top = $wpua_useragent.find('#wpua_string_top'),

				// Element event groups
					$change = $wpua_useragent.find('#wpua_icon_size,#wpua_show_text_icons,#wpua_show_version,#wpua_text_links,#wpua_show_full_ua,#wpua_hide_unknown_ua,#wpua_output_location'),
					$keyup = $wpua_useragent.find('#wpua_icon_style_input,#wpua_text_using,#wpua_text_on,#wpua_text_via');

				// Generate Comment Preview
				function preview() {
					"use strict";
					var wpua_ua_string = ($wpua_show_full_ua.val() === 'true') ? 'Opera/9.80 (X11; Ubuntu/9.10 x86_64; U; en) Presto/2.2.15 Version/10.00' : '',
						wpua_text_using = ($wpua_show_text_icons.val() !== 'icons')  ? $wpua_text_using.val()+' ' : '',
						wpua_text_on = ($wpua_show_text_icons.val() !== 'icons')  ? $wpua_text_on.val()+' ' : '',
						wpua_browser_text = ($wpua_show_version.val() === 'false')  ? 'Opera' : (($wpua_show_version.val() === 'simple')  ? 'Opera 10' : 'Opera 10.52'),
						wpua_system_text = ($wpua_show_version.val() === 'false')  ? 'Ubuntu' : (($wpua_show_version.val() === 'simple')  ? 'Ubuntu 9' : 'Ubuntu 9.10'),
						wpua_browser = ($wpua_show_text_icons.val() !== 'icons' && $wpua_text_links.val() !== 'false')  ? ' <a href="http://www.opera.com/" style="text-decoration:none">'+wpua_browser_text+'</a> ' : ' '+wpua_browser_text+' ',
						wpua_system = ($wpua_show_text_icons.val() !== 'icons' && $wpua_text_links.val() !== 'false')  ? ' <a href="http://www.ubuntu.com/" style="text-decoration:none">'+wpua_system_text+'</a>' : ' '+wpua_system_text,
						wpua_content = '';

					// Set content strings
					if ($wpua_show_text_icons.val() !== 'text') {
						if ($wpua_icon_size.val() === '16') {
							wpua_content = wpua_text_using + "<img src='data:image/png;base64," + wpua_icon_net_16 + "' alt='Browser:' style='border:0px;vertical-align:middle;' />" + wpua_browser + wpua_text_on + " <img src='data:image/png;base64," + wpua_icon_os_16 + "' alt='System:' style='border:0px;vertical-align:middle;' />" + wpua_system;
						} else {
							wpua_content = wpua_text_using + "<img src='data:image/png;base64," + wpua_icon_net_24 + "' alt='Browser:' style='border:0px;vertical-align:middle;' />" + wpua_browser + wpua_text_on + " <img src='data:image/png;base64," + wpua_icon_os_24 + "' alt='System:' style='border:0px;vertical-align:middle;' />" + wpua_system;
						}
					} else {
						wpua_content = wpua_text_using + wpua_browser + wpua_text_on + wpua_system;
					}

					// Toggle preview and custom output location directions
					if ($wpua_output_location.val() === 'custom') {
						$wpua_output_custom_location.show();
						$wpua_preview.hide();
					} else {
						$wpua_preview.show();
						$wpua_output_custom_location.hide();

						if ($wpua_output_location.val() === 'before') {
							$wpua_content_bottom.html('');
							$wpua_string_bottom.html('');
							$wpua_content_top.html(wpua_content);
							$wpua_string_top.html(wpua_ua_string);
						} else if ($wpua_output_location.val() === 'after') {
							$wpua_content_top.html('');
							$wpua_string_top.html('');
							$wpua_content_bottom.html(wpua_content);
							$wpua_string_bottom.html(wpua_ua_string);
						}
					}
				}

				// Show/Hide image Class/Inline Style field
				function imageClassOrStyle() {
					"use strict";
					$wpua_icon_style_css.hide();
					$wpua_icon_style_inline.hide();
					if ($wpua_icon_style.val() === 'default') {
						$wpua_icon_style_input.hide();
					} else {
						$wpua_icon_style_input.show();
						($wpua_icon_style.val() === 'inline') ? $wpua_icon_style_inline.show() : $wpua_icon_style_css.show();
					}
				}

				// Toggle Metabox
				function toggleMetaBox() {
					"use strict";
					var $metaboxButton = $(this);
					$metaboxButton.closest('.postbox').toggleClass('closed');
				}

				// Reset Defaults Prompt
				function resetDefaultsPrompt(e) {
					"use strict";
					e.preventDefault();
					var reset = confirm("WP-UserAgent: <?php _e('Are you sure you want to reset all defaults?', 'wp-useragent'); ?>");
					if (reset === true) {
						$wpua_doctype.val('html');
						$wpua_icon_size.val('16');
						$wpua_show_text_icons.val('icons_and_text');
						$wpua_icon_style.val('default');
						$wpua_icon_style_input.val('');
						$wpua_text_using.val('');
						$wpua_text_on.val('');
						$wpua_text_via.val('');
						$wpua_text_links.val('false');
						$wpua_show_full_ua.val('true');
						$wpua_hide_unknown_ua.val('false');
						$wpua_admin_only.val('false');
						$wpua_output_location.val('before');
						preview();
					}
				}

				// Initialize
				function init() {
					"use strict";
					imageClassOrStyle();
					preview();
				}

				// Event Handlers
				$change.on('change', preview);
				$keyup.on('input', preview);
				$wpua_useragent.find('#wpua_icon_style').on('change', imageClassOrStyle);
				$wpua_useragent.find('.postbox button.handlediv.button-link').on('click', toggleMetaBox);
				$wpua_useragent.find('.button-primary.reset').on('click', resetDefaultsPrompt);

				// Initialize
				init();
			};
		})(jQuery);

		jQuery(document).ready(function () {
			jQuery('.wrap.wp-useragent').wpUserAgent();
		});
	</script>
</div>
<!--End: Options file for WP-UserAgent-->
