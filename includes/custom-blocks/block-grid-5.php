<?php
/**
 * Custom Block: Grid-5
 * 
 * Gutenberg block which represents a 5-column grid containing
 * an image, a subtitle and an optional link.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block employees
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Grid-5' ) )
        ->set_description( __( 'Ein 5-spaltiges Layout, dass pro Element ein Bild, Untertitel (optional) und einen Link darstellt.') )
        ->set_category( 'grids', __( 'Grids' ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'schedule' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Grid-5' ) ),
            Field::make( 'complex', 'partners', __( 'Partner' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array( 
                    Field::make( 'image', 'logo', __( 'Logo' ) )
                        ->set_required( true ),
                    Field::make( 'text', 'subtitle', __( 'Untertitel' ) )
                        ->set_required( true ),
                    Field::make( 'text', 'link', __( 'Link' ) )
                        ->set_help_text( 'Bei Klick auf den Untertitel soll zu diesem Link weitergeleitet werden.' ),
                 ) ),
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'grid-5', $fields );
        } );
})();