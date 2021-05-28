<?php

// init action will run at the begening
add_action( 'init' , 'fbs_dev_init');

function fbs_dev_init(){
    // add shortcode
    add_shortcode( 'news', 'news_shortcode' );
}

// define news shortcode function
function news_shortcode( $atts , $content='' ){
    
    $atts = shortcode_atts( array(
        'posts_per_page' => -1,
    ), $atts, 'news' );

    $paged = ( get_query_var('paged') ) ?  get_query_var('paged') :1;
    $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'posts_per_page' => $atts['posts_per_page'],
        'paged' => $paged,
    );

    $query = new WP_Query( $args );

    if( $query->have_posts()):

        while( $query->have_posts() ): 
            $query->the_post();
            $content.= "<article id='post-news-" . get_the_ID() ."'>";
            $content.= "<h2><a class='news_title' href='". get_the_permalink() ."'>" . get_the_title() . "</a></h2>";
            $content.= "<p class='news_content'>" . get_the_content() . "</p>";
            $content.= "</article>";
        endwhile;

        if( $atts['posts_per_page'] > 0 ) :
            $content.= "<nav class='next_previous'>";
            $content.= get_next_posts_link( 'Older News' , $query->max_num_pages );
            $content.= get_previous_posts_link( 'Latest News');
            $content.= "</nav>";
        endif;

        wp_reset_query();
    endif;

    return $content;
}
