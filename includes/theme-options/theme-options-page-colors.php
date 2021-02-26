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
function smartphoniker_theme_options_page_color( Carbon_Fields\Container\Theme_Options_Container $parent ) {
    $pages = get_pages();
    $fields = array();
    $colors = array(
        'orange' => __( 'Orange' ),
        'grey'   => __( 'Grau' ),
        'green'  => __( 'Grün' ),
        'blue'   => __( 'Dunkelblau' ),
    );

    foreach ( (array) $pages as $page ) {
        if ( 'Home' !== $page->post_title ) {
            $page_id = strtolower( $page->ID );
            $page_name = $page->post_title;
            $field = 
                Field::make( 'select', $page_id . '-color', __( 'Farbe für ' . $page_name  . ' wählen' ) )
                    ->set_options( $colors );
            array_push( $fields, $field );
        }
    }

    Container::make( 'theme_options', __( 'Seitenfarbe Einstellungen' ) )
        ->set_page_parent( $parent )
        ->add_fields( $fields );
}