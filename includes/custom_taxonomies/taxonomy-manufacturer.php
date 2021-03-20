<?php
/**
 * Taxonomy: Manufacturer
 * 
 * Used to categorize devices.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Register devices taxonomy
 * 
 * @since 1.0.0
 */
(function() {
    $labels = array(
        'name'                       => _x( 'Hersteller', 'taxonomy general name' ),
        'singular_name'              => _x( 'Hersteller', 'Category singular name' ),
        'search_items'               => __( 'Hersteller durchsuchen' ),
        'popular_items'              => __( 'Beliebte Hersteller' ),
        'all_items'                  => __( 'Alle Hersteller' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Hersteller bearbeiten' ),
        'update_item'                => __( 'Hersteller aktualisieren' ),
        'add_new_item'               => __( 'Hersteller hinzufügen' ),
        'new_item_name'              => __( 'neue Herstellerbezeichnung' ),
        'separate_items_with_commas' => __( 'Hersteller mit Kommas trennen' ),
        'add_or_remove_items'        => __( 'Hinzufügen oder Löschen einer Hersteller' ),
        'choose_from_most_used'      => __( 'Wähle aus den meistgenutzten Hersteller' ),
        'not_found'                  => __( 'Keinen Hersteller gefunden' ),
        'menu_name'                  => __( 'Hersteller' ),
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

    register_taxonomy( 'manufacturer', 'manufacturer', $args );
})();