<?php
/*
Plugin Name: myplugin
 */
?>

<script type="text/javascript">
    window.addEventListener('load', function () {
    var backgroundColors = ['blue', 'yellow', 'green'];    
    var i = 0;
    setInterval(function () {
        i++;
        i%=backgroundColors.length;
        
        document.body.style.backgroundColor = backgroundColors[i];
    }, 2000);
}, false);
</script>
<?php

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
