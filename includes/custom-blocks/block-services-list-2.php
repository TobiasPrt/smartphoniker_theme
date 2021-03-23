<?php
/**
 * Custom Block: Services
 * 
 * Gutenberg block which represents a 2-column layout filled
 * with all checked services.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


require_once __DIR__ . '/../smartphoniker-util.php';


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block services.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Services-List-2' ) )
        ->add_fields ( array(
            Field::make( 'html', 'description', __( 'Services Beschreibung' ) )
                ->set_html( 'Hier wird eine 2-spaltige Liste von den ausgewählten Services dargestellt.' ),
            Field::make( 'set', 'services', __( 'Ausgewählte Services' ))
                ->set_options( call_user_func( 'get_all_posts', 'service' ) )
                ->set_help_text( 'Zeigt das Icon, den Namen und die Kurzbeschreibung jedes ausgewählten Service an.' )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'services-list-2', $fields );
        } );
})();