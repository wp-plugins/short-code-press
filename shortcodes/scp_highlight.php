<?php 
/*...*/

function scp_highlight_shortcode( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'color' => '',
      'text' => '',
      'align' => '',
      ), $atts ) );

      if($template!='')$tpl=' drop-shadow '.$template.' '.$color.' ';
      //$content=$text;
      return '<span class="scp_highlight scp_highlight_' . $color . ' scp_' . $align .'">' . $content . '</span>';

}
add_shortcode('highlight', 'scp_highlight_shortcode'); 
?>