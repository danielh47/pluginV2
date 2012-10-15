<?php
/*
Plugin Name: myplugin
 */
?>

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

function printHelloWord()
{
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
    echo "Hello Word";
}

add_action('login_footer', 'changeCSSInLoginPanel');
add_action('get_footer', 'printHelloWord');
?>
<?php
add_action( 'admin_menu', 'my_plugin_menu' );

function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
?>