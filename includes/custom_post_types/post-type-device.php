<?php
/**
 * Post Type: Device
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register device post type
 *
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Geräte', 'Post Type General Name' ),
        'singular_name'       => _x( 'Gerät', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Geräte' ),
        'all_items'           => __( 'Alle Geräte' ),
        'view_item'           => __( 'Gerät anzeigen' ),
        'add_new_item'        => __( 'Gerät hinzufügen' ),
        'add_new'             => __( 'Gerät hinzufügen' ),
        'edit_item'           => __( 'Gerät bearbeiten' ),
        'update_item'         => __( 'Gerät aktualisieren' ),
        'search_items'        => __( 'Gerät durchsuchen' ),
        'not_found'           => __( 'keine Geräte gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Geräte gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Geräte' ),
        'description'           => __( 'Alle Geräte von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title', 
            'taxonomies',
        ),
        'hierarchical'          => false,
        'menu_icon'             => 'dashicons-smartphone',
        'has_archive'           => true,
        'show_in_rest'          => true,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => false,
        'has_archive'           => false,
        'taxonomies'  => array( 'manufacturer' ),
    );
    
    register_post_type( 'device', $options );
})();
