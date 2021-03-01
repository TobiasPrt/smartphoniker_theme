<?php
/**
 * Custom Block: Services-Rest
 * 
 * Gutenberg block which represents a 3-column layout similar to
 * col-3 heading-text filed with 3 services without group
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block services-rest
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Services' ) )
        ->add_fields ( array(
            Field::make( 'html', 'description', __( 'Services Beschreibung' ) )
                ->set_html( 'Hier wird eine 3-spaltiges Layout von 3 Services ohne Gruppe ausgegeben.' )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            $query = new WP_Query( array(
                'post_type' => 'service',
                'posts_per_page' => 3,
                'no_found_rows' => true,
                'meta_query' => array(
                    'group' => array(
                        'key' => 'group',
                        'value' => 'no_group'
                    ),
                ),
            ) );
            
            $services = array(
                'column_options' => array(
                    'heading', 'text_is_left_aligned', 'has_orange_accent'
                ),
            );

            if ($query->have_posts() ) {
                $i = 0;
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $services['columns'][$i]['heading'] = get_the_title();
                    $services['columns'][$i]['text'] = get_post_meta( get_the_ID(), '_description' )[0];
                    $i++;
                };
                wp_reset_postdata();
            }
            
            get_template_part( 'template-parts/component', 'col-3', $services );
        } );
})();