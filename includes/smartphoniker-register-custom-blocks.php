<?php
/**
 * Registers all custom Gutenberg Blocks.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'carbon_fields_register_fields', 'smartphoniker_register_custom_blocks' );


/**
 * Calls functions for registering all the custom Gutenberg Blocks.
 *
 * @since 1.0.0
 */
function smartphoniker_register_custom_blocks() {
    // Load custom blocks, which execute immediately since they are anonymous functions.
    foreach ( glob( __DIR__ . "/custom-blocks/*.php" ) as $filename ) {
        require_once $filename;
    }
}