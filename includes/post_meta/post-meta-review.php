<?php
/**
 * Post Meta: Review
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for review post type.
 * 
 * @since 1.0.0
 */
(function() {
    Container::make( 'post_meta', _( 'Bewertung Einstellungen' ) )
        ->where( 'post_type', '=', 'review' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'textarea', 'text', __( 'Text' ) )
                ->set_required( true ),
    ) );
})();