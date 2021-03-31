<?php
/**
 * Custom Block: Video
 * 
 * Gutenberg block which represents a video.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block video.
 * 
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Video' ) )
        ->set_description( __( 'Stellt ein YouTube-Video dar.') )
        ->set_category( 'widgets' )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'video-alt3' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Video' ) ),
            Field::make( 'text', 'video_id', __('YouTube Video ID' ) )
                ->set_help_text(
                    'Video im Browser aufrufen und den v-Parameter der URL kopieren. 
                    Bsp: Der Link zum Video ist: https://www.youtube.com/watch?v=zExoGYO_L1s 
                    Also muss zExoGYO_L1s kopiert und in dieses Feld eingefügt werden.'
                )
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            get_template_part( 'template-parts/component', 'video', $fields );
        } );
})();