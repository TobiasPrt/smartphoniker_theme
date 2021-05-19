<?php
/**
 * Post Meta: Repair
 * 
 * @package Smartphoniker
 * @since 1.1.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for repar post type.
 * 
 * @since 1.1.0
 */
(function() {
    Container::make( 'post_meta', _( 'Reparatur Einstellungen' ) )
        ->where( 'post_type', '=', 'repair' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'image', 'icon', __( 'Icon' ) )
                ->set_width( 25 )
                ->set_required( true ),
            Field::make( 'textarea', 'description', __( 'Kurzbeschreibung' ) )
                ->set_width( 75 )
                ->set_required( true ),
    ) );
})();