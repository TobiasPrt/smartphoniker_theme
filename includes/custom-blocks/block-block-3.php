<?php
/**
 * Custom Block: Block-3
 * 
 * Gutenberg block which represents a 3-column block with 3 images
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block block3.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Block-3' ) )
        ->set_description( __( 'Ein Block, der aus drei gleich großen Bildern besteht.' ) )
        ->set_category( 'blocks', __( 'Blocks' ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'screenoptions' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Block-3' ) ),
            Field::make( 'media_gallery', 'images', __( 'Bilder wählen (3)' ) )
                ->set_duplicates_allowed( false )
                ->set_help_text( 'Bitte nicht mehr oder weniger als 3 Bilder wählen.' )
                ->set_required( true ),
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'block-3', $fields );
        } );
})();