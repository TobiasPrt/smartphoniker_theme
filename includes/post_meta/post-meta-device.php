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
 * @since 1.1.0 added bestseller and image option
 */
(function() {
    Container::make( 'post_meta', _( 'Geräte Einstellungen' ) )
        ->where( 'post_type', '=', 'device' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'checkbox', 'is_bestseller', __( 'Gerät ist ein Top-Modell für die Darstellung in anderen Blocks.' ) )
                ->set_option_value( 'yes' ),
            Field::make( 'image', 'device_image', __( 'Geräte-Bild' ) )
                ->set_conditional_logic( array(
                    array(
                        'field' => 'is_bestseller',
                        'value' => true
                    )
                ))
                ->set_required( true ),
            Field::make( 'text', 'link', __( 'Link zum Smartphoniker Shop' ) )
                ->set_required( true ),
    ) );
})();