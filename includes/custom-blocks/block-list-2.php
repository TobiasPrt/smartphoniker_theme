<?php
/**
 * Custom Block: List-2
 * 
 * Gutenberg block which represents a 2-column layout list
 * containing an icon, a heading and a short text.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block list-2.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'List-2' ) )
        ->add_fields ( array(
            Field::make( 'complex', 'list', __('Liste (2-6 Elemente)'))
                ->set_min(2)
                ->set_max(6)
                ->add_fields( array(
                    Field::make( 'image', 'icon', __( 'Icon wählen' ) ),
                    Field::make( 'text', 'heading', __( 'Überschrift' ) ),
                    Field::make( 'textarea', 'text', __( 'Kurzbeschreibung' ) ),
                ) ),
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'list-2', $fields );
        } );
})();