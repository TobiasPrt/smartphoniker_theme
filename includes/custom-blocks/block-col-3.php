<?php
/**
 * Custom Block: Columns-3
 * 
 * Gutenberg block which represents a modular 3 column layout.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block col3
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Col-3' ) )
        ->add_fields(
            array(
                // Column Options
                Field::make( 'set', 'column_options', __( 'Spaltenoptionen' ) )
                    ->set_options( array(
                        'text_is_left_aligned' => __( 'Text linksbündig ausrichten' ),
                        'has_orange_accent'    => __( 'Orange Überschrift / Untertitel' ),
                        'icon_is_small'        => __( 'Flache Icons verwenden für z.B. Sterne-Bewertung' ),
                    ) ),

                // Column Types
                Field::make( 'complex', 'columns', __( 'Spalten (3)' ) )
                    ->set_min( 3 )
                    ->set_max( 3 )
                    ->set_layout( 'tabbed-horizontal' )
                    
                    // Icon - Heading - Text
                    ->add_fields( 'icon-heading-text',array(
                        Field::make( 'image', 'icon', __( 'Icon wählen' ) )
                            ->set_required ( true ),
                        Field::make( 'text', 'heading', __( 'Überschrift' ) )
                            ->set_required( true ),
                        Field::make( 'textarea', 'text', __( 'Text' ) )
                            ->set_required( true ),
                    ) )

                    // Smallicon - Text - Subtitle
                    ->add_fields( 'icon-text-subtitle', array(
                        Field::make( 'image', 'icon', __( 'Icon wählen') )
                            ->set_required ( true ),
                        Field::make( 'textarea', 'text', __( 'Text' ) )
                            ->set_required( true ),
                        Field::make( 'text', 'subtitle', __( 'Untertitel' ) )
                            ->set_required( true ),
                    ) )

                    // Heading - Text
                    ->add_fields( 'heading-text',array(
                        Field::make( 'text', 'heading', __( 'Überschrift' ) )
                            ->set_required( true ),
                        Field::make( 'textarea', 'text', __( 'Text' ) )
                            ->set_required( true ),
                    ) )
            )
        )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'col-3', $fields );
        } );
})();