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
	 
	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		global $CONFIG;
		admin_gatekeeper();
		set_context('admin');
			
		$title = elgg_echo('plugin_name:admin');
		$area2 = elgg_view_title($title);

	// Display through the correct canvas area
		$body = elgg_view_layout("two_column_left_sidebar", $area1, $area2);
					
	// Display page
		page_draw($title,$body);
		
?>