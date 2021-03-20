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
        ->set_context( 'carbon_fields_after_title' )
        ->add_fields( array(
            Field::make( 'text', 'link', __( 'Link zum Smartphoniker Shop' ) )
                ->set_required( true ),
    ) );
})();