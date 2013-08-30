<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title>Short Code Press - <?php echo $_GET[shortcode];?></title>
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
<SCRIPT language="javascript">
function add(type,name,c) {
 
    //Create an input type dynamically.
    var element = document.createElement("input");
 
    //Assign different attributes to the element.
    element.setAttribute("type", type);
    //element.setAttribute("value", type);
    element.setAttribute("name", name+c);
    element.setAttribute("id", name+c);
 
    var foo = document.getElementById("images");
 
    //Append the element in page (in span).
    foo.appendChild(element);
 
}
</SCRIPT>
<link rel='stylesheet' href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/shortcodepress.css" type='text/css' />
</head>
<body>    
<fieldset><legend><?php echo $_GET[shortcode];?> Options</legend>
<?php
if($_GET[shortcode]=='box'){
            ?><div id="box" class="scp_container">
            
   <ul >
    <li  class="templates"><label>* Templates:</label><select id="template">
    <option value="">Select Tempaltes</option>
        <?php echo $sc_tpls;?>
    </select>
    </li>
    
   </ul>        
   <ul >
    <li  class="width"><label>Width:</label><input id="boxwidth" type="text" name="boxwidth" value=""> px
    <br /><label></label>width is numerical digits. ex 200, 250, 300, 400</li></li>
    
   </ul>
   <ul >
    <li  class="align"><label>Align:</label><select id="balign">
    <?php echo $sc_align;?>
    </select>
    
    
   </ul>
   
   <ul>
    <li  class="align"><label>Color:</label><select id="boxcolor">
        <?php 
            echo $sc_color;
        ?>
        </select><input type="hidden" id="bcolor" /></li>
    
   </ul>
   
   <ul>
    <li  class="align"><label>Text:</label><textarea name="text" id="text" rows="4" cols="50"></textarea></li>
   </ul>
   </div>
          <?php  
        }
        
       
        else if($_GET[shortcode]=='button'){ ?>
        <div id="button" class="scp_container">
        <ul >*
    <li  class="templates"><label>Type:</label> 
    <select id="type">
        <?php echo $scp_button_tpl;?>
    </select>
    </li>
    
   <!--</ul>        
    <ul id="btnsize"><li id="large" class="large">Size:<select id="bsize"><?php echo $scp_size;//size="'+jQuery('#bsize').val()+'"?></select></li>
   </ul>-->
   
    <ul>
    <li  class="align"><label>Color:</label><select id="btncolor">
        <?php 
            echo $sc_color;
        ?></select></li>
   </ul>
   <ul >
    <li  class="align"><label>Align :</label><select id="balign">
    <?php echo $sc_align;?>
    </select></li>
    
   </ul>
   <ul>
    <li  class="align"><label>Text :</label><input type="text" name="text" id="text" value=""></li>
   </ul>   
   <ul>
    <li  class="align"><label>Link Url : </label><input type="text" name="url" id="url" value=""></li>
   </ul>
   </div>
        <?php }
       
        else if($_GET[shortcode]=='video'){ ?>
        <div id="video" class="scp_container">
    
    <ul>
    <li  class="align"><label>Video Url : </label><input type="text" name="url" id="url" value="">
    <br /><label></label>Youtube, vimeo, dailymotion video supported.</li>
   </ul>
   <ul>
    <li  class="align"><label>Player Width : </label><input type="text" name="width" id="width" value=""> px</li>
   </ul> 
   <ul>
    <li  class="align"><label>Player Height :</label><input type="text" name="height" id="height" value=""> px</li>
   </ul>     
   <ul >
    <li  class="align"><label>Align : </label><select id="balign">
    <?php echo $sc_align;?>
    </select></li>
    
   </ul>
   </div>
        <?php }
        else if($_GET[shortcode]=='highlight'){ ?>
        <div id="highlight" class="scp_container">
        <ul>
    <li  class="align"><label>Text : </label><input type="text" name="text" id="text" value=""></li>
   </ul>
    <ul>
    <li  class="align"><label>Color : </label><select id="txtcolor">
        <?php 
            echo $sc_color;
        ?></select></li>
   </ul>
   
   </div>
        <?php }
        
        
        else if($_GET[shortcode]=='dropcap'){ ?>
        <div id="dropcap" class="scp_container">
        <ul>
    <li  class="align"><label>Text :</label> <input type="text" name="text" id="text" value=""></li>
   </ul>
    <ul>
    <li  class="align"><label>Text Color :</label> <select id="txtcolor">
        <?php 
            echo $sc_color;
        ?></select></li>
   </ul>
   
   </div>
        <?php }?>
        
</fieldset>
<input type="submit" id="addtopost" class="button button-primary" name="addtopost" value="Insert into post" />
<br />
* defines css3 supported
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_option('siteurl');?>/wp-includes/js/thickbox/thickbox.js?ver=20111117"></script>
<script type="text/javascript" src="<?php echo home_url('/wp-includes/js/tinymce/tiny_mce_popup.js'); ?>"></script>
                <script type="text/javascript">
                    /* <![CDATA[ */  
                                      
                    jQuery('#addtopost').click(function(){
                    var win = window.dialogArguments || opener || parent || top;     
                    
                    <?php
if($_GET[shortcode]=='button'){   ?>                   
                    win.send_to_editor('[button type="'+jQuery('#type').val()+'" url="'+jQuery('#url').val()+'" color="'+jQuery('#btncolor').val()+'" align="'+jQuery('#balign').val()+'"]'+jQuery('#text').val()+'[/button]');
                    <?php } ?>
                    <?php
if($_GET[shortcode]=='box'){   ?>        
                    win.send_to_editor('[box type="box" width="'+jQuery('#boxwidth').val()+'" template="'+jQuery('#template').val()+'" align="'+jQuery('#balign').val()+'" color="'+jQuery('#boxcolor').val()+'"]'+jQuery('#text').val()+'[/box]');<?php } ?>
                    
                    <?php
if($_GET[shortcode]=='video'){   ?>                   
                    win.send_to_editor('[video url="'+jQuery('#url').val()+'" width="'+jQuery('#width').val()+'" height="'+jQuery('#height').val()+'" align="'+jQuery('#balign').val()+'"][/video]');
                    <?php } ?>
                    <?php
if($_GET[shortcode]=='highlight'){   ?>                   
                    win.send_to_editor('[highlight  color="'+jQuery('#txtcolor').val()+'" align=""]'+jQuery('#text').val()+'[/highlight]');
                    <?php } ?>
                    
                    <?php
if($_GET[shortcode]=='dropcap'){   ?>                   
                    win.send_to_editor('[dropcap  color="'+jQuery('#txtcolor').val()+'"]'+jQuery('#text').val()+'[/dropcap]');
                    <?php } ?>
                    
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
      
                  
                </script>
</body>    
</html>                