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

define( 'PLUGIN_PATH' , plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL' , plugin_dir_url(__FILE__) );

// include files
include PLUGIN_PATH . "inc/fbs-plugin-option.php";
include PLUGIN_PATH. "inc/metaboxes.php";
include PLUGIN_PATH . "inc/custom-posts.php";
include PLUGIN_PATH . "inc/shortcode.php";
include PLUGIN_PATH . "inc/ajax.php";

// add script for fondend
add_action( 'wp_enqueue_scripts', 'fbs_dev_enqueue_script' ); // wp_enqueue_scripts

function fbs_dev_enqueue_script(){
    // include style file
    wp_enqueue_style( 'fbs_dev_style', PLUGIN_URL . "assets/css/style.css" );

    // include js file
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fbs_dev_script', PLUGIN_URL . "assets/js/custom.js", array(), '1.0.0', true );

    // add ajax update option
    wp_localize_script( 'fbs_dev_script', 'ajax_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'num1' => 10,
    ));
}

// adding script only for admin panel
add_action( 'admin_enqueue_scripts', 'fbs_dev_enqueue_admin_script' );

function fbs_dev_enqueue_admin_script(){
    //wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fbs_dev_script', PLUGIN_URL . "assets/js/custom.js", array(), '1.0.0', true );
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

// register_activation_hook( __FILE__, function(){
//     add_option( 'fbs_dev_name','' );
// } );
// register_deactivation_hook( __FILE__, function(){
//     delete_option( 'fbs_dev_name');
// } );

function fbs_settings_func(){
    echo "<h1>Fbs Settings</h1>";
}

function fbs_layout_func(){
    echo "<h1> Fbs Layout</h1>";
}

function fbs_plugin_options_func(){
    echo "<h1> Fbs Plugin Options</h1>";
}