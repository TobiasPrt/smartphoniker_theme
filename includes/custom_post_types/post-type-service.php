<?php
/**
 * Post Type: Service
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register service post type
 *
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Services' ),
        'all_items'           => __( 'Alle Services' ),
        'view_item'           => __( 'Service anzeigen' ),
        'add_new_item'        => __( 'Service hinzufügen' ),
        'add_new'             => __( 'Service hinzufügen' ),
        'edit_item'           => __( 'Service bearbeiten' ),
        'update_item'         => __( 'Service aktualisieren' ),
        'search_items'        => __( 'Service durchsuchen' ),
        'not_found'           => __( 'keine Services gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Services gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Services' ),
        'description'           => __( 'Alle Services von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title', 
            'editor'
        ),
        'hierarchical'          => true,
        'menu_icon'             => 'dashicons-admin-tools',
        'has_archive'           => true,
        'show_in_rest'          => true,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => false,
        'has_archive'           => false,
    );
    
    register_post_type( 'service', $options );
})();