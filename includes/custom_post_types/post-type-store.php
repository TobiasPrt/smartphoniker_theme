<?php
/**
 * Post Type: Store
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register store post type
 *
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Standorte', 'Post Type General Name' ),
        'singular_name'       => _x( 'Standort', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Standorte' ),
        'all_items'           => __( 'Alle Standorte' ),
        'view_item'           => __( 'Standort anzeigen' ),
        'add_new_item'        => __( 'Standort hinzufügen' ),
        'add_new'             => __( 'Standort hinzufügen' ),
        'edit_item'           => __( 'Standort bearbeiten' ),
        'update_item'         => __( 'Standort aktualisieren' ),
        'search_items'        => __( 'Standort durchsuchen' ),
        'not_found'           => __( 'keine Standorte gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Standorte gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Standorte' ),
        'description'           => __( 'Alle Standorte von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title', 
            'thumbnail'
        ),
        'hierarchical'          => false,
        'menu_icon'             => 'dashicons-store',
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
    
    register_post_type( 'store', $options );
})();