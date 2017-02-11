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

// Detect Web Browser versions
function wpua_detect_browser_version($version_ptr)
{
	global $useragent, $wpua_show_version;

	// If show versions option is disabled, return immediately.
	if ($wpua_show_version === 'false') return '';

	// Grab the browser version if its present
	preg_match('/'.$version_ptr.'[\ |\/|\:]?([.0-9a-zA-Z]+)/i', $useragent, $regmatch);
	$version = (is_null($regmatch[1])) ? '' : $regmatch[1] ;

	// Only show simple version? If so, only return the major (ex. 10.52 -> 10)
	if ($wpua_show_version === 'simple' && preg_match('/^([0-9]+)/i', $version, $regmatch))
	{
		$version = $regmatch[1];
	}

	// Return simple browser version
	return $version;
}

?>
