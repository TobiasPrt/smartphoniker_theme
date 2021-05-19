<?php
/**
 * Post Type: Region
 * 
 * This represents a catchment are of Smartphoniker for automatically generated sites.
 * @package Smartphoniker
 * @since 1.1.0
 */


/**
 * Register area post type
 *
 * @since 1.1.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Einzugsgebiete', 'Post Type General Name' ),
        'singular_name'       => _x( 'Einzugsgebiet', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Einzugsgebiete' ),
        'all_items'           => __( 'Alle Einzugsgebiete' ),
        'view_item'           => __( 'Einzugsgebiet anzeigen' ),
        'add_new_item'        => __( 'Einzugsgebiet hinzufügen' ),
        'add_new'             => __( 'Einzugsgebiet hinzufügen' ),
        'edit_item'           => __( 'Einzugsgebiet bearbeiten' ),
        'update_item'         => __( 'Einzugsgebiet aktualisieren' ),
        'search_items'        => __( 'Einzugsgebiet durchsuchen' ),
        'not_found'           => __( 'keine Einzugsgebiete gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Einzugsgebiete gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Einzugsgebiete' ),
        'description'           => __( 'Alle Einzugsgebiete von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title', 
            'taxonomies'
        ),
        'hierarchical'          => false,
        'menu_icon'             => 'dashicons-location-alt',
        'has_archive'           => true,
        'show_in_rest'          => true,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'exclude_from_search'   => true,
        'show_in_nav_menus'     => false,
        'has_archive'           => false
    );
    
    register_post_type( 'area', $options );
})();
