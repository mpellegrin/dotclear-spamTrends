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
 
require dirname(__FILE__).'/_widgets.php';
 
class publicSpamTrendsWidget
{
	public static function spamTrends($w)
	{
		global $core;

		if ($w->offline)
			return;

		if (($w->homeonly == 1 && $core->url->type != 'default') ||
			($w->homeonly == 2 && $core->url->type == 'default')) {
			return;
		}
		
		$rs = $core->con->select('SELECT p.post_title, post_lang, p.post_url, p.post_type, COUNT(comment_id) AS spam_count FROM '.$core->prefix.'comment c INNER JOIN '.$core->prefix.'post p ON c.post_id = p.post_id WHERE c.comment_status=\'-2\' AND p.post_password IS NULL AND p.post_status=\'1\' GROUP BY c.post_id, p.post_title, p.post_lang, p.post_url, p.post_type ORDER BY spam_count DESC LIMIT '.$core->con->escape($w->result_count).';');

		$res =
		($w->title ? $w->renderTitle(html::escapeHTML($w->title)) : '');
		if ($rs->count() > 0) {
		'<ul>';

			while ($rs->fetch()) {
				$res .= '<li><a lang="'.html::escapeHTML($rs->f('post_lang')).'" href="'.html::escapeHTML($core->blog->url.$core->url->getURLFor($rs->f('post_type'),$rs->f('post_url'))).'">'.html::escapeHTML($rs->f('post_title')).' ('.$rs->f('spam_count').')</a></li>';
			}
			$res .= '</ul>';
		} else {
			$res .= '<p>'.__('No matching posts.').'</p>';
		}

		return $w->renderDiv($w->content_only,'spamtrends '.$w->class,'',$res);
	}
}