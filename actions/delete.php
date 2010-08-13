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

	// Make sure we're logged in (send us to the front page if not)
		gatekeeper();

	// Get input data
		$guid = (int) get_input('guid');
		
	// Make sure we actually have permission to edit
		if ($guid && ($entity = get_entity($guid)))
		{
			if ($entity->getSubtype() == "plugin_name_subtype" && $entity->canEdit()) {

			// Delete it!
					if (($entity->delete()) > 0) {		
			// Success message
						system_message(elgg_echo("plugin_name:deleted"));
					} else {
						register_error(elgg_echo("plugin_name:notdeleted"));
					}
			// Forward to the main plugin_name page
					forward("pg/plugin_name/");
			
			}
		}		
?>