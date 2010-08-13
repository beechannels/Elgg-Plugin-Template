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

	// Get the specified entity
		$entity_guid = (int) get_input('guid', 0);

	// If we can get out the entity ...
		if ($entity_guid && ($entity = get_entity($entity_guid))) {
					
	// Set the page owner
		if ($entity->container_guid) {
			set_page_owner($entity->container_guid);
		} else {
			set_page_owner($entity->owner_guid);
		}

		$page_owner = page_owner_entity();
			
	// Display it
		$area2 = elgg_view_entity($entity, true);
							
	// Set the title appropriately
		$title = $entity->title;

	// Display through the correct canvas area
		$body = elgg_view_layout("two_column_left_sidebar", $area1, $area2);
			
	// If we're not allowed to see the blog post
		} else {
			
	// Display the 'post not found' page instead
			$body = elgg_view("plugin_name/notfound");
			$title = elgg_echo("plugin_name:notfound");
			
		}
		
	// Display page
		page_draw($title,$body);
		
?>