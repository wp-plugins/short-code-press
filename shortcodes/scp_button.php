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
      return '<div><a href="'.$url.'" class="scp scp_button scp_button_' . $type . ' scp_button_' . $color . ' scp_' . $align . '"><span></span>' . $content . '</a></div>';

}
add_shortcode('button', 'scp_button_shortcode'); 
?>