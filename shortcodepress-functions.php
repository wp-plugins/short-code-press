<?php

function scodemanage_main() {

	// Check that our statistics is set up
	//$stats = get_option(get_option('scodemanage_post_id'), 'scodemanage_stats', true);
	//$content = get_post_meta(get_option('scodemanage_post_id'), 'scodemanage_content', true);
	//$positions = get_post_meta(get_option('scodemanage_post_id'), 'scodemanage_positions', true);

	$plugindir = ABSPATH . PLUGINDIR .'/ ' . dirname(plugin_basename (__FILE__)) . '/';


	// $_GET['tab'] should be set in mf_queue_scripts, but still...
    $tab =  ($_GET['tab']) ? $_GET['tab'] : 'content'; 

	?>	

 	<div class="wrap">
		<h2>Short Codes Settings</h2>

	<ul class="tabs">
		<?php $url = 'tools.php?page=shortcodepress';  ?>
		<li><a <?php if ($tab == 'content') echo 'class="tabs-current"'; ?> href="<?php echo $url; ?>&amp;tab=content"><?php _e('Codes'); ?></a></li>
		
		
		<li><a <?php if ($tab == 'help') echo 'class="tabs-current"'; ?> href="<?php echo $url; ?>&amp;tab=help"><?php _e('Help'); ?>!</a></li>
	</ul>
	<div style="padding: 10px;">

	<?php
	
	// Load the relevant tab
	if ($tab == 'help') include('shortcodepress-help.php');
	else include('shortcodepress-content.php');
	echo '</div></div>';
}

function scode_plugin_options() {
  echo '<div class="wrap">';
  echo '<p>Here is where the form would go if I actually had options.</p>';
  echo '</div>';
}


function scodemanage_ok_to_go() {
	$the_page = get_page(get_option('scodemanager_post_id'));
	$ok_to_go = ($the_page->post_title) ? true : false;
	return $ok_to_go;
}

//////////////
//function jal_install () {
   

   //}
//}

