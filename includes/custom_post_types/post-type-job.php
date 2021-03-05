<?php
/**
 * Post Type: job
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register job post type
 *
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Stellenausschreibungen', 'Post Type General Name' ),
        'singular_name'       => _x( 'Stellenauschreibung', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Stellenausschreibungen' ),
        'all_items'           => __( 'Alle Stellenausschreibungen' ),
        'view_item'           => __( 'Stellenauschreibung anzeigen' ),
        'add_new_item'        => __( 'Stellenauschreibung hinzufügen' ),
        'add_new'             => __( 'Stellenauschreibung hinzufügen' ),
        'edit_item'           => __( 'Stellenauschreibung bearbeiten' ),
        'update_item'         => __( 'Stellenauschreibung aktualisieren' ),
        'search_items'        => __( 'Stellenauschreibung durchsuchen' ),
        'not_found'           => __( 'keine Stellenausschreibungen gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Stellenausschreibungen gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Stellenausschreibungen' ),
        'description'           => __( 'Alle Stellenausschreibungen von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title', 
            'taxonomies'
        ),
        'hierarchical'          => false,
        'menu_icon'             => 'dashicons-id',
        'has_archive'           => true,
        'show_in_rest'          => true,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => false,
        'has_archive'           => false,
        'taxonomies'  => array( 'category' ),
    );
    
    register_post_type( 'job', $options );
})();
