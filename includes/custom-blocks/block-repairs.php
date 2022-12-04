<?php
/**
 * Custom Block: Repairs
 * 
 * Gutenberg block that displays selected repairs and relevant information in a table format.
 * 
 * @package Smartphoniker
 * @since 1.2.0
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Register repair block.
 * 
 * @since 1.2.0
 */
(function(){
    $devices = call_user_func( 'get_all_posts', 'device' );
    // $devices = array_filter($devices, function($name, $id) {
    //     if ( isset(get_post_meta($id)['_repairs|||0|value'] )) {
    //         // var_dump( $id );
    //         return true;
    //     }
    //     return false;
    // }, ARRAY_FILTER_USE_BOTH );

    // var_dump( $devices );
    // die();

    Block::make( __('Repairs') )
    ->set_description( __( 'Darstellung ausgewählter Reparaturen von Geräten in Tabellenformat.' ) )
    ->set_category( 'widgets' )
    ->set_parent( 'carbon-fields/section' )
    ->set_icon( 'editor-table' )
    ->add_fields( array(
        Field::make( 'complex', 'rows', __( 'Reparaturen' ) )
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
    ) )
    ->set_render_callback( function( array $fields, array $attributes, string $inner_blocks ) {
        # Call template part to render
        get_template_part( 'template-parts/component', 'repairs', $fields );
    } );
})();