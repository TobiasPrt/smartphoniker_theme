<?php
/**
 * Post Type: Repair
 * 
 * This post type represents different kinds of repairs like screen or battery repairs.
 * @package Smartphoniker
 * @since 1.1.0
 */


/**
 * Register repair post type
 *
 * @since 1.1.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Reparaturen', 'Post Type General Name' ),
        'singular_name'       => _x( 'Reparatur', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Reparaturen' ),
        'all_items'           => __( 'Alle Reparaturen' ),
        'view_item'           => __( 'Reparatur anzeigen' ),
        'add_new_item'        => __( 'Reparatur hinzufügen' ),
        'add_new'             => __( 'Reparatur hinzufügen' ),
        'edit_item'           => __( 'Reparatur bearbeiten' ),
        'update_item'         => __( 'Reparatur aktualisieren' ),
        'search_items'        => __( 'Reparatur durchsuchen' ),
        'not_found'           => __( 'keine Reparaturen gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Reparaturen gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Reparaturen' ),
        'description'           => __( 'Alle Reparaturen von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title', 
            'thumbnail'
        ),
        'hierarchical'          => false,
        'menu_icon'             => 'dashicons-feedback',
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
    
    register_post_type( 'repair', $options );
})();