<?php
/**
 * Post Meta: Store
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for store post type.
 * 
 * @since 1.0.0
 */
(function() {
    Container::make( 'post_meta', _( 'Standort Einstellungen' ) )
        ->set_context( 'normal' )
        ->where( 'post_type', '=', 'store' )
        ->add_fields( array(
            /** * @todo implement Google Maps for choosing adress */
            Field::make( 'select', 'state', __( 'Aktueller Status' ) )
                ->set_help_text( 'Öffnungszeiten sind deaktiviert, wenn der Standort geschlossen oder nur mit Termin besuchbar ist.' )
                ->set_options( array( 
                    'closed' => 'Standort vorrübergehend geschlossen',
                    'open' => 'Standort hat zu den regulären Zeiten geöffnet',
                    'appointment_needed' => 'Standort ist nur mit Termin zu besuchen',
                    'contactless' => 'Standort kann ohne Termin, aber kontaktlos besucht werden',
                    'other' => 'Anderer Status'
                 ) ),
            Field::make( 'text', 'other_state', __( 'Statusbeschreibung' ))
                ->set_conditional_logic( array( 
                    array(
                        'field' => 'state',
                        'value' => 'other'
                    )
                ) ),
            Field::make( 'complex', 'opening_hours', __( 'Öffnungszeiten' ) )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'state',
                        'value' => 'closed',
                        'compare' => '!='
                    ),
                    array(
                        'field' => 'state',
                        'value' => 'appointment_needed',
                        'compare' => '!='
                    )
                ) )
                ->set_help_text( 'Öffungszeiten als Text in Zeilen angeben.' )
                ->add_fields( array(
                    Field::make( 'text', 'line', __( 'Zeile' ) )
                ) ),
            Field::make( 'image', 'header_image', __( 'Header-Bild' ) )
                ->set_width( 50 )
                ->set_value_type( 'url' )
                ->set_required( true ),
    ) );
})();