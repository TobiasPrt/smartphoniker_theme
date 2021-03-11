<?php
/**
 * Custom Block: Map
 * 
 * Gutenberg block which represents a map marked with locations.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


require_once __DIR__ . '/../smartphoniker-util.php';


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block map.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Map' ) )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Karte' ) ),
            Field::make( 'set', 'stores', __( 'Anzuzeigende Stores auswählen' ) )
                ->set_options( call_user_func( 'get_all_posts', 'store' ) )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {

            $locations = array();
            foreach( $fields['stores'] as $store => $store_id ) {
                array_push( $locations, array(
                    'id' => $store_id,
                    'title' => get_post_field( 'post_title', $store_id ),
                    'lat' => carbon_get_post_meta( intval( $store_id ), 'address' )['lat'],
                    'lng' => carbon_get_post_meta( intval( $store_id ), 'address' )['lng'],
                ) );
            }

            get_template_part( 'template-parts/component', 'map', array( 'locations' => $locations ) );
        } );
})();