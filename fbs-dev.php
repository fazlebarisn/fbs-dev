<?php
/**
 * @package FbsDevPlugin
*/

/*
Plugin Name: Fbs Dev Plugin
Plugin URI: https://www.chitabd.com/
Description: My New Plugin
Version: 1.0.0
Author: Fazle Bari
Author URI: https://www.chitabd.com/
Licence: GPL Or leater
Text Domain: fbs-dev
*/

/*
This is a free plugin
*/

defined('ABSPATH') or die('Nice Try!');

add_action( 'wp_enqueue_scripts', 'fbs_dev_enqueue_script' );

function fbs_dev_enqueue_script(){
    // include style file
    wp_enqueue_style( 'fbs_dev_style', plugin_dir_url(__FILE__) . "assets/css/style.css" );

    // include js file
    wp_enqueue_script( 'fbs_dev_script', plugin_dir_url(__FILE__) . "assets/js/custom.js", array(), '1.0.0', true );
}


// add menu in wordpress dashbord
add_action( 'admin_menu', 'fbs_dev_munu' );

function fbs_dev_munu(){
    add_menu_page( 'Fbs Dev', 'Fbs Dev Options', 'manage_options', 'fbs_dev_options', 'fbs_dev_menu_func', '', null );

    add_submenu_page( 'fbs_dev_options', 'Fbs Settings', 'Fbs Settings', 'manage_options', 'fbs_settings', 'fbs_settings_func', null );
    add_submenu_page( 'fbs_dev_options', 'Fbs Layout', 'Fbs Layout', 'manage_options', 'fbs_layout', 'fbs_layout_func', null );
    // add submenu under dashbord menu
    add_dashboard_page( 'Fbs plugin options', 'Fbs plugin options', 'manage_options', 'fbs_plugin_options', 'fbs_plugin_options_func', null );
}

register_activation_hook( __FILE__, function(){
    add_option( 'fbs_dev_name','' );
} );
register_deactivation_hook( __FILE__, function(){
    delete_option( 'fbs_dev_name');
} );

function fbs_dev_menu_func(){
    ?>
        <div class="wrap">
            <h1>Fbs Plugin options</h1>
            <form action="options.php" method="post">
                <label for="fbs_dev_name"> Fbs Dev Name</label>
                <input type="text" name="fbs_dev_name" value="<?php echo esc_html( get_option('fbs_dev_name')) ?>">
                <?php submit_button('Save'); ?>
            </form>
        </div>
    <?php
}

function fbs_settings_func(){
    echo "<h1>Fbs Settings</h1>";
}

function fbs_layout_func(){
    echo "<h1> Fbs Layout</h1>";
}

function fbs_plugin_options_func(){
    echo "<h1> Fbs Plugin Options</h1>";
}