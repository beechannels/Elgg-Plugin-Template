<?php

	/**
	 * Elgg plugin_name Plugin
	 * 
	 * @package plugin_name
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dirk Pelzer aka HiTo81
	 * copyright Dirk Pelzer 2009 and (mods) developer_name dev_yr
	 * @link http://elgg.org/
	 * 
	 */

?>
<?php 

$user = $vars['entity']->getOwnerEntity();

$kmpid = $user->kmpid;

$url = $vars['url'];

?>

[ <a href="http://www.kewlmates.com/partners/index.php?adult=0&id=<?php echo $kmpid; ?>" target=_blank>partners</a> ]

<p><b>Code:</b> 

<textarea rows="8" cols="35" name="params[plugin_name]">
<iframe name='allsolnetframe' src='<?php echo $url; ?>mod/plugin_name/plugin_view.php?id=<?php echo $kmpid; ?>' height=145 width=285 scrolling='no' frameborder='0'></iframe>
</textarea>

	