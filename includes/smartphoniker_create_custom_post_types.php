<?php
/**
 * Creates custom post types.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'init', 'smartphoniker_create_custom_post_types' );


function smartphoniker_create_custom_post_types() {
    smartphoniker_register_employee_post_type();
}


function smartphoniker_register_employee_post_type() {
    
    $labels = array(
        'name'                => _x( 'Mitarbeiter', 'Post Type General Name' ),
        'singular_name'       => _x( 'Mitarbeiter', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Mitarbeiter' ),
        'all_items'           => __( 'Alle Mitarbeiter' ),
        'view_item'           => __( 'Mitarbeiter anzeigen' ),
        'add_new_item'        => __( 'Mitarbeiter hinzufügen' ),
        'add_new'             => __( 'Neuer Mitarbeiter' ),
        'edit_item'           => __( 'Mitarbeiter bearbeiten' ),
        'update_item'         => __( 'Mitarbeiter aktualisieren' ),
        'search_items'        => __( 'Mitarbeiter durchsuchen' ),
        'not_found'           => __( 'keinen Mitarbeiter gefunden' ),
        'not_found_in_trash'  => __( 'keinen gelöschten Mitarbeiter gefunden' ),
    );

    $options = array(
        'label' => __( 'Mitarbeiter' ),
        'description' => __( 'Alle Mitarbeiter von Smartphoniker.' ),
        'labels' => $labels,
        'supports' => array(
            'title', 
            'thumbnail'
        ),
        'hierarchical' => false,
        'public' => true,
        'show_in_nav_menu' => false,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'employees' ),
        'show_in_rest' => true,
        'taxonomies' => array( 'role' ),
    );
    
    register_post_type( 'Mitarbeiter', $options );
}
