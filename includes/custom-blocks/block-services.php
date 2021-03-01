<?php
/**
 * Custom Block: Services
 * 
 * Gutenberg block which represents a 2-column layout filled
 * with all services within the widget group.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block services.
 *
 * @since 1.0.0
 */
(function() {

    function get_services_list() {
        $query = new WP_Query( array(
            'post_type' => 'service',
        ) );

        $services = array();
        if ($query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $services = array(
                    get_the_id() => get_the_title()
                );
            };
            wp_reset_postdata();
        }
        return $services;
    }
    

    Block::make( __( 'Services' ) )
        ->add_fields ( array(
            Field::make( 'html', 'description', __( 'Services Beschreibung' ) )
                ->set_html( 'Hier wird eine 2-spaltige Liste von den ausgewählten Services dargestellt.' ),
            Field::make( 'set', 'services', __( 'Ausgewählte Services' ))
                ->set_options( 'get_services_list' )
                ->set_help_text( 'Zeigt das Icon, den Namen und die Kurzbeschreibung jedes ausgewählten Service an.' )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'services', $fields );
        } );
})();