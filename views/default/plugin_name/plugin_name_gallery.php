<?php

	/**
	 * Elgg plugin_name Plugin
	 * 
	 * @package plugin_name
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author plugin_autor
	 * copyright plugin_autor_company dev_yr
	 * @link plugin_autor_company_website
	 * 
	 */
	 
	$owner = $vars['entity']->getOwnerEntity();
	$friendlytime = elgg_view_friendly_time($vars['entity']->time_created);
	
	$icon = elgg_view(
			"profile/icon", array(
									'entity' => $owner,
									'size' => 'small',
								  )
		);
	$info = "<p>" . elgg_echo('plugin_name') . ": <a href=\"{$vars['entity']->getURL()}\">{$vars['entity']->title}</a></p>";
	$info .= "<p class=\"owner_timestamp\"><a href=\"{$owner->getURL()}\">{$owner->name}</a> {$friendlytime}</p>";
	
	echo elgg_view_listing($icon,$info);
?>