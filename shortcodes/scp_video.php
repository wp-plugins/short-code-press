<?php 
/*...*/
// Returns null if video id doesn't exist in URL
function get_video_id($url) {
  $parts = parse_url($url);
  // Handle Youtube
  if (strpos($url, "youtube.com")) {

  // Make sure $url had a query string
  if (!array_key_exists('query', $parts))
    return null;

  parse_str($parts['query']);

  // Return the 'v' parameter if it existed
  return isset($v) ? $v : null;
  }
  else if (strpos($url, "vimeo.com")) {
    $video_id=explode('vimeo.com/', $url);
    $video_id=$video_id[1];
    return $video_id;
  }
   else if(strpos($url,"dailymotion.com")){
        $debut_id = explode("/video/",$url,2);
        $id_et_fin_url = explode("_",$debut_id[1],2);
        $id = $id_et_fin_url[0];
        return $id;
    }
  else{}
}

function scp_video_shortcode( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'url' => '',
      'width' => '',
      'height' => '',
      'align' => '',
      ), $atts ) );
      isset($width) ? $width : '560';
      isset($height) ? $height : '315';
      $vid=get_video_id($url);
      if (strpos($url, "youtube.com")) {
          $content="<iframe width=\"$width\" height=\"$height\" src=\"http://www.youtube.com/embed/$vid\" frameborder=\"0\" allowfullscreen></iframe>";
      }
      else if (strpos($url, "vimeo.com")) {
            $content="<iframe width=\"$width\" height=\"$height\" src=\"http://player.vimeo.com/video/$vid?byline=0&amp;portrait=0\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";
      }
      if (strpos($url, "dailymotion.com")) {
          $content="<iframe width=\"$width\" height=\"$height\" src=\"http://www.dailymotion.com/embed/video/$vid\" frameborder=\"0\" allowfullscreen></iframe>";
      }
      else{}
      return '<div class="scp scp_video scp_' . $align . '">' . $content . '</div>';

}
add_shortcode('video', 'scp_video_shortcode'); 
?>