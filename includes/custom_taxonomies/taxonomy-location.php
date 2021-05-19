<?php
/**
 * Taxonomy: Location
 * 
 * Used to categorize open jobs.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register location taxonomy
 * 
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                       => _x( 'Standorte', 'taxonomy general name' ),
        'singular_name'              => _x( 'Standorte', 'Category singular name' ),
        'search_items'               => __( 'Standorte durchsuchen' ),
        'popular_items'              => __( 'Beliebte Standorte' ),
        'all_items'                  => __( 'Alle Standorte' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Standort bearbeiten' ),
        'update_item'                => __( 'Standort aktualisieren' ),
        'add_new_item'               => __( 'Standort hinzufügen' ),
        'new_item_name'              => __( 'neue Standortbezeichnung' ),
        'separate_items_with_commas' => __( 'Standorte mit Kommas trennen' ),
        'add_or_remove_items'        => __( 'Hinzufügen oder Löschen einer Standort' ),
        'choose_from_most_used'      => __( 'Wähle aus den meistgenutzten Standorte' ),
        'not_found'                  => __( 'Keinen Standort gefunden' ),
        'menu_name'                  => __( 'Standorte' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'Category' ),
        'show_in_rest'          => true
    );

    register_taxonomy( 'location', 'location', $args );
})();