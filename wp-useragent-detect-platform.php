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

// Detect Platform (check for Device, then OS if no device is found, else return null)
function wpua_detect_platform()
{
	if (strlen($detected_platform = wpua_detect_device()) > 0)
	{
		return $detected_platform;
	}
	elseif (strlen($detected_platform = wpua_detect_os()) > 0)
	{
		return $detected_platform;
	}
	else
	{
		$title = 'Unknown';
		$link = '#';
		$code = 'null';
	}

	return wpua_get_icon_text($link, $title, $code, '/os/');
}

?>
