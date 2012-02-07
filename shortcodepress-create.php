<?php
global $wpdb;
wp_enqueue_script('page');
		//wp_enqueue_script('editor');
        add_thickbox();
		//wp_enqueue_script('media-upload');
		wp_enqueue_script('controls');

if(@$_REQUEST[id]=='')$type='add';else $type='edit';
		//print_r($rs);
	// Check to see that we have everything we need
	
	if ($_REQUEST['action'] == 'add' && $type=='add') {
		if (!($title = $_POST['title'])) $all_ok = false;
		if (!($code = $_POST['code'])) $all_ok = false;
		if (!($description = $_POST['description'])) $all_ok = false;
		else if (!($title = $_POST['title'])) $all_ok = false;
		else $all_ok = true;
	    $date=date('Y-m-d');
		if ($all_ok) {
			$rs=$wpdb->get_results("SELECT * FROM wp_scodes WHERE scode_code =' ".$code."'");
			
			if(count($rs)>0){
			echo '<div id="message" class="updated fade"><p><strong>' . __('Already Exist!', 'shortcodepress') . '</strong></p></div>';
			}
			else{
			mysql_query("insert into wp_scodes set scode_title='".$title."', scode_code='".$code."',scode_date='".$date."',scode_description='".$description."'");
			$get_id=mysql_insert_id();
			$rs=$wpdb->get_results("SELECT * FROM wp_scodes WHERE scode_id = ".$get_id);
			echo '<div id="message" class="updated fade"><p><strong>' . __('Saved!', 'shortcodepress') . '</strong></p></div>';
			}
			}
			else{
			echo '<div id="message" class="updated fade"><p><strong>' . __('Please Fill up all fields!', 'shortcodepress') . '</strong></p></div>';
			}
		}	
			
	if ($_REQUEST['action'] == 'edit' || $type=='edit') {
	
		$rs=$wpdb->get_results("SELECT * FROM wp_scodes WHERE scode_id = '".$_REQUEST[id]."'");
		//echo $rs[0]->option_name;
		if (!($code = $_POST['url'])) $all_ok = false;
		if (!($date = $_POST['date'])) $all_ok = false;
		if (!($postid = $_POST['postid'])) $all_ok = false;
		else if (!($title = $_POST['title'])) $all_ok = false;
		else $all_ok = true;
	
		if ($all_ok) {
		
			$rs=$wpdb->get_results("SELECT * FROM wp_scodes WHERE scode_date =' ".$date."' and scode_id != '".$_REQUEST[id]."' ");
			
			if(count($rs)>0){
			echo '<div id="message" class="updated fade"><p><strong>' . __('Already Exist! for ' .$date.'', 'shortcodepress') . '</strong></p>		</div>';
			}
			else{
			mysql_query("update wp_scodes set scode_title='".$title."', scode_url='".$code."',scode_date='".$date."',scode_post_ID='".$postid."' where scode_id = '".$_REQUEST[id]."'");
			
			$rs=$wpdb->get_results("SELECT * FROM wp_scodes WHERE scode_id = ".$_REQUEST[id]);
			echo '<div id="message" class="updated fade"><p><strong>' . __('Updated!', 'shortcodepress') . '</strong></p></div>';
			
			}

		}
	} else if ($_REQUEST['action'] == 'delete') {
		$id = $_REQUEST['id'];
		$content = get_post_meta(get_option('scodemanage_post_id'), 'scodemanage_content', true);
		$stats = get_post_meta(get_option('scodemanage_post_id'), 'scodemanage_stats', true);
		if (is_array($stats)) {
			unset($stats[$id]); 
			update_post_meta(get_option('scodemanage_post_id'), 'scodemanage_stats', $stats);
		}
		// Remove the evidence
		unset($content[$id]);
			
		// Save back down
		update_post_meta(get_option('scodemanage_post_id'), 'scodemanage_content', $content);

		// Notify 
		echo '<div id="message" class="updated fade"><p><strong>' . __('Deleted!', 'shortcodepress') . '</strong></p></div>';		
	}

	

	// Are we editing?
	if ($_GET['id'] != '') {
		$rs=$wpdb->get_results("SELECT * FROM wp_scodes WHERE scode_id = '".$_GET['id']."'");
		//echo $rs[0]->option_name;
}
		/*if (!$value) $value = $content[$_GET['id']];		
	}
	else $value = array();
	$checked_visible = ($value['visible'] == 'true' || !$value['visible']) ? 'checked="checked"' : ''; 
	$checked_wrap = ($value['wrap'] == 'true' || !$value['wrap']) ? 'checked="checked"' : ''; 
*/

?>

<form name="post" method="POST" action="tools.php?page=shortcodepress&tab=upload&action=<?php echo $type;?>&id=<?php echo $rs[0]->scode_id; ?>" id="post">
<div class="wrap">

	<h3>Create content</h3>

	<p><?php _e('To create static content, fill in the Title, Position and the html code that constitues the content. You can set the visibility of the ad and the weight. Use the file browser below to upload and add an image/file.', 'shortcodepress'); ?></p>

<?php //} ?>

	<table  class="widefat">
		<tr class="title">
			<td>
				<label class="create" for="ad_position_edit_"><?php _e('Shortcode', 'shortcodepress'); ?></label>
			</td>
			<td>
				<input class="create" name="code" id='date' type="text" value="<?php  echo $rs[0]->scode_code; ?>">
			</td>
		</tr>
		
		<tr class="alternate">
			<td>
				<label class="create" for="content"><?php _e('Title', 'shortcodepress'); ?>:</label>
			</td>
			<td>
			
				<input class="create" name="title" id='title' type="text" value="<?php echo $rs[0]->scode_title; ?>" />
			
			</td>
		</tr>

		<tr class="title">
			<td>
				<label class="create" for="content"><?php _e('Description', 'shortcodepress'); ?>:</label>
			</td>
			<td>
			
				<textarea class="create" name="description" id='description' rows="10" cols="130" class="create" ><?php echo $rs[0]->scode_description; ?></textarea>
			
			</td>
		</tr>
		
		

		
		<input type="hidden" id="user-id" value="">
		
	</table>
	<div style="padding: 10px; margin-left: 170px;">
					<input type="hidden" name="page" value="shortcodepress/shortcodepress.php">
				<input type="hidden" name="id" value="<?php echo $rs[0]->scode_id; ?>">
				<input type="hidden" name="action" value="<?php echo $type;?>">
				<!-- input class="button" type="button" value="<?php _e('Save & preview', 'shortcodepress'); ?>" onclick="" -->
				<input class="button-primary" type="submit" value="<?php _e('Save', 'shortcodepress'); ?>">
				</form>
				<?php if ($_GET['action']) : ?>
				<p>
					<form method="POST" action="tools.php?page=shortcodepress&tab=upload" onsubmit="return confirm('<?php _e('Are you sure you want to delete this content?', 'shortcodepress'); ?>');">
					<input type="hidden" name="page" value="shortcodepress/shortcodepress.php">
					<input type="hidden" name="action" value="delete">
					<input type="hidden" name="id" value="<?php echo $rs[0]->scode_id; ?>">
					<input class="button" type="submit" value="<?php _e('Delete this', 'shortcodepress'); ?>">
					</form>
				</p>
				<?php endif; ?>
	</div>

<?php
/*
	<h3><?php _e('Preview', 'shortcodepress'); ?>:</h3>
	<div id="preview" ></div>
	

	<iframe id="uploading" name="uploading" frameborder="0" src="media-upload.php?post_id=-1206559419&amp;type=image&amp;TB_iframe=true&amp;height=500&amp;width=640" style="height: 500px">This feature requires iframe support.</iframe>
*/
?>