<?php
/**
 * Smartphoniker Utility Functions
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Returns list of all post types of certain post type.
 *
 * @param string $post_type name of post type
 *
 * @return array format: [post-id] => [title]
 */
function get_all_posts( string $post_type = null ): array {
    if ($post_type === null ) {
        return array();
    }

    // query posts
    $query = new WP_Query( array(
        'post_type' => $post_type,
    ) );
    
    // write posts to list
    $list = array();
    if ($query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $list = array(
                get_the_id() => get_the_title()
            );
        };
        wp_reset_postdata();
    }
    return $list;
}