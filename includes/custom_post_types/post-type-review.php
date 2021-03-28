<?php
/**
 * Post Type: Review
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register review post type
 *
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Bewertungen', 'Post Type General Name' ),
        'singular_name'       => _x( 'Bewertung', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Bewertungen' ),
        'all_items'           => __( 'Alle Bewertungen' ),
        'view_item'           => __( 'Bewertung anzeigen' ),
        'add_new_item'        => __( 'Bewertung hinzufügen' ),
        'add_new'             => __( 'Bewertung hinzufügen' ),
        'edit_item'           => __( 'Bewertung bearbeiten' ),
        'update_item'         => __( 'Bewertung aktualisieren' ),
        'search_items'        => __( 'Bewertung durchsuchen' ),
        'not_found'           => __( 'keine Bewertungen gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Bewertungen gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Bewertungen' ),
        'description'           => __( 'Alle Bewertungen von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title',
        ),
        'hierarchical'          => false,
        'menu_icon'             => 'dashicons-format-aside',
        'has_archive'           => true,
        'show_in_rest'          => true,
        'public'                => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => false,
        'has_archive'           => false,
        'rewrite'               => false,
    );
    
    register_post_type( 'review', $options );
})();