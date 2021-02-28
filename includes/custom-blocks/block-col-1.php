<?php
/**
 * Custom Block: Columns-1
 * 
 * Gutenberg block which represents a single column text.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block col1
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Col-1' ) )
        ->add_fields(
            array(
                Field::make( 'textarea', 'text', __( 'Text' ) )
            )
        )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'block-2', $fields );
        } );
})();