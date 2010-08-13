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
		gatekeeper();
		
	// Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($_SESSION['guid']);
		}
		
	// Get the entity, if it exists
		$entity_guid = (int) get_input('guid', 0);
		if ($entity_guid && ($entity = get_entity($entity_guid))) {
			
			if (!$entity->canEdit())
				$entity = 0;
		}
		
		$title = elgg_echo('plugin_name:edit');
		
		$area2 = elgg_view_title($title);
		$area2 .= elgg_view("plugin_name/forms/edit", array('entity' => $entity));
		
		$body = elgg_view_layout("two_column_left_sidebar", $area1, $area2);
		
	// Display page
		page_draw($title, $body);
		
?>