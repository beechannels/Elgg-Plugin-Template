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
	 	
		function plugin_name_init() {
    		
    		global $CONFIG;
    		
			// add css
				elgg_extend_view('css', 'plugin_name/css');
				
			// add js
				elgg_extend_view('js/initialise_elgg', 'plugin_name/js');
				
			// Set up menu
				add_menu(elgg_echo('plugin_name'), $CONFIG->wwwroot . "pg/plugin_name/");	
				
			 // Register a page handler, so we can have nice URLs
                register_page_handler('plugin_name','plugin_name_page_handler');
                
             // Register a URL handler for entity
                register_entity_url_handler('plugin_name_url','object','plugin_name_subtype');
                
             // Register entity type
                register_entity_type('object','plugin_name_subtype');		
			
    		//add a widget
			    add_widget_type('plugin_name',elgg_echo("plugin_name:widget:title"),elgg_echo("plugin_name:widget:description"));
			    
			// Add group menu option
				add_group_tool_option('plugin_name',elgg_echo('groups:enable:plugin_name'),true);
				elgg_extend_view('groups/left_column', 'plugin_name/groupprofile_plugin_name');    
			
		}
		
		 /**
		 * Setup menu
		 *
		 */
		function plugin_name_pagesetup()
		{
			global $CONFIG;

			if (get_context() == 'plugin_name') {
				add_submenu_item(elgg_echo('plugin_name'),$CONFIG->wwwroot."pg/plugin_name/");
				add_submenu_item(elgg_echo('plugin_name:add'),$CONFIG->wwwroot."pg/plugin_name/edit/");
			}
			
			if (get_context() == 'admin') {
				add_submenu_item(elgg_echo('plugin_name:admin'),$CONFIG->wwwroot."pg/plugin_name/admin");
			}
		}
		
		function plugin_name_page_handler($page)
		{
		    global $CONFIG;
		    
		    if (isset($page[0]))
		    {
		        switch($page[0])
		        {
		            case 'admin':
		                    include($CONFIG->pluginspath . "plugin_name/admin.php");
		                    break;
		    		case 'edit':
		            		set_input('guid', $page[1]);
		                    include($CONFIG->pluginspath . "plugin_name/edit.php");
		    				break;
		    		case 'view':
		            		set_input('guid', $page[1]);
		                    include($CONFIG->pluginspath . "plugin_name/view.php");
		    				break;				        
		            default:
		                    include($CONFIG->pluginspath . "plugin_name/index.php");
		    				break;  
		        }
			}
		    else
		        include($CONFIG->pluginspath . "plugin_name/index.php");
		}
		
		/**
         * Populates the ->getUrl() method for entities
         *
         * @param ElggEntity $entity entity
         * @return string $entity URL
         */
        function plugin_name_url($entity)
        {
            global $CONFIG;

            $title = $entity->title;
            $title = friendly_title($title);
            return $CONFIG->url . "pg/plugin_name/view/" . $entity->getGUID() . "/" . $title;
        }
        
        global $CONFIG;
		register_action("plugin_name/edit", false, $CONFIG->pluginspath . "plugin_name/actions/edit.php");
        register_action("plugin_name/delete", false, $CONFIG->pluginspath . "plugin_name/actions/delete.php");
		
		register_elgg_event_handler('pagesetup','system','plugin_name_pagesetup');
		register_elgg_event_handler('init','system','plugin_name_init');

?>