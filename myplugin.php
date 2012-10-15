<?php
/*
Plugin Name: myplugin
 */
function changeCSSInLoginPanel()
{
    
    echo '<link rel="Stylesheet" type="text/css" href="wp-content/plugins/myplugin/CSS/loginPanel.css" />';
}


add_action('login_footer', 'changeCSSInLoginPanel');
?>
