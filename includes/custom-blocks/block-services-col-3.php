<?php
/**
 * Custom Block: Services-Rest
 * 
 * Gutenberg block which represents a 3-column layout similar to
 * col-3 heading-text filed with 3 services 
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


require_once __DIR__ . '/../smartphoniker-util.php';


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block services-rest
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Services-Col-3' ) )
        ->add_fields ( array(
            Field::make( 'html', 'description', __( 'Services Beschreibung' ) )
                ->set_html( 'Hier wird eine 3-spaltiges Layout von 3 Services ohne Gruppe ausgegeben.' ),
            Field::make( 'set', 'services', __( 'Ausgewählte Services' ))
                ->set_options( call_user_func( 'get_all_posts', 'service' ) )
                ->set_help_text( 'Zeigt das den Namen und die Kurzbeschreibung von bis zu 3 ausgewählten Services an.' )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            
            $services = array(
                'columns' => array(),
                'column_options' => array(
                    'heading', 'text_is_left_aligned', 'has_orange_accent'
                ),
            );

            foreach ( (array) $fields['services'] as $service => $service_id ) {
                array_push( $services['columns'], array(
                    'heading' => get_the_title( intval( $service_id ) ),
                    'text' => get_post_meta( intval( $service_id ), '_description' )[0]
                ) );
            }
            get_template_part( 'template-parts/component', 'col-3', $services );
        } );
})();