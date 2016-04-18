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
 
$core->addBehavior('initWidgets',
	array('spamTrendsBehaviors','initWidget'));
 
class spamTrendsBehaviors
{
	public static function initWidget($w)
	{
		$w->create('SpamTrendsWidget',__('SPAM Trends'),
			array('publicSpamTrendsWidget','spamTrends'),
			null,
			__('Display trending posts based on spam count'));

		$w->SpamTrendsWidget->setting('title',__('Title:'),
			'SPAM Trends','text');
		$w->SpamTrendsWidget->setting('result_count',__('Limit:'),
			'5','text');
		$w->SpamTrendsWidget->setting('homeonly',__('Display on:'),0,'combo',
			array(
				__('All pages') => 0,
				__('Home page only') => 1,
				__('Except on home page') => 2
				)
		);
 		$w->SpamTrendsWidget->setting('content_only',__('Content only'),0,'check');
 		$w->SpamTrendsWidget->setting('class',__('CSS class:'),'');
		$w->SpamTrendsWidget->setting('offline',__('Offline'),0,'check');
	}
}