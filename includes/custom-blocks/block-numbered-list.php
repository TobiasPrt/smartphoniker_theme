<?php
/**
 * Custom Block: Numbered List
 * 
 * Gutenberg block which represents a modular numbered List-layout.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block numbered-list
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Numbered-List' ) )
        ->set_description( __( 'Stellt eine nummerierte Liste mit Text und Optionen für Linkverweise dar.') )
        ->set_category( 'lists' )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'menu-alt3' )
        ->add_fields( array(
            Field::make( 'select', 'color', __( 'Farbe wählen ' ) )
                ->set_options( array(
                    'orange' => __( 'Orange' ),
                    'green' => __( 'Grün' ),
                    'grey' => __( 'Grau' ),
                    'dark_blue' => __( 'Dunkelblau' ),
                ) ),
            Field::make( 'complex', 'list_items', __( 'Listenelemente hinzufügen' ) )
                ->add_fields( array(
                    Field::make( 'separator', 'separator', __( 'Numbered-List' ) ),
                    Field::make( 'textarea', 'text', __( 'Listentext' ) )
                        ->set_required( true ),
                    Field::make( 'checkbox', 'has_source_link', __( 'Quellenverweis verwenden' ) ),
                    Field::make( 'text', 'link', __( 'Link zur Quelle' ) )
                        ->set_conditional_logic( array(
                            array(
                                'field' => 'has_source_link',
                                'value' => true
                            )
                        ) )
                        ->set_help_text( 'Muss nur eingefügt werden, wenn Option Quellenververweis verwenden aktiviert ist.' )
                        ->set_attribute( 'type', 'url' ),
                ) )
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'numbered-list', $fields );
        } );
})();