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
		global $CONFIG;

	// Get input data
		$title = strip_tags(get_input('title'));
		$description = get_input('description');
		$tags = get_input('tags');
		$access = get_input('access_id');
		$guid = get_input('guid', 0);

	// Cache to the session
		$_SESSION['user']->plugin_name_title = $title;
		$_SESSION['user']->plugin_name_description = $description;
		$_SESSION['user']->plugin_name_tags = $tags;
		
	// Convert string of tags into a preformatted array
		$tagarray = string_to_tag_array($tags);
		
	// Make sure the title / description aren't blank
		if (empty($title) || empty($description)) {
			register_error(elgg_echo("plugin_name:blank"));
			forward($_SERVER['HTTP_REFERER']);
		}

	
		if ($guid && ($entity = get_entity($guid)))
		{
			$successmessage = elgg_echo("plugin_name:updated");
			$river = "update";
		}
		else
		{
		
			$successmessage = elgg_echo("plugin_name:added");
			$river = "create";
		// Initialise a new ElggObject
			$entity = new ElggObject();
		// Tell the system the subtype object
			$entity->subtype = "plugin_name_subtype";
		// Set its owner to the current user
			$entity->owner_guid = get_loggedin_userid();
		// Set it's container
			$entity->container_guid = (int)get_input('container_guid', get_loggedin_userid());
			
		}		
	// For now, set its access
		$entity->access_id = $access;
	// Set its title and description appropriately
		$entity->title = $title;
		$entity->description = $description;
	// Now let's add tags. We can pass an array directly to the object property! Easy.
		if (is_array($tagarray)) {
			$entity->tags = $tagarray;
		}
		
	// Now save the object
		if (!$entity->save()) {
			register_error(elgg_echo("plugin_name:error"));
			forward($_SERVER['HTTP_REFERER']);
		}

	// Success message
		system_message($successmessage);
	// add to river
		add_to_river('river/object/plugin_name_subtype/' . $river, $river, get_loggedin_userid(), $entity->guid);
	// Remove the entity cache
		remove_metadata($_SESSION['user']->guid,'plugin_name_title');
		remove_metadata($_SESSION['user']->guid,'plugin_name_description');
		remove_metadata($_SESSION['user']->guid,'plugin_name_tags');
		
		forward($CONFIG->wwwroot . "pg/plugin_name");
		
?>