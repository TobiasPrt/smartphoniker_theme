<?php
/**
 * Post-Meta for 404 Page
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


require_once __DIR__ . '/../smartphoniker-util.php';


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Adds container with theme options for 404 page
 * 
 * @since 1.0.0
 * 
 * @param Carbon_Fields\Container\Theme_Options_Container $parent top-level theme options container
 */
function smartphoniker_theme_options_404( Carbon_Fields\Container\Theme_Options_Container $parent ) {
    $pages = call_user_func( 'get_all_posts', null );

    return Container::make( 'theme_options', __( '404 Einstellungen' ) )
        ->set_page_parent( $parent )
        ->add_fields( array(
            Field::make( 'select', '404-header-color', __( 'Header-Farbe wählen' ) )
                ->set_options( array(
                    'orange' => __( 'Orange' ),
                    'grey'   => __( 'Grau' ),
                    'green'  => __( 'Grün' ),
                    'blue'   => __( 'Dunkelblau' ),
                ) )
                ->set_required( true ),
            Field::make( 'text', '404-title', __( 'Slogan' ) )
                ->set_help_text( 'Titel in Kopfbereich' )
                ->set_required( true ),
            Field::make( 'text', '404-heading', __( 'Überschrift' ) )
                ->set_help_text( 'Section Überschrift' )
                ->set_required( true ),
            Field::make( 'textarea ', '404-text', __( 'Text' ) )
                ->set_help_text( 'Text, der in col-1 Format angezeigt wird' )
                ->set_required( true ),
            Field::make( 'set', 'link_list', __( 'Anzuzeigende Links auswählen' ) )
                ->set_help_text( 'Liste von Links die vorgeschlagen werden' )
                ->set_options( $pages )
        ) );
}