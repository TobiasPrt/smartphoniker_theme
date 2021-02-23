<?php
/**
 * Theme functions file.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


// Require includes
foreach (glob(__DIR__ . "/includes/*.php") as $filename) {
    require_once $filename;
}


// Add Filters
add_filter('upload_mimes', 'smartphoniker_mime_types', 1);
// add_filter( 'allowed_block_types', 'smartphoniker_allowed_block_types');


// Add Actions
add_action('after_setup_theme', 'smartphoniker_setup');
add_action('wp_enqueue_scripts', 'smartphoniker_enqueue_scripts');
add_action('carbon_fields_register_fields', 'smartphoniker_register_theme_options');
add_action('carbon_fields_register_fields', 'smartphoniker_register_custom_blocks');