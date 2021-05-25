<?php

// init action will run at the begening
add_action( 'init' , 'fbs_dev_init');

function fbs_dev_init(){
    // add shortcode
    add_shortcode( 'test', 'test_shortcode' );
}

// define test shortcode function
function test_shortcode( $atts ){
    
    $atts = shortcode_atts( array(
        'message' => 'default message',
        'message2' => ' default message 2',
    ), $atts, 'test' );

    return $atts['message'] . $atts['message2'];
}

// how to use filter
add_filter( 'the_title', 'fbs_dev_change_title' );

function fbs_dev_change_title( $title ){
    return $title . " What the heck!";
}