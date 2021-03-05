<?php
/**
 * Creates custom taxonomies.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'init', 'smartphoniker_create_custom_taxonomies', 0 );


function smartphoniker_create_custom_taxonomies() {
    foreach ( (array) glob( __DIR__ . "/custom_taxonomies/*.php" ) as $filename ) {
        require_once $filename;
    }
}