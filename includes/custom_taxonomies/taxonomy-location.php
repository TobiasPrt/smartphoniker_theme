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
        'name'                       => _x( 'Kategorien', 'taxonomy general name' ),
        'singular_name'              => _x( 'Standorte', 'Category singular name' ),
        'search_items'               => __( 'Kategorien durchsuchen' ),
        'popular_items'              => __( 'Beliebte Kategorien' ),
        'all_items'                  => __( 'Alle Kategorien' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Kategorie bearbeiten' ),
        'update_item'                => __( 'Kategorie aktualisieren' ),
        'add_new_item'               => __( 'Kategorie hinzufügen' ),
        'new_item_name'              => __( 'neue Kategoriebezeichnung' ),
        'separate_items_with_commas' => __( 'Kategorien mit Kommas trennen' ),
        'add_or_remove_items'        => __( 'Hinzufügen oder Löschen einer Kategorie' ),
        'choose_from_most_used'      => __( 'Wähle aus den meistgenutzten Kategorien' ),
        'not_found'                  => __( 'Keinen Standort gefunden' ),
        'menu_name'                  => __( 'Kategorien' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'Category' ),
    );

    register_taxonomy( 'category', 'location', $args );
})();