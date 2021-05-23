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
    Block::make( __( 'Services' ) )
        ->set_description( __( 'Stellt ausgewählte Services in einer 2-spaltigen Liste oder in einer 3-spaltigen Ansicht dar.') )
        ->set_category( 'widgets' )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'admin-tools' )
        ->add_fields ( array(
            Field::make( 'separator', 'separator', __( 'Services' ) ),
            Field::make( 'radio', 'block_type', __( 'In welcher Weise sollen Services dargstellt werden?' ) )
                ->set_required( true )
                ->set_options( array(
                    'list' => __( 'Listenansicht (wie list-2).' ),
                    'columns' => __( 'Spaltenansicht (wie col-3).' ),
                ) ),
            Field::make( 'complex', 'services', __( 'Services auswählen' ))
                ->add_fields( 'service', array(
                    Field::make( 'select', 'service_id', __( 'Ausgewählte Services' ))
                        ->set_options( call_user_func( 'get_all_posts', 'service' ) )
                        ->set_help_text( 'In Listenansicht bitte eine gerade Anzahl an Services wählen. In Spaltenansicht bitte genau 3 Services wählen.' )
                ) )
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            if ( $fields['block_type'] === 'columns' ) {
                $services = array(
                    'columns' => array(),
                    'column_options' => array(
                        'heading', 'text_is_left_aligned', 'has_orange_accent'
                    ),
                );
                
                
                foreach ( (array) $fields['services'] as $service ) {
                    array_push( $services['columns'], array(
                        'heading' => get_the_title( intval( $service['services'] ) ),
                        'text' => get_post_meta( intval( $service['services'] ), '_description' )[0]
                        ) );
                    }
                    get_template_part( 'template-parts/component', 'col-3', $services );
                } else {
                    get_template_part( 'template-parts/component', 'services-list-2', $fields );
            }

            
        } );
})();