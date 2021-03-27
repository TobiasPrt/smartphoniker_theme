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
    Block::make( __( 'Long-Text' ) )
        ->set_description( __( 'Stellt formatierten 1-spaltigen Text dar.') )
        ->set_category( 'common' )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'media-document' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Long-Text' ) ),
            Field::make( 'html', 'info', __( 'Info' ) )
                ->set_html( 'Heading 3 für Überschriften wählen. Die Listenfunktion für Aufzählungen verwenden. Neue Zeilen innerhalb eines Paragraph mit Shift + Enter erzeugen.' ),
            Field::make( 'rich_text', 'text', __( 'Formatierter Langer Text' ) )
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            echo '<div class="long-text">' . wpautop( $fields['text'] ) . '</div>';
        } );
})();