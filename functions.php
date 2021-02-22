<?php
/**
 * Main functions file.
 *
 * @package Smartphoniker
 */


/**
 * Require all files from ./includes.
 */
foreach (glob(__DIR__ . "/includes/*.php") as $filename) {
    require_once $filename;
}


/**
 * Add filters.
 */
smartphoniker_add_filters();


/**
 * List all used hooks and corresponding functions.
 */
add_action('after_setup_theme', 'smartphoniker_setup');
add_action('carbon_fields_register_fields', 'smartphoniker_register_blocks');
add_action('wp_enqueue_scripts', 'smartphoniker_load_styles');
add_action('wp_enqueue_scripts', 'smartphoniker_load_scripts');
add_action('carbon_fields_register_fields', 'smartphoniker_register_themeoptions');
