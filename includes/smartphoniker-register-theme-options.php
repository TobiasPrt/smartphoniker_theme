<?php
/**
 * Register theme options.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


foreach ( glob( __DIR__ . "/theme-options/*.php" ) as $filename ) {
    require_once $filename;
}

/**
 * Calls functions for registering all theme options.
 *
 * @since 1.0.0
 */
function smartphoniker_register_theme_options() {
    $parent = theme_option_general();
    theme_option_home( $parent );
}
