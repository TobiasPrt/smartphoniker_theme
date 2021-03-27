<?php
/**
 * Custom Block: Form
 * 
 * Gutenberg block which allows user to choose from predefined forms
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block Form.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Form' ) )
        ->set_description( __( 'Stellt ein ausgewähltes Formular dar.') )
        ->set_category( 'widgets', __( 'Vorausgefüllte Blocks' ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'feedback' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Form' ) ),
            Field::make( 'select', 'form', __( 'Formular auswählen' ) )
                ->set_options( array(
                    'contact' => 'Kontaktformular',
                    'application' => 'Bewerbungsformular',
                ) )
                ->set_required( true ),
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/form', $fields['form'] );
        } );
})();