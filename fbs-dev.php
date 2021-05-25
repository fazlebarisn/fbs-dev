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
}

function fbs_dev_menu_func(){
    echo "<h1>Fbs Options</h1>";
}

function fbs_settings_func(){
    echo "<h1>Fbs Settings</h1>";
}

function fbs_layout_func(){
    echo "<h1> Fbs Layout</h1>";
}