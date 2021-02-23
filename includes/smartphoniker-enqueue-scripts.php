<?php
/**
 * Enqueue stylesheets and scripts.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */


/**
 * Enqueue stylesheet files.
 *
 * @since 1.0.0
 */
function smartphoniker_enqueue_stylesheets() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap' );
    wp_enqueue_style( 'smartphoniker-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}

/**
 * Enqueue javascript files.
 *
 * @since 1.0.0
 */
function smartphoniker_enqueue_javascript() {
    wp_enqueue_script( 'smartphoniker-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get( 'Version' ), true );
}

/**
 * Enqueue all scripts.
 *
 * @since 1.0.0
 */
function smartphoniker_enqueue_scripts() {
    smartphoniker_enqueue_stylesheets();
    smartphoniker_enqueue_javascript();
}