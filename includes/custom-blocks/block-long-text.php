<?php
/**
 * Custom Block: Long Text
 * 
 * Gutenberg block which represents a long text with a rich text field.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block long text
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'long-text' ) )
        ->add_fields( array(
             Field::make( 'rich_text', 'text', __( 'Formatierter Langer Text' ) )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            echo '<div class="long-text">' . wpautop( $fields['text'] ) . '</div>';
        } );
})();