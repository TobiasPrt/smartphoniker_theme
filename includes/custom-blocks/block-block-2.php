<?php
/**
 * Custom Block: Block-2
 * 
 * Gutenberg block which represents a 2-column block with an image and text.
 * This block is only allowed within a section block.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block block2.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Block-2' ) )
        ->add_fields(
            array(
                // Block Color
                Field::make( 'select', 'color', __( 'Block-Hintergrundfarbe' ) )
                    ->set_options( array(
                        'orange' => __( 'Orange' ),
                        'green'  => __( 'Grün' ),
                        'grey'   => __( 'Grau' ),
                        'blue'   => __( 'Dunkelblau' ),
                    ) ),

                // Block component types
                Field::make( 'complex', 'content', __( 'Inhalt wählen' ) )
                    ->set_min( 2 )
                    ->set_max( 2 )
                    ->set_layout( 'tabbed-horizontal' )
                    
                    // Image
                    ->add_fields( 'image', array(
                        Field::make( 'checkbox', 'image_is_small', __( 'Kleines Bild mit Rahmen?' ) ),
                        Field::make( 'image', 'image', __( 'Bild wählen' ) )
                    ) )

                    // Content
                    ->add_fields( 'content', array(
                        Field::make( 'textarea', 'text', __( 'Text' ) ),
                        Field::make( 'set', 'text_options', __( 'Text-Optionen' ) )
                            ->add_options( array(
                                'text_is_large'    => __( 'Text vergrößern' ),
                                'text_is_centered' => __( 'Text zentrieren' )
                            ) ),
                        Field::make( 'checkbox', 'button_is_enabled', __( 'Button anzeigen?' ) ),
                        Field::make( 'text', 'button_text', __( 'Button Text' ) )
                            ->set_help_text( 'Text der im Button stehen soll (max. 40 Zeichen).' )
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'button_is_enabled',
                                    'value' => true,
                                ),
                            ) ),
                        Field::make( 'select', 'button_link', __( 'Button Link' ) )
                            ->set_options(call_user_func( 'get_all_posts', array('page', 'job', 'service', 'store') ) )
                            ->set_help_text( 'Seite zu dem der Button führen soll' )
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'button_is_enabled',
                                    'value' => true,
                                ),
                            ) ),
                        Field::make( 'select', 'button_target', __( 'Art des Links wählen' ) )
                            ->set_conditional_logic( array(
                                array(
                                    'field' => 'button_is_enabled',
                                    'value' => true
                                )
                            ) )
                            ->set_options( array(
                                '_blank' => __( 'Link in neuem Tab/Fenster öffnen' ),
                                '_self' => __( 'Link im aktuellen Tab/Fenster öffnen' ),
                            ) ),
                    ) ),
            )
        )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'block-2', $fields );
        } );
})();