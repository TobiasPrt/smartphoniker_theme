<?php
/**
 * Add customizable page colors for every page.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Adds container with theme options for customizing the
 * color of the headers for all pages.
 *
 * @since 1.0.0
 * 
 * @param Carbon_Fields\Container\Theme_Options_Container $parent top-level theme options container
 */
function theme_option_page_color( Carbon_Fields\Container\Theme_Options_Container $parent ) {
    Container::make( 'theme_options', __( 'Seitenfarbe Einstellungen' ) )
        ->set_page_parent( $parent );
}