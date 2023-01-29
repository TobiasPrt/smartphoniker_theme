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
 * @since 1.1.13 added area option
 */
function smartphoniker_register_theme_options() {
    $parent = smartphoniker_theme_options();
    smartphoniker_theme_options_home( $parent );
    smartphoniker_theme_options_404( $parent );
    smartphoniker_theme_options_area( $parent );
}
