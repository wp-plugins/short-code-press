<?php 
/*...*/

function scp_box_shortcode( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'type' => '',
      'template' => '',
      'color' => '',
      'width' => '',
      'align' => '',
      ), $atts ) );

      if($template!='')$tpl=' drop-shadow '.$template.' ';
      return '<style type="text/css">.scp_box_'.$width.'{width:'.$width.'px;}</style><div class="box_container scp_'. $align.'" style="width:'.($width+20).'px"><div class="scp scp_box scp_box_' . $width . ' scp_box_' . $color . ' '. $tpl.'">' . $content . '</div></div>';

}
add_shortcode('box', 'scp_box_shortcode'); 
?>