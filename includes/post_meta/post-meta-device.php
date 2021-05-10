<?php
/**
 * Post Meta: Device
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for device post type.
 * 
 * @since 1.0.0
 */
(function() {
    Container::make( 'post_meta', _( 'Geräte Einstellungen' ) )
        ->where( 'post_type', '=', 'device' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'text', 'price', __( 'Günstigster Reparaturpreis für dieses Modell angeben' ) )
                ->set_help_text( 'Format: 79€ (ohne Kommma, mit € Symbol)' ),
            Field::make( 'set', 'repairs', __( 'Für dieses Modell verfügbare Reparaturen' ) )
                ->set_options( array(
                    'display' => 'Displayrepatur',
                    'back' => 'Backcover reparieren',
                    'front_cam' => 'Frontkamera',
                    'main_cam' => 'Rückkamera',
                    'battery' => 'Akkutausch',
                    'misc' => 'sonstige Kleinteilreparatur'
                ) ),
            Field::make( 'image', 'device_image', __( 'Geräte-Bild' ) ),
            Field::make( 'text', 'link', __( 'Link zum Smartphoniker Shop' ) )
                ->set_required( true ),
    ) );
})();