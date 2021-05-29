<?php
defined('ABSPATH') or die('Nice Try!');
// admin ajax action
add_action( 'wp_ajax_my_ajax_action', 'fbs_dev_ajax_action' );
add_action( 'wp_ajax_my_front_ajax_action', 'fbs_dev_my_front_ajax_action' );
add_action ( 'wp_ajax_nopriv_my_front_ajax_action', 'fbs_dev_my_front_ajax_action' );

function fbs_dev_ajax_action(){
    if( isset( $_POST['action'] ) && isset( $_POST['fbs_name'] ) ){
        update_option( 'fbs_dev_name' , sanitize_text_field( $_POST['fbs_name'] ));
        echo "Fiel Successfully Updsted";
    }else{
        echo "Error updating field";
    }
    wp_die();
}

// frontend ajax action

function fbs_dev_my_front_ajax_action(){
    if( isset( $_POST['action'] ) && isset( $_POST['value'] ) ){
        echo absint( $_POST['value']) + 10;
    }else{
        echo "Error updating field";
    }
    wp_die();
}