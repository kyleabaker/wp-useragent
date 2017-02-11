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

// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
{
	exit();
}

delete_option('wpua_doctype');
delete_option('wpua_icon_size');
delete_option('wpua_show_text_icons');
delete_option('wpua_icon_style');
delete_option('wpua_icon_style_input');
delete_option('wpua_text_using');
delete_option('wpua_text_on');
delete_option('wpua_text_via');
delete_option('wpua_show_version');
delete_option('wpua_text_links');
delete_option('wpua_show_full_ua');
delete_option('wpua_hide_unknown_ua');
delete_option('wpua_admin_only');
delete_option('wpua_output_location');

// For site options in Multisite
delete_site_option('wpua_doctype');
delete_site_option('wpua_icon_size');
delete_site_option('wpua_show_text_icons');
delete_site_option('wpua_icon_style');
delete_site_option('wpua_icon_style_input');
delete_site_option('wpua_text_using');
delete_site_option('wpua_text_on');
delete_site_option('wpua_text_via');
delete_site_option('wpua_show_version');
delete_site_option('wpua_text_links');
delete_site_option('wpua_show_full_ua');
delete_site_option('wpua_hide_unknown_ua');
delete_site_option('wpua_admin_only');
delete_site_option('wpua_output_location');
?>