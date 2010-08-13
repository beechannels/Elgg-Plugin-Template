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
	 
	 if ($vars['entity'])
	 {
	 	$title = $vars['entity']->title;
	 	$description = $vars['entity']->description;
	 	$tags = $vars['entity']->tags;
	 	$guid = $vars['entity']->guid;
	 	$submit_text = elgg_echo('plugin_name:entity:update');
	 }
	 else
	 {
	 	$guid = 0;
	 	$submit_text = elgg_echo('plugin_name:entity:add');
	 }
?>
<dl>
	<dt><?php echo elgg_echo('plugin_name:entity:title') ?></dt>
	<dd><?php echo elgg_view('input/text', array('internalname' => 'title', 'value' => $title)); ?></dd>
	<dt><?php echo elgg_echo('plugin_name:entity:description') ?></dt>
	<dd><?php echo elgg_view('input/longtext', array('internalname' => 'description', 'value' => $description)); ?></dd>
	<dt><?php echo elgg_echo('plugin_name:entity:tags') ?></dt>
	<dd><?php echo elgg_view('input/tags', array('internalname' => 'tags', 'value' => $tags)); ?></dd>
</dl> 
<?php echo elgg_view('input/hidden', array('internalname' => 'guid', 'value' => $guid)); ?>
<?php echo elgg_view('input/submit', array('value' => $submit_text)); ?>