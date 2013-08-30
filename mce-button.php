<?php

$templates = get_option('_wpbtn_templates');
 
add_filter('mce_external_plugins', "wpsb_tinyplugin_register");
add_filter('mce_buttons', 'wpsb_tinyplugin_add_button', 0);
 
function wpsb_tinyplugin_add_button($buttons)
{
    array_push($buttons, "separator", "wpsb_tinyplugin");
    return $buttons;
}

function wpsb_tinyplugin_register($plugin_array)
{
    $url = plugins_url("/short-code-press/js/ext/editor_plugin.js");

    $plugin_array['wpsb_tinyplugin'] = $url;
    return $plugin_array;
}


function wpsb_free_tinymce(){
    $templates = get_option('_wpbtn_templates');
    global $wpdb;
    if($_GET['wpsb_action']!='wpsb_tinymce_button') return false;
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title>Short Code Press</title>
<style type="text/css">
*{font-family: Tahoma !important; font-size: 9pt; letter-spacing: 1px;}
select,input{padding:5px;font-size: 9pt !important;font-family: Tahoma !important; letter-spacing: 1px;margin:5px;}
.button{
    background: #7abcff; /* old browsers */

background: -moz-linear-gradient(top, #7abcff 0%, #60abf8 44%, #4096ee 100%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7abcff), color-stop(44%,#60abf8), color-stop(100%,#4096ee)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 ); /* ie */
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
border:1px solid #FFF;
color: #FFF;
}
 
.input{
 width: 340px;   
 background: #EDEDED; /* old browsers */

background: -moz-linear-gradient(top, #EDEDED 24%, #fefefe 81%); /* firefox */

background: -webkit-gradient(linear, left top, left bottom, color-stop(24%,#EDEDED), color-stop(81%,#fefefe)); /* webkit */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#EDEDED', endColorstr='#fefefe',GradientType=0 ); /* ie */
border:1px solid #aaa; 
color: #000;
}
.button-primary{cursor: pointer;}
fieldset{padding: 10px;}
</style> 
<link rel='stylesheet' href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/shortcodepress.css" type='text/css' />

<?php 

//add_filter( 'show_admin_bar', '__return_false' );
wp_enqueue_script('jquery');
//wp_enqueue_script('thickbox');
//wp_enqueue_style('thickbox');


wp_head();
add_filter( 'show_admin_bar', '__return_false' ); 

     
if(!$templates) $templates = array();
 foreach($templates as $id=>$tpl){ $font = str_replace(" ","+",$tpl[font]); ?>   
<link href='http://fonts.googleapis.com/css?family=<?php echo $font; ?>' rel='stylesheet' type='text/css'>
 <?php } ?> 
<?php  


?>   
    
<style type="text/css">
   html {
    margin-top: 0px !important;
} 
   .inm{
       padding-left: 10px;
       color: #008000;
       font-weight: bold;
   }
   #templates li{
       min-height: 30px;
       margin-bottom: 10px;
   }
   .link:hover{
      cursor:pointer; 
   }
   .container{display:none;}
   .awesome{
    background: #222 url( <?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)).'/css/images/alert-overlay.png';?>) repeat-x;
    display: inline-block;
    padding: 5px 10px 6px;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    line-height: 1;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-box-shadow: 0 1px 3px #999;
    -webkit-box-shadow: 0 1px 3px #999;
    text-shadow: 0 -1px 1px #222;
    border-bottom: 1px solid #222;
    position: relative;
    cursor: pointer;
    }
        /* Sizes ---------- */
    .small.awesome {
    font-size: 11px;
    }
    .medium.awesome {
    font-size: 13px;
    }
    .large.awesome {
    font-size: 14px;
    padding: 8px 14px 9px;
    }
     
    /* Colors ---------- */
    .blue.awesome {
    background-color: #2daebf;
    }
    .red.awesome {
    background-color: #e33100;
    }
    .magenta.awesome {
    background-color: #a9014b;
    }
    .orange.awesome {
    background-color: #ff5c00;
    }
    .yellow.awesome {
    background-color: #ffb515;
    }


   <?php foreach($templates as $id=>$tpl){ 
       $tpl[bg_css] = stripcslashes($tpl[bg_css]);
       $tpl[font] = str_replace("+"," ",$tpl[font]);
       $css=<<<TID
       
        
       .{$id}{
           $tpl[bg_css]
           color: #{$tpl[text_color]} !important;
           font-family: '$tpl[font]' !important;
           font-size: 9pt !important;
           font-weight: $tpl[font_weight] !important;
           border-color: #{$tpl[border_color]} !important;
           border-width: {$tpl[width]}px !important;
           border-style: solid;                      
           line-height:30px;
           text-align:center;
            -moz-box-shadow: 0 0 5px #888;
            -webkit-box-shadow: 0 0 5px #888;
            box-shadow: 0 0 5px #888;
            z-index:999999;
            -webkit-border-radius: {$tpl[radius]}px;
            -moz-border-radius: {$tpl[radius]}px;
            border-radius: {$tpl[radius]}px;
            display:block;
            width:300px;
       }
TID;
    echo $css;
   } ?>
   .block {width:95px; padding-bottom:30px;height:42px;}
    .block h2 {margin:0; padding:0px 0 0 0px;font-size:13px;text-align:center;}
    p {width:95px; margin:0 auto;}
    .effect {border:1px solid #666; -moz-box-shadow: 0px 0px 3px #333; -webkit-box-shadow: 0px 1px 2px #333; -moz-border-radius: 15px; -webkit-border-radius: 15px; background: -moz-linear-gradient(center bottom , #CACACA 9%, #ECECEC 92%) repeat scroll 0 0 transparent; background: -webkit-gradient(linear, left bottom, left top, color-stop(0.09, rgb(202,202,202)), color-stop(0.92, rgb(236,236,236)))}
   </style>
   
</head>
<body>    <br>

<fieldset><legend>Insert Short Codes</legend>
    <ul id="scp_container" style="height: 300px;overflow: auto;"> 
        <li class="scp-item"><a href="admin.php?task=shortcodeoptions&shortcode=box" class="scoption block_box tooltip" title="Insert Box">Box</a></li>
        <li class="scp-item"><a href="admin.php?task=shortcodeoptions&shortcode=button" class="scoption block_button tooltip" title="Insert button">Button</a></li>
        
        <li class="scp-item"><a href="admin.php?task=shortcodeoptions&shortcode=video" class="scoption block_video tooltip" title="Insert youtube, vimeo, dailymotion video">Embed Video</a></li>
        <li class="scp-item"><a href="admin.php?task=shortcodeoptions&shortcode=highlight" class="scoption block_highlight tooltip" title="Insert colorful highlighted text">Highlight Text</a></li>
        
        <li class="scp-item"><a href="admin.php?task=shortcodeoptions&shortcode=dropcap" class="scoption block_dropcap tooltip" title="DropCaps">DropCap</a></li> 
       
   </ul>
   
</fieldset>   <br>
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<script src="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/js/ext/tooltip.js"></script>
<script type="text/javascript" src="<?php echo home_url('/wp-includes/js/tinymce/tiny_mce_popup.js'); ?>"></script>
                <script type="text/javascript">
                    /* <![CDATA[ */                    
                    jQuery('#addtopost').click(function(){
                    var win = window.dialogArguments || opener || parent || top;     
                    
                    if(jQuery('#scodes').val()=='button')           
                    win.send_to_editor('[button type="button" label="Enter your label here" template="'+jQuery('#template').val()+'" color="'+jQuery('#btncolor').val()+'" size="'+jQuery('#bsize').val()+'"][/button]');
                    if(jQuery('#scodes').val()=='box')           
                    win.send_to_editor('[box type="box" width="'+jQuery('#boxwidth').val()+'" template="" align="'+jQuery('#balign').val()+'" color="'+jQuery('#boxcolor').val()+'"][/box]');
                    tinyMCEPopup.close();
                    return false;                   
                    });
                    
                    /*
                    jQuery('#addtopostc').click(function(){
                    var win = window.dialogArguments || opener || parent || top;                
                    win.send_to_editor('{wpsb_category='+jQuery('#flc').val()+'}');                   
                    tinyMCEPopup.close();
                    return false;                   
                    });  
                    */    
                    
                    $(document).ready( function() { 
    $("#scodes").change(function(){
        var divId = $(this).val();
        $(".container").hide();
        $("#" + divId).show();
    });
});
      /* Tooltip */

    $(function() {
        $('.tooltip').tooltip({
            track: true,
            delay: 0,
            showURL: false,
            showBody: " - ",
            fade: 250
            });
        });
                  
                </script>

</body>    
</html>
    
    <?php
    
    die();
}
 



add_action('init', 'wpsb_free_tinymce');

