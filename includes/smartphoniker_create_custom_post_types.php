<?php
/**
 * Creates custom post types.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'init', 'smartphoniker_create_custom_post_types' );


function smartphoniker_create_custom_post_types() {
    foreach ( (array) glob( __DIR__ . "/custom_post_types/*.php" ) as $filename ) {
        require_once $filename;
    }
}