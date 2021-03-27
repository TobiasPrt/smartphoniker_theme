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

    Block::make( __( 'Stores' ) )
        ->set_description( __( 'Stellt eine 3-spaltige Ansicht aus Karten mit Bild, Adresse, Öffnungszeiten und Link von ausgewählten Stores dar.') )
        ->set_category( 'widgets' )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'admin-multisite' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Stores' ) ),
            Field::make( 'set', 'stores', __( 'Anzuzeigende Stores auswählen' ) )
                ->set_options( $stores )
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            $fields['stores'] = array_filter($fields['stores']);
            get_template_part( 'template-parts/component', 'stores', $fields );
        } );
})();