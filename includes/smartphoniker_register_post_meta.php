<?php
/**
 * Registers all custom post meta.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'carbon_fields_register_fields', 'smartphoniker_register_post_meta' );


/**
 * Calls functions for registering all the custom post meta.
 *
 * @since 1.0.0
 */
function smartphoniker_register_post_meta() {
    foreach ( (array) glob( __DIR__ . "/post_meta/*.php" ) as $filename ) {
        require_once $filename;
    }
}