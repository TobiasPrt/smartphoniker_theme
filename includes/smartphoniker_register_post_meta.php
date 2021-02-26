<?php
/**
 * Registers all custom post meta.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'carbon_fields_register_fields', 'smartphoniker_register_post_meta' );


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Calls functions for registering all the custom Gutenberg Blocks.
 *
 * @since 1.0.0
 */
function smartphoniker_register_post_meta() {
    Container::make( 'post_meta', _( 'Header Einstellungen' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '!=', 'front_page.php' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'select', 'header-color', __( 'Header-Farbe wählen' ) )
                ->set_options( array(
                    'orange' => __( 'Orange' ),
                    'grey'   => __( 'Grau' ),
                    'green'  => __( 'Grün' ),
                    'blue'   => __( 'Dunkelblau' ),
                ) )
                ->set_required( true ),
            Field::make( 'checkbox', 'header_button_is_enabled', __( 'Button unter dem Titel anzeigen?' ) ),
            Field::make( 'text', 'header_button_text', __( 'Button-Text' ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'header_button_is_enabled',
                        'value' => true
                    )
                ) ),
            Field::make( 'text', 'header_button_link', __( 'Button-Link' ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'header_button_is_enabled',
                        'value' => true
                    )
                ) ),
            Field::make( 'select', 'header_button_target', __( 'Art des Links wählen' ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'header_button_is_enabled',
                        'value' => true
                    )
                ) )
                ->set_options( array(
                    '_blank' => __( 'Link in neuem Tab/Fenster öffnen' ),
                    '_self' => __( 'Link im aktuellen Tab/Fenster öffnen' ),
                ) ),
    ) );
}