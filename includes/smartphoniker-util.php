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
 * @param array|string $post_type name of post type
 *
 * @return array format: [post-id] => [title]
 */
function get_all_posts( $post_type = null, string $category = null ): array {
    $post_list = get_posts( array(
        'numberposts' => -1,
        'post_type' => $post_type,
        'post_status' => array('publish'),
    ) );

    if ($post_type === null ) {
        $post_list = get_posts(
            array(
            'numberposts' => -1,
            'post_status' => array('publish'),
            'post_type' => get_post_types('', 'names'),
            )
        );
    }

    if ( $category !== null && $post_type !== null) {
        $post_list = get_posts( array(
            'post_type' => $post_type,
            'post_status' => array('publish'),
            'category' => $category,
        ) );
    }

    
    
    // write posts to list
    $list = array();

    foreach ( (array) $post_list as $post_item) {  
        $list[$post_item->ID] = $post_item->post_title;
    }

    return array_filter( $list );
}