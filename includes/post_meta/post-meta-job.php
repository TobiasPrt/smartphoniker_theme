<?php
/**
 * Post Meta: Job
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for Job post type.
 * 
 * @since 1.0.0
 */
(function() {
    Container::make( 'post_meta', _( 'Job Einstellungen' ) )
        ->where( 'post_type', '=', 'job' )
        ->set_context( 'advanced' )
        ->add_fields( array(
            Field::make( 'text', 'short_description', __( 'Job Kurzbeschreibung' ) )
                ->set_width( 100 )
                ->set_help_text( 'Die Kurzbschreibung wird im jobs block verwendet und steht unter dem Titel. Dort passt zum Beispiel sowas wie "Vollzeit/Teilzeit - 30h pro Woche" rein, aber am besten nicht länger.' )
                ->set_required ( true ),
        ) );
})();