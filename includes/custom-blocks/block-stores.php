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


require_once __DIR__ . '/../smartphoniker_util.php';


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block stores.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Stores' ) )
        ->add_fields( array(
            Field::make( 'set', 'stores', __( 'Anzuzeigende Stores auswählen' ) )
                ->set_options( call_user_func( 'get_all_posts', 'store' ) )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'stores', $fields['stores'] );
        } );
})();