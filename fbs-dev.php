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

add_action( 'init' , 'fbs_dev_init');

function fbs_dev_init(){
    add_shortcode( 'test', 'test_shortcode' );
}

function test_shortcode( $atts ){
    
    $atts = shortcode_atts( array(
        'message' => 'default message',
        'message2' => ' default message 2',
    ), $atts, 'test' );

    return $atts['message'] . $atts['message2'];
}