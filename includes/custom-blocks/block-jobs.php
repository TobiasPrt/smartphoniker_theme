<?php
/**
 * Custom Block: Jobs
 * 
 * Gutenberg block which represents a tabbed job-listing component.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


require_once __DIR__ . '/../smartphoniker-util.php';


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block jobs.
 *
 * @since 1.0.0
 */
(function() {
    Block::make( __( 'Jobs' ) )
        ->set_description( __( 'Stellt ein tabbasiertes Widget mit allen offenen Stellenanzeigen sortiert nach Standorten dar.') )
        ->set_category( 'widgets', __( 'Vorausgefüllte Blocks' ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_icon( 'id' )
        ->add_fields( array(
            Field::make( 'separator', 'separator', __( 'Jobs' ) ),
        ) )
        ->set_render_callback( function ( array $fields, array $attributes, string $inner_blocks ) {
            $categories = get_categories();

            $jobs = array();

            foreach ( (array) $categories as $category ) {
                $jobs[$category->name] = call_user_func( 'get_all_posts', 'job', $category->slug );
            }

            get_template_part( 'template-parts/component', 'jobs', array('jobs' => $jobs) );
        } );
})();