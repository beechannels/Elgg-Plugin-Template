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
	 
	 $canedit = $vars['entity']->canEdit();
?>
<div class="mod">
	<div class="hd">
		<h3><?php echo $vars['entity']->title ?></h3>
	</div>
	<div class="bd">
		<?php echo $vars['entity']->description ?>
	</div>
	<div class="ft">
		<?php echo elgg_view('output/tags', array('tags' => $vars['entity']->tags)) ?>
		<?php if ($canedit): ?>
		<div class="actions">
			<a href="<?php echo $vars['url'] ?>pg/plugin_name/edit/<?php echo $vars['entity']->guid ?>"><?php echo elgg_echo('edit') ?></a>
			<?php echo elgg_view('output/confirmlink', array('href' => $vars['url'] . 'action/plugin_name/delete?guid=' . $vars['entity']->guid, 'text' => elgg_echo('delete'))); ?>
		</div>
		<?php endif; ?>
	</div>
</div>