<?php
/**
 * Custom Block: Block List
 * 
 * Gutenberg block which represents a modular List-layout.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block Block-list
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Block-List' ) )
        ->add_fields( array(  
            Field::make( 'complex', 'list_items', __( 'Listenelemente hinzufügen' ) )
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon wählen' ) )
                        ->set_width( 25 ),
                    Field::make( 'textarea', 'text', __( 'Text' ) )
                        ->set_width( 75 ),
                ) )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'block-list', $fields );
        } );
})();