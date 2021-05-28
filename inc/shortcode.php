<?php

// init action will run at the begening
add_action( 'init' , 'fbs_dev_init');

function fbs_dev_init(){
    // add shortcode
    add_shortcode( 'news', 'news_shortcode' );
}

// define test shortcode function
function news_shortcode( $atts , $content='' ){
    
    $atts = shortcode_atts( array(
        'message' => 'default message',
    ), $atts, 'news' );

    $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    $query = new WP_Query( $args );

    if( $query->have_posts()):
        while( $query->have_posts() ): 
            $query->the_post();
            $content.= "<h2><a href='". get_the_permalink() ."'>" . get_the_title() . "</a></h2>";
            $content.= "<p>" . get_the_content() . "</p>";
        endwhile;
    endif;

    return $content;
}
