<?php

add_action( 'init', 'fbs_dev_new_custom_post' );

function fbs_dev_new_custom_post(){
    
    register_post_type( 'news' , array(
        'label' => 'Global News',
        'public' => true,
        'description' => ' This is a global custom post',
        'supports' => ['title','editor','thumbnail','custom-fields'],
    ));

    // Taxonomy labels
    $labels = array(
        'name' => _x( 'News Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'News Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search News' ),
        'all_items' => __( 'All News' ),
        'parent_item' => __( 'Parent News' ),
        'parent_item_colon' => __( 'Parent News:' ),
        'edit_item' => __( 'Edit News' ), 
        'update_item' => __( 'Update News' ),
        'add_new_item' => __( 'Add New News' ),
        'new_item_name' => __( 'New News Name' ),
        'menu_name' => __( 'News Categories' ),
      );    
     
    // Now register the taxonomy
      register_taxonomy('news',array('news'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'subject' ),
      ));
}

// add custom template for 'news' post type

//add_filter( 'template_include', 'fbs_dev_news_template' );

function fbs_dev_news_template( $template ){



    global $post;

    if( is_single() && $post->post_type == 'news'){

        $template = PLUGIN_PATH . 'templates/fbs_news.php';
        
    }
    return $template;
}
