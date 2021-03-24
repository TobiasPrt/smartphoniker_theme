<?php
/**
 * Post Meta: Service
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for service post type.
 * 
 * @since 1.0.0
 */
(function() {
    Container::make( 'post_meta', _( 'Service Einstellungen' ) )
        ->where( 'post_type', '=', 'service' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'image', 'icon', __( 'Icon wählen' ) )
                ->set_width( 25 )
                ->set_required( true ),
            Field::make( 'textarea', 'description', __( 'Service Kurzbeschreibung' ) )
                ->set_width( 75 )
                ->set_help_text( 'Die Kurzbschreibung wird überall verwendet, wo Informationen zu diesem Service stehen außer auf der Einzelseite des Service.' )
                ->set_required ( true ),
        ) );
})();