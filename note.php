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


// Change stock status bese of plugin min quantity

add_filter( 'woocommerce_get_availability', 'wcmmq_custom_get_availability', 1, 2);

function wcmmq_custom_get_availability( $availability, $product ) {
    
    $min_quantity = get_post_meta( $product->get_id(), '_wcmmq_min_quantity', true);

    //If not available in single product, than come from default
    $min_quantity = !empty( $min_quantity ) ? $min_quantity : WC_MMQ::minMaxStep( '_wcmmq_min_quantity',$product->get_id() );
     
    // Change In Stock Text
    if ( $product->managing_stock()==true && $product->is_in_stock() && $min_quantity > $product->get_stock_quantity() ) {
        $availability['availability'] = __('<p class="stock out-of-stock">Out Of Stock!</p>', 'wcmmq');
    }
    return $availability;
}