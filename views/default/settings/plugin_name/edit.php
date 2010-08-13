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
	 
	 $settings1 = get_plugin_setting("settings1", "plugin_name");
?>	 
<p>
	<?php echo elgg_echo('plugin_name:settings:settings1'); ?>
	<?php echo elgg_view('input/text', array('internalname' => 'params[settings1]', 'value' => $settings1)); ?>
</p>