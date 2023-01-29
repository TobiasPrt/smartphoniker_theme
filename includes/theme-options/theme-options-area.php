<?php
/**
 * Add theme options for area page.
 * 
 * @package Smartphoniker
 * @since 1.1.13
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Adds container with theme options for area page
 * as a submenu of the top-level theme options container.
 * Here the text and devices shown in a table can be modified.
 *
 * @since 1.1.13
 * 
 * @param Carbon_Fields\Container\Theme_Options_Container $parent top-level theme options container
 */
function smartphoniker_theme_options_area( Carbon_Fields\Container\Theme_Options_Container $parent ) {
    $devices = call_user_func( 'get_all_posts', 'device' );

    Container::make( 'theme_options', __( 'Einzugsgebiete Einstellungen' ) )
        ->set_page_parent( $parent )
        ->add_fields( array(
            Field::make( 'html', 'area_description', __( 'Einzugsgebiete Einstellungen' ) )
            ->set_html( 'Die Einstellungen auf dieser Seite betreffen die Landing Pages der Einzugsgebiete' ),
            Field::make( 'complex', 'area_rows', __( 'Reparaturen' ) )
            ->setup_labels( array(
                'plural_name' => 'Reparaturen',
                'singular_name' => 'Reparatur',
            ) )
            ->add_fields( array(
                Field::make( 'select', 'device', __( 'Gerät' ) )
                    ->add_options( $devices ),
                Field::make( 'select', 'repair', __( 'Reparatur' ) )
                    ->add_options( array(
                        'display' => __( 'Display' ),
                        'backcover' => __( 'Backcover' ),
                        'battery' => __( 'Akku' ),
                        'camera' => __( 'Kamera' ),
                        'mic' => __( 'Mikrofon' ),
                        'charging_connector' => __( 'Ladebuchse' ),
                    ) ),
            ) )

        ) );
}