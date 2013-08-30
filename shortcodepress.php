<?php
/*
Plugin Name: ShortCode Press
Version: 1.0.3
Plugin URI: http://wordpress.org/extend/plugins/short-code-press/
Author URI: http://www.shortcodepress.com
Description:  insert custom shortcodes to your post or pages fast and easy way.
Author: shaid

    USAGE:

    See the Help tab in Manage -> shortcodepress.

    LICENCE:

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
       
*/


require_once ( 'shortcodepress-functions.php' );

require_once ( 'mce-button.php' ); 

add_action('admin_menu', 'scode_plugin_menu');

function scode_plugin_menu() {

$scode_db_version = "1.0.1";
$installed_ver = get_option( "scode_db_version" );
if( $installed_ver != '' ) {
//register_activation_hook(__FILE__,'jal_install');
global $wpdb;
//   global $jal_db_version;
   $table_name = $wpdb->prefix . "scodes";
   //if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
     require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); 
      $scode_table_sql = "CREATE TABLE " . $table_name . " (".
                "scode_id INT(20)  NOT NULL AUTO_INCREMENT, ".
                "scode_title varchar(255), ".
                "scode_code  varchar(255), ".
                "scode_description text, ".
                "scode_date  datetime, ".
                "PRIMARY KEY (scode_id))";
                //echo $scode_table_sql;
        maybe_create_table($table_name, $scode_table_sql);
      
     //$sql = "alter TABLE " . $table_name . "       add advert INT(1) NOT NULL    ";
      //require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      //@mysql_query($sql);


      update_option("scode_db_version", $scode_db_version);
}

  add_management_page('Short Codes Options', 'Short codes press', 9, 'shortcodepress', 'scodemanage_main');
}

$scp_color = array("blue","red","magenta","orange","yellow","black");
$scp_templates = array("Normal"=>"Normal","drop-shadow lifted"=>"Drop shadow lifted","drop-shadow perspective"=>"Drop shadow perspective","drop-shadow raised"=>"Drop shadow raised","drop-shadow curved curved-hz-1"=>"Drop shadow curved  horizontal 1","drop-shadow curved curved-hz-2"=>"Drop shadow curved horizontal 2");

$scp_aligns = array("left"=>"Left","right"=>"Right","after"=>"After");
$scp_bbl_tpls = array("triangle-isosceles"=>"Triangle Isosceles","triangle-isosceles top"=>"Triangle isosceles top","triangle-border"=>"Triangle border","triangle-border top"=>"Triangle border top","pinched"=>"Pinched","oval-speech"=>"Oval speech","oval-thought"=>"Oval thought");
$scp_gtpls = array("simple"=>"Simple Gallery","easy"=>"Easy Slider","nivo"=>"Nivo Slider");
$scp_sizes = array("small"=>"Small","medium"=>"Medium","large"=>"Large");
$scp_button_tpls = array("accept"=>"Accept","add"=>"Add","anchor"=>"Anchor","cancel"=>"Cancel","clock"=>"Clock","coins"=>"Coins","delete"=>"Delete","download"=>"Download","heart"=>"Heart","hourglass"=>"Hourglass","house"=>"House","info"=>"Info","lightbulb"=>"Lightbulb","lightning"=>"Lightning","lock"=>"Lock","palette"=>"Palette","refresh"=>"Refresh","shuffle"=>"Shuffle","asterisk"=>"Asterisk","bell"=>"Bell","bomb"=>"Bomb","bricks"=>"Bricks","briefcase"=>"Briefcase","cake"=>"Cake","color"=>"Color","disconnect"=>"Disconnect","door"=>"Door","emoticon"=>"Emoticon","rss"=>"RSS","cart"=>"Cart");

//add_option("scp_color",array("blue"=>"blue","red"=>"red","magenta"=>"magenta","orange"=>"orange","yellow"=>"yellow","black"=>"black"));

/*
    // Default tab is 'content'
    $tab =  ($_GET['tab']) ? $_GET['tab'] : 'content'; 

    $content = get_post_meta(get_option('scodemanage_post_id'), 'scodemanage_content', true);
    $positions = get_post_meta(get_option('scodemanage_post_id'), 'scodemanage_positions', true);

    // Cannot show 'Content' if there ain't any
    //if ($tab == 'content' && (!is_array($content) || empty($content))) $tab = 'upload';

    // Cannot show 'Create' if there are no position
    //if ($tab == 'upload' && (!is_array($positions) || empty($positions) ) ) $tab = 'positions';

    // If we're not installed, go to the settings for the setup.
    //if (!scodemanage_ok_to_go() && $tab != 'help') $tab = 'settings';

    $_GET['tab'] = $tab;

    if ($_GET['tab'] == 'upload') {
        wp_enqueue_script('page');
        wp_enqueue_script('editor');
        add_thickbox();
        wp_enqueue_script('media-upload');
        wp_enqueue_script('controls');
    }
    
    */

function scp_colors($colors){
        $sc_color='';
        foreach ($colors as $color) {
        $sc_color.="<option value=\"$color\">$color</option>";
        }
        return $sc_color;
    }
    
function scp_tpl($tpls){
        $sc_tpls='';
        foreach ($tpls as $tpl) {
        $sc_tpls.="<option value=\"$tpl\">$tpl</option>";
        }
        return $sc_tpls;
    }
    
function scp_options($ops){
    
        $sc_opt='';
        foreach ($ops as $k => $v) {
        $sc_opt.="<option value=\"$k\">$v</option>";
        }
        return $sc_opt;
    }
    
function shortcodeoptions(){
    global $scp_color, $scp_templates,$scp_aligns,$scp_bbl_tpls,$scp_gtpls,$scp_sizes,$scp_button_tpls;
    $sc_color=scp_colors($scp_color);
    $sc_tpls=scp_options($scp_templates);
    
    $sc_align=scp_options($scp_aligns);
    $scp_bbl_tpl=scp_options($scp_bbl_tpls);
    $sc_align=scp_options($scp_aligns);
    $sc_align=scp_options($scp_aligns);
    $sc_gtpl=scp_options($scp_gtpls);
    $scp_size=scp_options($scp_sizes);
    $scp_button_tpl=scp_options($scp_button_tpls);
    
    if($_GET['task']=='shortcodeoptions'){
       include "scp_options.php"; 
        
        die();
    }
    
}
    
function scode_load_scripts () {
    if (ereg('page\=shortcodepress', $_SERVER['REQUEST_URI'])) {
    
        ?>
         <link rel='stylesheet' href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/shortcodepress.css" type='text/css' />
        
        <?php
        
    }
    else{
        wp_enqueue_script('jquery');
        wp_head();
        ?>
         <link rel='stylesheet' href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/css/style.css" type='text/css' />
         <link rel="stylesheet" type="text/css" href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/css/html5reset.css" />
         <script src="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/js/ext/custom.js"></script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>

  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>

<![endif]-->
    <?php }
}    
function scode_pre_queue_scripts () {
    add_action('admin_head-' . sanitize_title(__('Tools')) . '_page_shortcodepress', 'scode_load_scripts');
}
add_action('admin_init' , 'scode_pre_queue_scripts');

// front end
if (!is_admin())
    { 
  

$scp_files = scandir(ABSPATH . PLUGINDIR .'/' . dirname(plugin_basename (__FILE__)) . '/shortcodes/');

foreach($scp_files as $scp_file) {
    // Ignore non php files and thus ".." & "."
    if (!preg_match('/\.php$/', $scp_file)) {
      continue;
    }
    
    require_once('shortcodes/'.$scp_file);
}
wp_enqueue_script('jquery');
        ///wp_head();      
        wp_enqueue_style('scp_css', get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)).'/css/style.css', false, '1.0', 'all');
        wp_enqueue_style('scp_css', get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)).'/css/html5reset.css', false, '1.0', 'all');
        wp_enqueue_script('scp_js', get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)).'/js/ext/custom.js', false, '1.0', 'all');
    }//not admin
add_filter('the_content', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
add_action("init","shortcodeoptions");
?>