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

    $posts = get_posts( array( 'post_type' => $post_type ) );
    
    // write posts to list
    $list = array();

    foreach ( (array) $posts as $post) {
        $list = array(
                $post->ID => $post->post_title,
            );
    }
    return $list;
}