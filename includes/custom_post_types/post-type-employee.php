<?php
/**
 * Post Type: Employee
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register employee post type
 *
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                => _x( 'Mitarbeiter:innen', 'Post Type General Name' ),
        'singular_name'       => _x( 'Mitarbeiter:in', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Mitarbeiter:innen' ),
        'all_items'           => __( 'Alle Mitarbeiter:innen' ),
        'view_item'           => __( 'Mitarbeiter:in anzeigen' ),
        'add_new_item'        => __( 'Mitarbeiter:in hinzufügen' ),
        'add_new'             => __( 'Mitarbeiter:in hinzufügen' ),
        'edit_item'           => __( 'Mitarbeiter:in bearbeiten' ),
        'update_item'         => __( 'Mitarbeiter:in aktualisieren' ),
        'search_items'        => __( 'Mitarbeiter:in durchsuchen' ),
        'not_found'           => __( 'keine Mitarbeiter:innen gefunden' ),
        'not_found_in_trash'  => __( 'keine gelöschten Mitarbeiter:innen gefunden' ),
    );

    $options = array(
        'label'                 => __( 'Mitarbeiter:innen' ),
        'description'           => __( 'Alle Mitarbeiter:innen von Smartphoniker.' ),
        'labels'                => $labels,
        'supports'              => array(
            'title', 
            'thumbnail'
        ),
        'hierarchical'          => false,
        'menu_icon'             => 'dashicons-businessperson',
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
    
    register_post_type( 'employee', $options );
})();