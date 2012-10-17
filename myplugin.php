<?php
/*
Plugin Name: myplugin
 */
session_start();
if(!isset($_SESSION['changeMyBackground']))
{
    $_SESSION['changeMyBackground'] = true;
}
if(isset($_POST['changeMyBackground']))
{
    if($_POST['changeMyBackground'] == "1")
    {
        echo $_SESSION['changeMyBackground'] = 1;
    }
    else 
    {
        echo $_SESSION['changeMyBackground'] = 0;
    }
}

add_action('login_footer', 'changeCSSInLoginPanel');
add_action('get_footer', 'printHelloWord');
add_action( 'admin_menu', 'my_plugin_menu' );
if($_SESSION['changeMyBackground'] == true)
    add_action('get_footer', 'changeBackgroundColor');

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
    echo "Hello Word";
}

function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

function my_plugin_options() {
	if(!current_user_can('manage_options'))
        {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
        if($_SESSION['changeMyBackground'] == true)
        { ?>
            <form action="index.php" method=post>
                <input id="changeMyBackground1" type="radio" name="changeMyBackground" value="1" checked="checked" />Zmieniaj kolor tła co 2 sekundy<br>
                <input id="changeMyBackground0" type="radio" name="changeMyBackground" value="0" />Nie zmieniaj koloru tła<br>
                <input type=submit name=edit value=Zmień />
            </form>
        <?php }
        else
        { ?>
            <form action="index.php" method=post>
                <input id="changeMyBackground1" type="radio" name="changeMyBackground" value="1" />Zmieniaj kolor tła co 2 sekundy<br>
                <input id="changeMyBackground0" type="radio" name="changeMyBackground" value="0" checked="checked" />Nie zmieniaj koloru tła<br>
                <input type=submit name=edit value=Zmień />
            </form>
        <?php }
#changeMyBackground->
}

function changeBackgroundColor()
{ ?>
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
} ?>