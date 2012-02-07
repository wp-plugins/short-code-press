<?php

	function section () {
		global $section, $subsection;
		if (!$section) $section = 0;
		$section++;
		echo $section. ' ';	
		$subsection = 0;
	}


	function subsection () {
		global $section, $subsection;
		if (!$subsection) $subsection = 0;
		$subsection++;
		echo $section . '.' . $subsection . ' ';	
	}


?>


<h3><?php _e('Looking for help?', 'shortcodepress'); ?> <form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="shaid99@live.com" />
        <input type="hidden" name="item_name" value="Donation" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="amount" value="5" />
        <input class="button-primary" type="submit" name="submit" value="<?php _e('Donate via PayPal!', 'shortcodepress'); ?>" />
    </form></h3>


<p><?php _e('Using Shortcode Press, this plugin will allow you to easily insert message boxes, buttons, video and hghlighted text into your WordPress posts and pages. You will find a tinymce Button on editor to use options, there are many configurations. All buttons, boxes, text highlighter include multiple color and size options. For button here lots of icons to choose to fill your desire. For example, there is an down arrow icon that works great for download buttons, an tick icon for accpetance, info icon for define information, etc.'); ?></p>
<p>Bellow some graphical step by step instractions -</p>
<p><img src="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/images/screenshot-1.png" alt="shortcode ppress editor button"><br />
Shortcode Press button from editor of post or page
</p>
<br />
<p><img src="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)); ?>/images/screenshot-2.png" alt="shortcode ppress editor button"><br />
Shortcode Press available codes to use on your post or page. Click on any of them and then you get options to classify them.
</p>
<br /><br />

<p><?php _e('For more information on how this plugin works, go to', 'shortcodepress'); ?> <a href="http://www.shortcodepress.com/forums/">Contact</a>.</p>

<p><?php _e('Please report bugs to', 'shortcodepress'); ?> <a href="http://www.shortcodepress.com/forums/">Shortcode Press Forum</a>.</p>
<br /><br />
<p><center>
    <form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="shaid99@live.com" />
        <input type="hidden" name="item_name" value="Donation" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="amount" value="5" />
        <input class="button-primary" type="submit" name="submit" value="<?php _e('Donate via PayPal!', 'shortcodepress'); ?>" />
    </form>
</center>
</p>