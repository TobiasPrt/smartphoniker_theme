<?php
/**
 * Custom Block: Block-5
 * 
 * Gutenberg block which represents a 5-column block with 5 images
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block block-5.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Block-5' ) )
        ->add_fields( array(
            Field::make( 'media_gallery', 'images', __( 'Bilder wählen (5)' ) )
                ->set_duplicates_allowed( false )
                ->set_help_text( 'Bitte nicht mehr oder weniger als 5 Bilder wählen.' )
                ->set_required( true ),
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'block-5', $fields );
        } );
})();