<?php
/**
 * Enqueue stylesheets and scripts.
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', 'smartphoniker_enqueue_scripts' );


/**
 * Enqueue all scripts.
 *
 * @since 1.0.0
 */
function smartphoniker_enqueue_scripts() {
    smartphoniker_enqueue_stylesheets();
    smartphoniker_enqueue_javascript();
    smartphoniker_dequeue_stylesheets();
}

/**
 * Enqueue stylesheet files.
 *
 * @since 1.0.0
 */
function smartphoniker_enqueue_stylesheets() {
    // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Roboto+Condensed:wght@700&display=swap' );
    wp_enqueue_style( 'smartphoniker-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}

/**
 * Enqueue javascript files.
 *
 * @since 1.0.0
 */
function smartphoniker_enqueue_javascript() {
    wp_enqueue_script( 'smartphoniker-app', get_template_directory_uri() . '/assets/js/app.js', array(), wp_get_theme()->get( 'Version' ), true );
}

/**
 * Dequeues block library styles
 *
 * @since 1.1.0
 */
function smartphoniker_dequeue_stylesheets() {
    wp_dequeue_style( 'wp-block-library' );
}