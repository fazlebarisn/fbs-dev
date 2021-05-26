<?php

add_action( 'admin_menu', 'fbs_dev_procese_form_setting' );

function fbs_dev_procese_form_setting(){
    register_setting( 'fbs_dev_option_group' , 'fbs_dev_option_name' );
    if( isset($_POST['action']) && current_user_can('manage_options') ){
        update_option( 'fbs_dev_name' , sanitize_text_field( $_POST['fbs_dev_name']) );
    }
    if( isset($_POST['action']) && current_user_can('manage_options') ){
        update_option( 'fbs_dev_city' , sanitize_text_field( $_POST['fbs_dev_city']) );
    }
}

function fbs_dev_menu_func(){
    ?>
        <div class="wrap">
            <h1>Fbs Plugin options</h1>
            <?php settings_errors()?>
            <form action="options.php" method="post">
            <?php settings_fields( 'fbs_dev_option_group' ); ?>
                <label for="fbs_dev_name"> Fbs Dev Name :
                    <input type="text" name="fbs_dev_name" value="<?php echo esc_html( get_option('fbs_dev_name')) ?>">
                </label>
                <label for="fbs_dev_city"> Fbs Dev City :
                    <input type="text" name="fbs_dev_city" value="<?php echo esc_html( get_option('fbs_dev_city')) ?>">
                </label>
                <?php submit_button('Save'); ?>
            </form>
        </div>
    <?php
}