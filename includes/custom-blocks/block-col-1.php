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
        ->set_description( __( 'Ein Einspaltiges Textfeld.' ) )
        ->set_category( 'columns', __( 'Spalten' ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'columns' )
        ->add_fields(
            array(
                Field::make( 'separator', 'separator', __( 'Col-1' ) ),
                Field::make( 'textarea', 'text', __( 'Text' ) )
            )
        )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'col-1', $fields );
        } );
})();