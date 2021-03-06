<?php
/**
 * Custom Block: Jobs
 * 
 * Gutenberg block which represents a tabbed job-listing component.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


require_once __DIR__ . '/../smartphoniker_util.php';


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block jobs.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Jobs' ) )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Offene Stellen' ) ),
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            $categories = get_categories( array(
                'parent' => 12, // ID of location parent category
            ) );

            foreach ( (array) $categories as $category ) {
                $jobs[$category->name] = call_user_func( 'get_all_posts', 'job', $category->slug );
            }

            get_template_part( 'template-parts/component', 'jobs', array('jobs' => $jobs) );
        } );
})();