<?php 
/*...*/

function scp_button_shortcode( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'type' => '',
      'color' => '',
      'size' => '',
      'align' => '',
      'url' => '',
      ), $atts ) );
//scp_button_' . $size . ' 
      if($align=='after')return '<div class=" scp_btn_' . $align . '"><a href="'.$url.'" class="scp scp_button scp_button_' . $type . ' scp_button_' . $color . '"><span></span>' . $content . '</a></div>';
      else return '<a href="'.$url.'" class="scp scp_button scp_button_' . $type . ' scp_button_' . $color . ' scp_' . $align . '"><span></span>' . $content . '</a>';
             

}
add_shortcode('button', 'scp_button_shortcode'); 
?>