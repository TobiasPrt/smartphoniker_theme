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
 * Registers Gutenberg Block block2.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Services' ) )
        ->add_fields ( array(
            Field::make( 'html', 'description', __( 'Services Beschreibung' ) )
                ->set_html( 'Hier wird eine 2-spaltige Liste von allen Services aus der Widget Gruppe ausgegeben.' )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'services', $fields );
        } );
})();