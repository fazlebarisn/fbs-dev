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