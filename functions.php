<?php
/**
 * Main functions file.
 *
 * @package Smartphoniker
 */


/**
 * Require all files from ./includes.
 */
foreach ( glob( __DIR__ . "/includes/*.php" ) as $filename ) {
    require_once $filename;
}



/**
 * List all used hooks and corresponding functions.
 */
add_action( 'after_setup_theme', 'smartphoniker_setup' );
add_action( 'carbon_fields_register_fields', 'smartphoniker_register_cf_blocks' );

