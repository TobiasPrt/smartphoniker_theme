<?php
/**
 * Custom Block: Stores
 * 
 * Gutenberg block which represents a 3-column card view
 * of all the stores.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


require_once __DIR__ . '/../smartphoniker-util.php';


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block stores.
 *
 * @since 1.0.0
 */
(function() {
    $stores = call_user_func( 'get_all_posts', 'store' );
    // var_dump($stores);
    // die();
    Block::make( __( 'Stores' ) )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Store-Kacheln' ) ),
            Field::make( 'set', 'stores', __( 'Anzuzeigende Stores auswählen' ) )
                ->set_options( $stores )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            $fields['stores'] = array_filter($fields['stores']);
            get_template_part( 'template-parts/component', 'stores', $fields );
        } );
})();