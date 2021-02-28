<?php
/**
 * Register theme options.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'carbon_fields_register_fields', 'smartphoniker_register_theme_options' );


foreach ( glob( __DIR__ . "/theme-options/*.php" ) as $filename ) {
    require_once $filename;
}

/**
 * Calls functions for registering all theme options.
 *
 * @since 1.0.0
 */
function smartphoniker_register_theme_options() {
    $parent = smartphoniker_theme_options();
    smartphoniker_theme_options_home( $parent );
}
