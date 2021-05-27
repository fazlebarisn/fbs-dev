<?php

add_action( 'admin_init' , function(){
    add_meta_box( '_mycustommetabox' , 'My Custom Metabox' , 'fbs_dev_custom_metabox' , ['post','page']);
} );

function fbs_dev_custom_metabox( $post ){

    $_mymetabox = get_post_meta( $post->ID, '_mymetabox' , true ) ? get_post_meta( $post->ID, '_mymetabox' , true ) : '';
    $_fbs_dev_city = get_post_meta( $post->ID, '_fbs_dev_city' , true ) ? get_post_meta( $post->ID, '_fbs_dev_city' , true ) : '';

    //var_dump($_mymetabox);
    ?>
        <label for="fbs_dev_metabox_name">Name :
            <input type="text" name="_mymetabox" id="" class="" value="<?php echo $_mymetabox ?>">
        </label>
        <label for="fbs_dev_metabox_city"> City :
            <select name="_fbs_dev_city" id="">
                <option value="Dhaka" <?php echo $_fbs_dev_city== "Dhaka" ? 'selected' : '' ?>>Dhaka</option>
                <option value="Rajshahi" <?php echo $_fbs_dev_city== "Rajshahi" ? 'selected' : '' ?>>Rajshahi</option>
                <option value="Naogaon" <?php echo $_fbs_dev_city== "Naogaon" ? 'selected' : '' ?>>Naogaon</option>
            </select>
        </label>
    <?php
}

add_action( 'save_post', 'fbs_dev_save_post' );

function fbs_dev_save_post( $post_id ){

    if( array_key_exists( '_mymetabox' , $_POST ) && array_key_exists( '_fbs_dev_city' , $_POST ) ){
        update_post_meta( $post_id , '_mymetabox' , $_POST['_mymetabox'] );
        update_post_meta( $post_id , '_fbs_dev_city' , $_POST['_fbs_dev_city'] );
    }
}