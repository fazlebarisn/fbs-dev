<?php

add_action( 'admin_init' , function(){
    add_meta_box( '_mycustommetabox' , 'My Custom Metabox' , 'fbs_dev_custom_metabox' , ['post','page']);
} );

function fbs_dev_custom_metabox( $post ){

    $_mymetabox = get_post_meta( $post->ID, '_mymetabox' , true ) ? get_post_meta( $post->ID, '_mymetabox' , true ) : '';

    //var_dump($_mymetabox);
    ?>
        <input type="text" name="_mymetabox" id="" class="" value="<?php echo $_mymetabox ?>">
    <?php
}

add_action( 'save_post', 'fbs_dev_save_post' );

function fbs_dev_save_post( $post_id ){

    if( array_key_exists( '_mymetabox' , $_POST )){
        update_post_meta( $post_id , '_mymetabox' , $_POST['_mymetabox'] );
    }
}