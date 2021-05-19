<?php
/**
 * Post Meta: Device
 * 
 * @package Smartphoniker
 * @since 1.1.0
 */


use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Creates post meta for area post type.
 * 
 * @since 1.1.0
 */
(function() {
    $stores = call_user_func( 'get_all_posts', 'store' );

    Container::make( 'post_meta', _( 'Einzugsgebiet Einstellungen' ) )
        ->where( 'post_type', '=', 'area' )
        ->set_context( 'normal' )
        ->add_fields( array(
            Field::make( 'select', 'store', __( 'Anzuzeigende Stores auswählen' ) )
                ->set_options( $stores )
    ) );
})();