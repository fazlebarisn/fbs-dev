<?php

add_action( 'init', 'fbs_dev_new_custom_post' );

function fbs_dev_new_custom_post(){
    register_post_type( 'news' , array(
        'label' => 'Global News',
        'public' => true,
        'description' => ' This is a global custom post',
        'supports' => ['title','editor','thumbnail','custom-fields'],
    ));
}

// add custom template for 'news' post type

add_filter( 'template_include', 'fbs_dev_news_template' );

function fbs_dev_news_template( $template ){



    global $post;

    if( is_single() && $post->post_type == 'news'){

        $template = PLUGIN_PATH . 'templates/fbs_news.php';
        
    }
    return $template;
}
