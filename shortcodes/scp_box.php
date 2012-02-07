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

      if($template!='')$tpl=' drop-shadow '.$template.' '.$color.' ';
      return '<style type="text/css">.scp_box_'.$width.'{width:'.$width.'px;}</style><div class="box_container"><div class="scp scp_box scp_box_' . $width . ' scp_box_' . $color . ' scp_' . $align . $tpl.'">' . $content . '</div></div>';

}
add_shortcode('box', 'scp_box_shortcode'); 
?>