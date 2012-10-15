<?php
/*
Plugin Name: myplugin
 */
function changeCSSInLoginPanel()
{
    echo '<link rel="Stylesheet" type="text/css" href="wp-content/plugins/myplugin/CSS/loginPanel.css" />';
    echo '<style type="text/css">
        h1 a {
            background: url(wp-content/plugins/myplugin/images/logo.png) no-repeat top center !important; 
        }
        </style>';
}


add_action('login_footer', 'changeCSSInLoginPanel');
?>
