<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of spamTrend, a plugin for Dotclear 2.
#
# Copyright (c) 2013-2015 Mathieu Pellegrin and contributors
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_RC_PATH')) { return; }

$this->registerModule(
	/* Name */			"SPAM Trends",
	/* Description*/		"Display trending posts based on spam count",
	/* Author */			"Mathieu  Pellegrin",
	/* Version */			'1.1',
	/* Properties */
	array(
		'permissions' => 'admin',
		'type' => 'plugin',
		'dc_min' => '2.7',
		'support' => 'http://uname.pingveno.net/blog/index.php/contact',
		'details' => 'http://plugins.dotaddict.org/dc2/details/spamTrends'
		)
);
