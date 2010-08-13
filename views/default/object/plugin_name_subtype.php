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

	if ($vars['full']) {
		echo elgg_view("plugin_name/plugin_name_full",$vars);
	} else {
		if (get_input('search_viewtype') == "gallery") {
			echo elgg_view('plugin_name/plugin_name_gallery',$vars); 				
		} else {
			echo elgg_view("plugin_name/plugin_name_listing",$vars);
		}
	}
?>